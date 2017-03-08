<?php
/**
 * Users - A Controller for managing the Users Authentication.
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */

namespace App\Modules\System\Controllers;

use App\Core\BackendController;
use App\Modules\System\Models\UserLog;
use App\Modules\System\Models\Dept;
use App\Modules\System\Models\Role;
use App\Modules\System\Models\User;

use App\Helpers\Member;
use App\Helpers\Export;

use Auth;
use Crypt;
use Hash;
use Input;
use Redirect;
use Session;
use View;
use Validator;

class Users extends BackendController
{
    public function index()
    {
        $users = $this->getLogs()->paginate();
        $roles = Role::all();
        $depts = Dept::all();

        $queryStrings = [
            'username' => Input::get('username'),
            'role_id' => Input::get('role_id'),
            'email' => Input::get('email'),
            'officeLoginOnly' => Input::get('officeLoginOnly')
        ];

        return $this->getView()
            ->shares('title', 'Users')
            ->with('users', $users)
            ->with('depts', $depts)
            ->with('roles', $roles)
            ->with('queryStrings', $queryStrings);
    }

    protected function getLogs()
    {
        //init query
        $query = User::where('active', 'Yes')->orderBy('username');

        if (Input::exists('username')) {

            //get form data
            $input           = Input::all();
            $username        = '%'.$input['username'].'%';
            $email           = $input['email'];
            $role_id         = $input['role_id'];
            $officeLoginOnly = $input['officeLoginOnly'];

            //do conditions
            if ($username !='') {
                $query->where('username', 'like', $username);
            }

            if ($email !='') {
                $query->where('email', 'like', $email);
            }

            if ($role_id !='') {
                $query->where('role_id', $role_id);
            }

            if ($officeLoginOnly !='') {
                $query->where('officeLoginOnly', $officeLoginOnly);
            }

        }

        //execute and pass to final variable
        return $query;
    }

    public function export($type)
    {
        $users = $this->getLogs()->get();

        if ($type == 'csv') {
            $content = View::fetch('Users/Csv', ['users' => $users], 'System');
            Export::csv($content, 'userlogs');
        }

        if ($type == 'pdf') {
            $content = View::fetch('Users/Pdf', ['users' => $users], 'System');
            $content = View::fetch('Pdfs/Default', ['content' => $content]);
            Export::pdf($content, 'users', 'D');
        }
    }

    public function create()
    {
        $roles = Role::all();
        $depts = Dept::all();

        return $this->getView()
            ->shares('title', __d('users', 'Create User'))
            ->with('roles', $roles)
            ->with('depts', $depts);
    }

    public function store()
    {
        // Validate the Input data.
        $input = Input::all();

        $validator = $this->validate($input);

        if ($validator->passes()) {

            // Create a User Model instance - used with the Extended Auth Driver.
            $user = new User;
            $user->username                  = $input['username'];
            $user->password                  = Hash::make($input['password']);
            $user->email                     = $input['email'];
            $user->personalEmail             = $input['personalEmail'];
            $user->tel                       = $input['tel'];
            $user->mobile                    = $input['mobile'];
            $user->jobTitle                  = $input['jobTitle'];
            $user->dept_id                   = $input['dept'];
            $user->company                   = $input['company'];
            $user->tshirtSize                = $input['tshirtSize'];
            $user->nextOfKinName             = $input['nextOfKinName'];
            $user->nextOfKinRelationship     = $input['nextOfKinRelationship'];
            $user->nextOfKinNumber           = $input['nextOfKinNumber'];
            $user->office365Email            = $input['office365Email'];

            if (isset($input['office365Password'])) {
                $user->office365Password         = Crypt::encrypt($input['office365Password']);
            }

            $user->backgroundColour          = $input['backgroundColour'];
            $user->textColor                 = $input['textColor'];

            //if administrator
            if (Member::get('role_id') == 1) {
                $user->active                    = $input['active'];
                $user->officeLoginOnly           = $input['officeLoginOnly'];
                $user->isStaff                   = $input['isStaff'];
                $user->forceChangePassword       = $input['forceChangePassword'];
                $user->target                    = $input['target'];
                $user->role_id                   = $input['role_id'];
            }

            if ($_FILES["imagePath"]["name"] !='') {

                if (!file_exists(ROOTDIR."assets/images/users/".$id)) {
                    mkdir(ROOTDIR."assets/images/users/".$id);
                }

                // location where initial upload will be moved to
                $target = "images/users/".$id."/".$_FILES['imagePath']['name'];
                move_uploaded_file($_FILES["imagePath"]["tmp_name"], ROOTDIR."assets/".$target);

                $user->imagePath = $target;
            }

            $user->save();

            $log          = new UserLog();
            $log->user_id = Auth::user()->id;
            $log->title   = "Created new user: {$user->username}";
            $log->section = "users";
            $log->link    = "admin/users/{$user->id}/edit";
            $log->refID   = $user->id;
            $log->type    = 'Create';
            $log->save();

            return Redirect::to('admin/users')->withStatus("The User <b>$user->username</b> was successfully created.");
        }

        return Redirect::back()->withInput()->withStatus($validator->errors(), 'danger');
    }

    public function show($id = null)
    {
        if ($id === null) {
            $id = Auth::id();
        }
        // Get the User Model instance.
        $user = User::find($id);

        if($user === null) {
            return Redirect::to('admin/users')->withStatus("User not found!", 'danger');
        }

        return $this->getView()
            ->shares('title', __d('users', 'Show User'))
            ->with('user', $user);
    }

