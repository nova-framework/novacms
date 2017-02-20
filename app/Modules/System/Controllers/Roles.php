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
        $log          = new UserLog();
        $log->user_id = Auth::user()->id;
        $log->title   = "Viewed create roles page.";
        $log->section = "roles";
        $log->link    = "cp/roles/create";
        $log->save();
        return $this->getView()->shares('title', 'Create Role');
    }

    public function store()
    {
        // Validate the Input data.
        $input = Input::only('name', 'description');

        $validator = $this->validate($input);

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
            $log->link    = "cp/roles/{$role->id}/edit";
            $log->refID   = $role->id;
            $log->type    = 'Create';
            $log->save();

            return Redirect::to('cp/roles')->withStatus('Role created.');
        }

        return Redirect::back()->withInput()->withStatus($validator->errors(), 'danger');
    }

    public function edit($id)
    {
        $role = Role::find($id);

        if ($role === null) {
            return Redirect::to('cp/roles')->withStatus('Role not found', 'danger');
        }

        $log          = new UserLog();
        $log->user_id = Auth::user()->id;
        $log->title   = "Viewed roles edit page: {$role->name}.";
        $log->section = "roles";
        $log->link    = "cp/roles/{$role->id}/edit";
        $log->refID   = $role->id;
        $log->save();

        return $this->getView()
            ->shares('title', 'Edit Role')
            ->with('role', $role);
    }

    public function update($id)
    {
        $role = Role::find($id);

        if($role === null) {
            return Redirect::to('cp/roles')->withStatus('Role not found', 'danger');
        }

        // Validate the Input data.
        $input = Input::only('name', 'description');

        $validator = $this->validate($input, $id);

        if($validator->passes()) {

            $role->name        = $input['name'];
            $role->slug        = Str::slug($input['name']);
            $role->description = $input['description'];
            $role->save();

            $log          = new UserLog();
            $log->user_id = Auth::user()->id;
            $log->title   = "Updated role: {$role->name}.";
            $log->section = "roles";
            $log->link    = "cp/roles/{$role->id}/edit";
            $log->refID   = $role->id;
            $log->type    = 'Update';
            $log->save();

            return Redirect::to('cp/roles')->withStatus('Role Updated.');
        }

        return Redirect::back()->withInput()->withStatus($validator->errors(), 'danger');
    }

    public function destroy($id)
    {
        $role = Role::find($id);

        if($role === null) {
            return Redirect::to('cp/roles')->withStatus('Role not found', 'danger');
        }

        $log          = new UserLog();
        $log->user_id = Auth::user()->id;
        $log->title   = "Deleted role: {$role->name}.";
        $log->section = "cp/roles";
        $log->refID   = $role->id;
        $log->type    = 'Delete';
        $log->save();

        $role->delete();

        return Redirect::to('cp/roles')->withStatus("Role deleted.");
    }

    protected function validate(array $data, $id = null)
    {
        // The Validation rules.
        $rules = array('name' => 'required|min:3|alpha_dash');

        return Validator::make($data, $rules);
    }

}
