<?php
namespace App\Modules\Pages\Controllers;

use App\Core\Controller;

use App\Modules\Pages\Models\Page;
use App\Modules\Sidebars\Models\Sidebar;

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
			return View::make('Error/404')->shares('title', 'Page not found!');
		}

		//if the layout files does not exists fallback to the Default layout file.
		if (!file_exists(APPDIR.'Themes/'.$this->theme.'/Layouts/'.$page->layout.'.tpl')){
			$page->layout = 'Default';
		}

		//set the page layout
		$this->layout = $page->layout;

		//get the ids of the sidebars
		$ids = explode(',', $page->sidebars);

		$leftSidebars  = Sidebar::whereIn('id', $ids)->where('position', 'LIKE', '%Left%')->get();
		$rightSidebars = Sidebar::whereIn('id', $ids)->where('position', 'LIKE', '%Right%')->get();

		$meta = "<meta name='description' content='$page->metaDescription' />
	<meta property='og:title' content='$page->pageTitle' />
	<meta property='og:type' content='article' />
	<meta property='og:url' content='".site_url($page->slug)."' />
	<meta property='og:image' content='".theme_url('images/nova.png', 'Bootstrap')."' />
	<meta property='og:description' content='$page->metaDescription' />";

		//load a view using the app/Views/Default file
		return View::make('Default')
		->shares('title', $page->browserTitle)
		->shares('meta', $meta)
		->shares('browserTitle', $page->pageTitle)
		->shares('leftSidebars', $leftSidebars)
		->shares('rightSidebars', $rightSidebars)
		->shares('pageID', $page->id)
		->with('content', $page->content);

	}
}
