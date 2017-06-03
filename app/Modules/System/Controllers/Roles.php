<?php
namespace App\Modules\System\Controllers;

use App\Core\BackendController;
use App\Modules\System\Models\Role;
use App\Modules\System\Models\UserLog;
use App\Helpers\Export;

use Auth;
use Input;
use Str;
use Redirect;
use View;
use Validator;

class Roles extends BackendController
{
    public function index()
    {
        $roles = $this->getLogs()->paginate();

        $queryStrings = ['name' => Input::get('name')];

        return $this->getView()
            ->shares('title', 'Roles')
            ->with('roles', $roles)
            ->with('queryStrings', $queryStrings);
    }

    protected function getLogs()
    {
        //init query
        $query = Role::orderBy('name');

        if (Input::exists('name')) {

            //get form data
            $input  = Input::all();
            $name  = '%'.$input['name'].'%';

            //do conditions
            if ($name !='') {
                $query->where('name', 'like', $name);
            }

        }

        //execute and pass to final variable
        return $query;
    }

    public function export($type)
    {
        $roles = $this->getLogs()->get();

        if ($type == 'csv') {
            $content = View::fetch('Roles/Csv', ['roles' => $roles], 'System');
            Export::csv($content, 'roles');
        }

        if ($type == 'pdf') {
            $content = View::fetch('Roles/Pdf', ['roles' => $roles], 'System');
            $content = View::fetch('Pdfs/Default', ['content' => $content]);
            Export::pdf($content, 'roles', 'D');
        }
    }

    public function create()
    {
        return $this->getView()->shares('title', 'Create Role');
    }

    public function store()
    {
        // Validate the Input data.
        $input = Input::only('name', 'description');

        $validator = $this->validator($input);

        if ($validator->passes()) {
            $role              = new Role();
            $role->name        = $input['name'];
            $role->slug        = Str::slug($input['name']);
            $role->description = $input['description'];
            $role->save();

            $log          = new UserLog();
            $log->user_id = Auth::user()->id;
            $log->title   = "Created role: {$role->name}.";
            $log->section = "roles";
            $log->link    = "admin/roles/{$role->id}/edit";
            $log->refID   = $role->id;
            $log->type    = 'Create';
            $log->save();

            return Redirect::to('admin/roles')->withStatus('Role created.');
        }

        return Redirect::back()->withInput()->withStatus($validator->errors(), 'danger');
    }

    public function edit($id)
    {
        $role = Role::find($id);

        if ($role === null) {
            return Redirect::to('admin/roles')->withStatus('Role not found', 'danger');
        }

        return $this->getView()
            ->shares('title', 'Edit Role')
            ->with('role', $role);
    }

    public function update($id)
    {
        $role = Role::find($id);

        if($role === null) {
            return Redirect::to('admin/roles')->withStatus('Role not found', 'danger');
        }

        // Validate the Input data.
        $input = Input::only('name', 'description');

        $validator = $this->validator($input, $id);

        if($validator->passes()) {

            $role->name        = $input['name'];
            $role->slug        = Str::slug($input['name']);
            $role->description = $input['description'];
            $role->save();

            $log          = new UserLog();
            $log->user_id = Auth::user()->id;
            $log->title   = "Updated role: {$role->name}.";
            $log->section = "roles";
            $log->link    = "admin/roles/{$role->id}/edit";
            $log->refID   = $role->id;
            $log->type    = 'Update';
            $log->save();

            return Redirect::to('admin/roles')->withStatus('Role Updated.');
        }

        return Redirect::back()->withInput()->withStatus($validator->errors(), 'danger');
    }

    public function destroy($id)
    {
        $role = Role::find($id);

        if($role === null) {
            return Redirect::to('admin/roles')->withStatus('Role not found', 'danger');
        }

        $log          = new UserLog();
        $log->user_id = Auth::user()->id;
        $log->title   = "Deleted role: {$role->name}.";
        $log->section = "admin/roles";
        $log->refID   = $role->id;
        $log->type    = 'Delete';
        $log->save();

        $role->delete();

        return Redirect::to('admin/roles')->withStatus("Role deleted.");
    }

    protected function validator(array $data, $id = null)
    {
        // The Validation rules.
        $rules = array('name' => 'required|min:3|alpha_dash');

        return Validator::make($data, $rules);
    }

}
