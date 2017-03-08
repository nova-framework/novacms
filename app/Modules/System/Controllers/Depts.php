<?php
namespace App\Modules\System\Controllers;

use App\Core\BackendController;
use App\Modules\System\Models\Dept;
use App\Modules\System\Models\UserLog;use App\Helpers\Member;
use App\Helpers\Export;

use Auth;
use Input;
use Redirect;
use View;
use Validator;

class Depts extends BackendController
{
    public function index()
    {
        $depts = $this->getLogs()->paginate();
        $queryStrings = ['title' => Input::get('title')];

        return $this->getView()
            ->shares('title', 'Depts')
            ->with('depts', $depts)
            ->with('queryStrings', $queryStrings);
    }

    protected function getLogs()
    {
        //init query
        $query = Dept::orderBy('title');

        if (Input::exists('title')) {

            //get form data
            $input  = Input::all();
            $title  = '%'.$input['title'].'%';

            //do conditions
            if ($title !='') {
                $query->where('title', 'like', $title);
            }

        }

        //execute and pass to final variable
        return $query;
    }

    public function export($type)
    {
        $depts = $this->getLogs()->get();

        if ($type == 'csv') {
            $content = View::fetch('Depts/Csv', ['depts' => $depts], 'System');
            Export::csv($content, 'depts');
        }

        if ($type == 'pdf') {
            $content = View::fetch('Depts/Pdf', ['depts' => $depts], 'System');
            $content = View::fetch('Pdfs/Default', ['content' => $content]);
            Export::pdf($content, 'depts', 'D');
        }
    }

    public function create()
    {
        return $this->getView()->shares('title', 'Create Dept');
    }

    public function store()
    {
        // Validate the Input data.
        $input = Input::all();

        $validator = $this->validate($input);

        if ($validator->passes()) {
            $dept              = new Dept();
            $dept->title       = $input['title'];
            $dept->save();

            $log          = new UserLog();
            $log->user_id = Auth::user()->id;
            $log->title   = "Created dept: {$dept->title}.";
            $log->section = "depts";
            $log->link    = "admin/depts/{$dept->id}/edit";
            $log->refID   = $dept->id;
            $log->type    = 'Create';
            $log->save();

            return Redirect::to('admin/depts')->withStatus('Dept created.');
        }

        return Redirect::back()->withInput()->withStatus($validator->errors(), 'danger');
    }

    public function edit($id)
    {
        $dept = Dept::find($id);

        if ($dept === null) {
            return Redirect::to('admin/depts')->withStatus('Dept not found', 'danger');
        }

        return $this->getView()
            ->shares('title', 'Edit Dept')
            ->with('dept', $dept);
    }

    public function update($id)
    {
        $dept = Dept::find($id);

        if($dept === null) {
            return Redirect::to('admin/depts')->withStatus('Dept not found', 'danger');
        }

        // Validate the Input data.
        $input = Input::all();

        $validator = $this->validate($input, $id);

        if($validator->passes()) {

            $dept->title = $input['title'];
            $dept->save();

            $log          = new UserLog();
            $log->user_id = Auth::user()->id;
            $log->title   = "Updated dept: {$dept->title}.";
            $log->section = "depts";
            $log->link    = "admin/depts/{$dept->id}/edit";
            $log->refID   = $dept->id;
            $log->type    = 'Update';
            $log->save();

            return Redirect::to('admin/depts')->withStatus('Dept Updated.');
        }

        return Redirect::back()->withInput()->withStatus($validator->errors(), 'danger');
    }

    public function destroy($id)
    {
        $dept = Dept::find($id);

        if($dept === null) {
            return Redirect::to('admin/depts')->withStatus('Dept not found', 'danger');
        }

        $log          = new UserLog();
        $log->user_id = Auth::user()->id;
        $log->title   = "Deleted dept: {$dept->title}.";
        $log->section = "depts";
        $log->refID   = $dept->id;
        $log->type    = 'Delete';
        $log->save();

        $dept->delete();

        return Redirect::to('admin/depts')->withStatus("Dept deleted.");
    }

    protected function validate(array $data, $id = null)
    {
        // The Validation rules.
        $rules = array('title' => 'required|min:3|alpha_dash');

        return Validator::make($data, $rules);
    }

}