    public function edit($id)
    {
        // Get the user
        $user = User::find($id);

        //if user not found
        if($user === null) {
            return Redirect::to('admin/users')->withStatus("User not found!", 'danger');
        }

        if (Member::get('id') != $user->id && Member::get('role_id') != 1) {
            return Redirect::to('admin/users')->withStatus('You are not authorized to access this resource.', 'warning');
        }

        // Get all available User Roles.
        $roles = Role::all();
        $depts = Dept::all();

        return $this->getView()
            ->shares('title', 'Edit User')
            ->with('roles', $roles)
            ->with('depts', $depts)
            ->with('user', $user);
    }

    public function update($id)
    {
        $user = User::find($id);

        if ($user === null) {
            return Redirect::to('admin/users')->withStatus("User not found!", 'danger');
        }

        if (Member::get('id') != $user->id && Member::get('role_id') != 1) {
            return Redirect::to('admin/users')->withStatus('You are not authorized to access this resource.', 'warning');
        }

        // Validate the Input data.
        $input = Input::all();

        if (empty($input['password']) && empty($input['password_confirm'])) {
            unset($input['password']);
            unset($input['password_confirmation']);
        }

        $validator = $this->validate($input, $id);

        if($validator->passes()) {

            // Update the User Model instance.
            $user->username                  = $input['username'];
            $user->email                     = $input['email'];
            $user->personalEmail             = $input['personalEmail'];
            $user->tel                       = $input['tel'];
            $user->mobile                    = $input['mobile'];
            $user->jobTitle                  = $input['jobTitle'];
            $user->dept_id                   = $input['dept'];
            $user->company                   = $input['company'];
            $user->tshirtSize                = $input['tshirtSize'];
            $user->nextOfKinName             = $input['nextOfKinName'];
            $user->nextOfKinRelationship     = $input['nextOfKinRelationship'];
            $user->nextOfKinNumber           = $input['nextOfKinNumber'];
            $user->office365Email            = $input['office365Email'];
            $user->office365Password         = $input['office365Password'];
            $user->backgroundColour          = $input['backgroundColour'];
            $user->textColor                 = $input['textColor'];

            //administrator
            if (Member::get('role_id') == 1) {
                $user->active                    = $input['active'];
                $user->officeLoginOnly           = $input['officeLoginOnly'];
                $user->isStaff                   = $input['isStaff'];
                $user->forceChangePassword       = $input['forceChangePassword'];
                $user->target                    = $input['target'];
                $user->role_id                   = $input['role_id'];
            }


            if(isset($input['password'])) {
                $user->password = Hash::make($input['password']);
                Session::set('changelogin', false);
                $user->forceChangePassword = 'No';
            }

            if ($_FILES["imagePath"]["name"] !='') {

                if (!file_exists(ROOTDIR."assets/images/users/".$id)) {
                    mkdir(ROOTDIR."assets/images/users/".$id);
                }

                // location where initial upload will be moved to
                $target = "images/users/".$id."/".$_FILES['imagePath']['name'];
                move_uploaded_file($_FILES["imagePath"]["tmp_name"], ROOTDIR."assets/".$target);

                $user->imagePath = $target;
            }

            // Save the User information.
            $user->save();

            $log          = new UserLog();
            $log->user_id = Auth::user()->id;
            $log->title   = "Updated user: {$user->username}";
            $log->section = "users";
            $log->link    = "admin/users/{$user->id}/edit";
            $log->refID   = $user->id;
            $log->type    = 'Update';
            $log->save();

            return Redirect::to('admin/users')->withStatus("The User <b>$user->username</b> was successfully updated.");
        }

        return Redirect::back()->withInput()->withStatus($validator->errors(), 'danger');
    }

    public function destroy($id)
    {
        // Get the User Model instance.
        $user = User::find($id);

        if($user === null) {
            return Redirect::to('admin/users')->withStatus("User not found <b>$user->id</b>", 'danger');
        }

        $log          = new UserLog();
        $log->user_id = Auth::user()->id;
        $log->title   = "Deleted user: {$user->username}";
        $log->section = "users";
        $log->refID   = $user->id;
        $log->type    = 'Delete';
        $log->save();

        $user->active = 'No';
        $user->deleted_at = date('Y-m-d H:i:s');
        $user->save();

        return Redirect::to('users')->withStatus("The User <b>$user->username</b> was successfully updated.");
    }

    protected function validate(array $data, $id = null)
    {
        if (! is_null($id)) {
            $ignore = ',' .intval($id);

            $required = 'sometimes|required';
        } else {
            $ignore = '';

            $required = 'required';
        }

        // The Validation rules.
        $rules = array(
            'username'              => 'required|alpha_dash|min:4|unique:users,username' .$ignore,
            'role_id'               => 'required|numeric|exists:roles,id',
            'password'              => $required .'|confirmed',
            'password_confirmation' => $required .'|same:password',
            'email'                 => 'required|min:5|email',
        );

        $messages = array(
            'strong_password' => __d('users', 'The :attribute field is not strong enough.'),
        );

        $attributes = array(
            'username'              => 'Username',
            'role_id'               => 'Role',
            'password'              => 'Password',
            'password_confirmation' => 'Password confirmation',
            'email'                 => 'E-mail'
        );

        Validator::extend('strong_password', function($attribute, $value, $parameters)
        {
            $pattern = "/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/";

            return (preg_match($pattern, $value) === 1);
        });

        return Validator::make($data, $rules, $messages, $attributes);
    }
}
