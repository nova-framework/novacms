<?php
namespace App\Modules\BaseModuleController\Controllers;

use App\Core\BackendController;

use App\Modules\System\Models\UserLog;
use App\Modules\BaseModuleController\Models\BaseModuleModal;
use App\Helpers\Export;

use Auth;
use Input;
use Redirect;
use Validator;
use View;

class Admin extends BackendController
{
	public function index()
	{
		$records = $this->getRecords()->paginate();

		$queryStrings = [
            'title' => Input::get('title')
        ];

		return $this->getView()
			->shares('title', 'BaseModuleTitle')
			->with(compact('records', 'queryStrings'));
	}

	protected function getRecords()
    {
        //init query
        $query = BaseModuleModal::orderBy('title');

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
        $records = $this->getRecords()->get();

        if ($type == 'csv') {
            $content = View::fetch('Admin/Csv', ['records' => $records], 'BaseModuleController');
            Export::csv($content, 'BaseModuleSlug');
        }

        if ($type == 'pdf') {
            $content = View::fetch('Admin/Pdf', ['records' => $records], 'BaseModuleController');
            $content = View::fetch('Pdfs/Default', ['content' => $content]);
            Export::pdf($content, 'BaseModuleSlug', 'P');
        }
    }

	public function create()
	{
		return $this->getView()->shares('title', 'Create');
	}

	public function store()
	{
	    $input = Input::all();

	    $validate = $this->validate($input);

	    if ($validate->passes()) {

	    	//save
	    	$record         = new BaseModuleModal();
			$record->title  = $input['title'];
	    	$record->save();

	    	$log          = new UserLog();
	        $log->user_id = Auth::user()->id;
	        $log->title   = "Created BaseModuleTitle";
	        $log->section = 'BaseModuleTitle';
	        $log->link    = "admin/BaseModuleSlug/{$record->id}/edit";
	        $log->refID   = $record->id;
	        $log->type    = "Create";
	        $log->save();

	    	return Redirect::to('admin/BaseModuleSlug')->withStatus('Created successfully.');
	    }

	    return Redirect::back()->withStatus($validate->errors(), 'danger')->withInput();

	}

	public function edit($id)
	{
        $record = BaseModuleModal::find($id);

		if ($record === null) {
			return Redirect::to('admin/BaseModuleSlug')->withStatus('Record not found', 'danger');
		}

	    return $this->getView()
	    	->shares('title', 'Edit')
	    	->with('record', $record);
	}

	public function update($id)
	{
        $record = BaseModuleModal::find($id);

		if ($record === null) {
			return Redirect::to('admin/BaseModuleSlug')->withStatus('Record not found', 'danger');
		}

	    $input = Input::all();

	    $validate = $this->validate($input);

	    if ($validate->passes()) {

	    	//save
			$record->title  = $input['title'];
	    	$record->save();

	    	$log          = new UserLog();
	        $log->user_id = Auth::user()->id;
	        $log->title   = "Updated BaseModuleController $record->title";
	        $log->section = "BaseModuleTitle";
	        $log->link    = "admin/BaseModuleSlug/{$record->id}/edit";
	        $log->refID   = $record->id;
	        $log->type    = "Update";
	        $log->save();

	    	return Redirect::to('admin/BaseModuleSlug')->withStatus('Updated');
	    }

	    return Redirect::back()->withStatus($validate->errors(), 'danger')->withInput();
	}

	public function destroy($id)
	{
        $record = BaseModuleModal::find($id);

		if ($record === null) {
			return Redirect::to('admin/BaseModuleSlug')->withStatus('Record not found', 'danger');
		}

		$log          = new UserLog();
        $log->user_id = Auth::user()->id;
        $log->title   = "Deleted BaseModuleController: $record->title";
        $log->section = "BaseModuleTitle";
        $log->refID   = $record->id;
        $log->type    = "Delete";
        $log->save();

		$link->delete();

		return Redirect::to('admin/BaseModuleSlug')->withStatus('Deleted');
	}

	protected function validate($data)
	{
		$rules = [
			'title' => 'required|min:3'
		];

		return Validator::make($data, $rules);
	}
}
