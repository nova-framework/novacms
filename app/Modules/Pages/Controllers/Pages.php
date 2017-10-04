<?php
namespace App\Modules\Pages\Controllers;

use App\Controllers\BaseController as Controller;

use App\Modules\Pages\Models\Page;
use App\Modules\Sidebars\Models\Sidebar;

use Auth;
use App;
use DB;
use Input;
use View;
use Request;

class Pages extends Controller
{
	public function fetch()
	{
		//get request url
       	$request = Request::path();

       	//if request is / then load the first record (home page)
		if ($request == '/') {
			$page = Page::where('id', 1)->first();
		} else {
			//load page where it's active and has a published date less then now.
			$page = Page::where('slug', $request)
			->where('active', 'Yes')
			->where('publishedDate', '<=', date('Y-m-d H:i:s'))
			->first();
		}

		//if no record has been found, load a 404 page
		if (empty($page)) {
			App::abort(404);
		}

		//if the layout files does not exists fallback to the Default layout file.
		if (!file_exists(APPDIR.'Themes/'.$this->theme.'/Layouts/'.$page->layout.'.tpl')){
			$page->layout = 'Default';
		}

		//set the page layout
		$this->layout = $page->layout;

		//get the ids of the sidebars
		$ids = explode(',', $page->sidebars);

		//get sidebars
		$leftSidebars  = Sidebar::whereIn('id', $ids)->where('position', 'LIKE', '%Left%')->get();
		$rightSidebars = Sidebar::whereIn('id', $ids)->where('position', 'LIKE', '%Right%')->get();

		//set page meta info
		$meta = "<meta name='description' content='$page->metaDescription' />
	<meta property='og:title' content='$page->pageTitle' />
	<meta property='og:type' content='article' />
	<meta property='og:url' content='".site_url($page->slug)."' />
	<meta property='og:image' content='".theme_url('images/nova.png', 'Bootstrap')."' />
	<meta property='og:description' content='$page->metaDescription' />";

		//load a view from app/Modules/Pages/Views/Pages/Fetch.tpl file
		return $this->createView()
		->shares('title', $page->browserTitle)
		->shares('meta', $meta)
		->with(compact('content', 'leftSidebars', 'rightSidebars', 'page'));

	}

	public function updateAjax()
	{
		if (Auth::check()) {

			$input   = Input::all();

			//assign post data
			$id      = $input['id'];
			$col     = $input['col'];
			$content = $input['content'];

			if ($col == 'pageTitle') {
				$content = strip_tags($content);
				$content = trim($content);
			}

			//get page record
			$page    = Page::find($id);

			if ($col == 'content') {

				//if page content has been changed
		    	if ($page->content != $content) {

		    		DB::table('page_revisions')->insert([
		    			'pageID' => $page->id,
		    			'content' => $page->content,
		    			'addedBy' => Auth::id()
		    		]);
		    	}
		    }

			//update if not empty
			if ($page != null) {
				$page->{$col} = $content;
				$page->save();
			}
		}
	}
}
