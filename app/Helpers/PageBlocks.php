<?php
namespace App\Helpers;

use App\Modules\Menus\Models\Menu as MenuCollection;
use App\Helpers\Menu as Nav;
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

	    $block = DB::table('page_blocks')->where('pageID', $pageID)->where('title', $title)->where('type', $type)->first();

	    $menus = MenuCollection::all();
        foreach ($menus as $row) {
            $pos = strpos($block->content, $row->tag);
            if ($pos !== false) {
                $navbar = new Nav($row->content, $row->type);
                $block->content = str_replace($row->tag, $navbar->get(), $block->content);
            }
        }

        return $block->content;
	}
}
