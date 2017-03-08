<?php
namespace App\Modules\Pages\Controllers;

use App\Core\BackendController;
use App\Modules\Pages\Models\Page;
use App\Modules\Sidebars\Models\Sidebar;
use App\Modules\System\Models\UserLog;

use Auth;
use Config;
use DB;
use Document;
use Input;
use Redirect;
use Str;
use Validator;

class Admin extends BackendController
{
	public function index()
	{
		$pages = Page::paginate(25);
	    return $this->getView()->shares('title', 'Manage Pages')->withPages($pages);
	}

	public function create()
	{
		$layoutfiles = $this->getLayoutFiles();
		$leftSidebars = Sidebar::where('position', 'LIKE', '%Left%')->get();
		$rightSidebars = Sidebar::where('position', 'LIKE', '%Right%')->get();

	 	return $this->getView()
	 	->shares('title', 'Create Page')
	 	->withLayouts($layoutfiles)
	 	->withLeftSidebars($leftSidebars)
	 	->withRightSidebars($rightSidebars);
	}

	public function store()
	{
	    $input = Input::only('browserTitle', 'pageTitle', 'active', 'publishedDate', 'content', 'layout', 'sidebars');

	    $validate = $this->validate($input);

	    if ($validate->passes()) {

	    	$slug = Str::slug($input['pageTitle']);

	    	//save
	    	$page = new Page();

	    	if (is_array($input['sidebars'])) {
	    		$page->sidebars = implode(',', $input['sidebars']);
	    	}

	    	$page->browserTitle = $input['browserTitle'];
	    	$page->pageTitle = $input['pageTitle'];
	    	$page->slug = $slug;
	    	$page->active = $input['active'];
	    	$page->publishedDate = $input['publishedDate'];
	    	$page->content = $input['content'];
	    	$page->layout = $input['layout'];
	    	$page->save();

	    	$log          = new UserLog();
            $log->user_id = Auth::user()->id;
            $log->title   = "Created page: {$page->pageTitle}.";
            $log->section = "pages";
            $log->link    = "admin/pages/{$page->id}/edit";
            $log->refID   = $page->id;
            $log->type    = 'Create';
            $log->save();

	    	return Redirect::to('admin/pages')->withStatus('Page Created');
	    }

	    return Redirect::back()->withStatus($validate->errors(), 'danger')->withInput();

	}

	public function edit($id)
	{
		$page = Page::find($id);
		$revisions = DB::table('page_revisions')->where('pageID', $id)->get();
		$pageblocks = DB::table('page_blocks')->where('pageID', $id)->get();

		if ($page === null) {
			return Redirect::to('admin/pages')->withStatus('Page not found', 'danger');
		}

	    $layoutfiles = $this->getLayoutFiles();
	    $leftSidebars = Sidebar::where('position', 'LIKE', '%Left%')->get();
		$rightSidebars = Sidebar::where('position', 'LIKE', '%Right%')->get();

	 	return $this->getView()->shares('title', 'Edit Page')
	 	->withLayouts($layoutfiles)
	 	->withPage($page)
	 	->withLeftSidebars($leftSidebars)
	 	->withRightSidebars($rightSidebars)
	 	->withRevisions($revisions)
	 	->withPageBlocks($pageblocks);
	}

	public function update($id)
	{
		$page = Page::find($id);

		if ($page === null) {
			return Redirect::to('admin/pages')->withStatus('Page not found', 'danger');
		}

	    $input = Input::only('browserTitle', 'pageTitle', 'active', 'publishedDate', 'content', 'layout', 'sidebars');

	    $validate = $this->validate($input);

	    if ($validate->passes()) {

	    	$slug = Str::slug($input['pageTitle']);

	    	if (is_array($input['sidebars'])) {
	    		$page->sidebars = implode(',', $input['sidebars']);
	    	} else {
	    		$page->sidebars = null;
	    	}

	    	//if page content has been changed
	    	if ($page->content != $input['content']) {

	    		$user = Auth::user();

	    		DB::table('page_revisions')->insert([
	    			'pageID' => $id,
	    			'content' => $page->content,
	    			'addedBy' => $user->id
	    		]);
	    	}

	    	if ($id == 1) {
	    		$slug = null;
	    	}

	    	//save
	    	$page->browserTitle = $input['browserTitle'];
	    	$page->pageTitle = $input['pageTitle'];
	    	$page->slug = $slug;
	    	$page->active = $input['active'];
	    	$page->publishedDate = $input['publishedDate'];
	    	$page->content = $input['content'];
	    	$page->layout = $input['layout'];
	    	$page->save();

	    	$log          = new UserLog();
            $log->user_id = Auth::user()->id;
            $log->title   = "Updated page: {$page->pageTitle}.";
            $log->section = "pages";
            $log->link    = "admin/pages/{$page->id}/edit";
            $log->refID   = $page->id;
            $log->type    = 'Create';
            $log->save();

	    	return Redirect::to('admin/pages')->withStatus('Page Updated');
	    }

	    return Redirect::back()->withStatus($validate->errors(), 'danger')->withInput();
	}

	public function updatePageBlocks()
	{
	    $input = Input::only('id', 'content');

	    if (is_array($input['id'])) {

		    $i = 0;
		    foreach($input['id'] as $id) {
		    	DB::table('page_blocks')->where('id', $id)->update(['content' => $input['content'][$i]]);
		    	$i++;
		    }

		}

	    return Redirect::back()->withStatus('Page Blocks Updated');

	}

	public function destroy($id)
	{
	    $page = Page::find($id);

		if ($page === null) {
			return Redirect::to('admin/pages')->withStatus('Page not found', 'danger');
		}

		$log          = new UserLog();
        $log->user_id = Auth::user()->id;
        $log->title   = "Deleted page: {$page->pageTitle}.";
        $log->section = "pages";
        $log->refID   = $page->id;
        $log->type    = 'Delete';
        $log->save();

		$page->delete();

		return Redirect::to('admin/pages')->withStatus('Page Deleted');
	}

	public function destroyPageBlock($id)
	{
	    $block = DB::table('page_blocks')->where('id', $id)->first();

		if ($block === null) {
			return Redirect::back()->withStatus('Page block not found', 'danger');
		}

		DB::table('page_blocks')->where('id', $id)->delete();

		return Redirect::back()->withStatus('Page block Deleted');
	}

	public function restoreRevision($id)
	{
	    $revision = DB::table('page_revisions')->where('id', $id)->first();

		if ($revision === null) {
			return Redirect::back()->withStatus('Revision not found', 'danger');
		}

		$page = Page::find($revision->pageID);
		$page->content = $revision->content;
		$page->save();

		return Redirect::back()->withStatus('Revision Restored');
	}

	protected function getLayoutFiles()
	{
		$layoutFiles = [];
		$template = Config::get('app.theme');
		$path = APPDIR.'Themes'.DS.$template.DS.'Layouts'.DS;

		$ignore = ['message'];

		foreach(glob($path.'*.tpl') as $file) {
			$file = str_replace($path, '', $file);
			$file = Document::removeExtension($file);

			if (!in_array($file, $ignore)) {
				$layoutFiles[] = $file;
			}
		}

		return $layoutFiles;
	}

	protected function validate($data)
	{
		$rules = [
			'browserTitle' => 'required|min:3|alpha_dash',
			'pageTitle' => 'required|min:3|alpha_dash',
			'publishedDate' => 'required|min:3|date'
		];

		$attributes = [
			'browserTitle' => 'browser title',
			'pageTitle' => 'page title',
			'publishedDate' => 'published date',
		];

		return Validator::make($data, $rules, [], $attributes);
	}
}
