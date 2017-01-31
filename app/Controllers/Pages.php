<?php
namespace App\Controllers;

use App\Core\Controller;
use View;
use Request;
use App\Models\Page;
use App\Models\Sidebar;

class Pages extends Controller
{
	public function fetch()
	{
       $request = Request::path();

		if ($request == '/') {
			$page = Page::where('id', 1)->first();
		} else {
			$page = Page::
			where('slug', $request)
			->where('active', 'Yes')
			->where('publishedDate', '<=', date('Y-m-d H:i:s'))
			->first();
		}

		if (empty($page)) {
			return View::make('Error/404')->shares('title', 'Page not found!');
		}

		if (!file_exists(APPDIR.'Templates/'.$this->template.'/'.$page->layout.'.php')){
			$page->layout = 'default';
		}

		$this->layout = $page->layout;
		$ids = explode(',', $page->sidebars);

		$leftSidebars = Sidebar::whereIn('id', $ids)->where('position', 'LIKE', '%Left%')->get();
		$rightSidebars = Sidebar::whereIn('id', $ids)->where('position', 'LIKE', '%Right%')->get();

		return View::make('Default')
		->shares('title', $page->pageTitle)
		->shares('browserTitle', $page->browserTitle)
		->shares('leftSidebars', $leftSidebars)
		->shares('rightSidebars', $rightSidebars)
		->shares('pageID', $page->id)
		->withContent($page->content);

	}
}
