<?php
namespace App\Controllers\Admin;

use App\Core\BackendController;
use App\Models\Sidebar;
use Config;
use Input;
use Redirect;
use Validator;

class Sidebars extends BackendController
{
	public function index()
	{
		$sidebars = Sidebar::paginate(25);
		$leftSidebars = Sidebar::where('position', 'LIKE', '%Left%')->paginate(25);
		$rightSidebars = Sidebar::where('position', 'LIKE', '%Right%')->paginate(25);
	    return $this->getView()
	    ->shares('title', 'Manage Sidebars')
	    ->withLeftSidebars($leftSidebars)
	    ->withRightSidebars($rightSidebars)
	    ->withSidebars($sidebars);
	}

	public function create()
	{
		return $this->getView()->shares('title', 'Create Sidebar');
	}

	public function store()
	{
	    $input = Input::only('title', 'content', 'position', 'class');

	    $validate = $this->validate($input);

	    if ($validate->passes()) {

	    	//save
	    	$sidebar = new Sidebar();

	    	if (is_array($input['position'])) {
	    		$sidebar->position = implode(',', $input['position']);
	    	}
	    	
	    	$sidebar->title = $input['title'];
	    	$sidebar->content = $input['content'];
	    	$sidebar->class = $input['class'];
	    	$sidebar->save();

	    	return Redirect::to('admin/sidebars')->withStatus('Sidebar Created');
	    } 

	    return Redirect::back()->withStatus($validate->errors(), 'danger')->withInput();

	}

	public function edit($id)
	{
		$sidebar = Sidebar::find($id);

		if ($sidebar === null) {
			return Redirect::to('admin/sidebars')->withStatus('Sidebar not found', 'danger');
		}

	    return $this->getView()->shares('title', 'Edit Sidebae')->withSidebar($sidebar);
	}

	public function update($id)
	{
		$sidebar = Sidebar::find($id);

		if ($sidebar === null) {
			return Redirect::to('admin/sidebars')->withStatus('sidebar not found', 'danger');
		}

	    $input = Input::only('title', 'content', 'position', 'class');

	    $validate = $this->validate($input);

	    if ($validate->passes()) {

	    	if (is_array($input['position'])) {
	    		$sidebar->position = implode(',', $input['position']);
	    	}

	    	//save
	    	$sidebar->title = $input['title'];
	    	$sidebar->content = $input['content'];
	    	$sidebar->class = $input['class'];
	    	$sidebar->save();

	    	return Redirect::to('admin/sidebars')->withStatus('Sidebar Updated');
	    } 

	    return Redirect::back()->withStatus($validate->errors(), 'danger')->withInput();
	}

	public function destroy($id)
	{
	    $sidebar = Sidebar::find($id);

		if ($sidebar === null) {
			return Redirect::to('admin/sidebars')->withStatus('sidebar not found', 'danger');
		}

		$sidebar->delete();

		return Redirect::to('admin/sidebars')->withStatus('Sidebar Deleted');
	}

	protected function validate($data) 
	{
		$rules = [
			'title' => 'required|min:3',
			'position' => 'required'
		];

		return Validator::make($data, $rules);
	}
}



