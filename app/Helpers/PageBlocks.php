<?php
namespace App\Helpers;

use DB;

class PageBlocks
{
	public static function get($pageID, $title, $type)
	{
	    $result = DB::table('page_blocks')->where('pageID', $pageID)->where('title', $title)->where('type', $type)->count();
	    if ($result == 0) {
	    	DB::table('page_blocks')->insert([
	    		'pageID' => $pageID,
	    		'title' => $title,
	    		'type' => $type
	    	]);
	    }

	    return DB::table('page_blocks')->where('pageID', $pageID)->where('title', $title)->where('type', $type)->pluck('content');
	}
}
