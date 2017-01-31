<?php
namespace App\Helpers;

use App\Models\Menu;
use App\Helpers\Menu as Nav;
use DB;

class GlobalBlocks
{
	public static function get($title, $type)
    {
        $result = DB::table('global_blocks')->where('title', $title)->where('type', $type)->count();
        if ($result == 0) {
			DB::table('global_blocks')->insert([
	    		'title' => $title,
	    		'type' => $type
	    	]);
	    }

	    $block = DB::table('global_blocks')->where('title', $title)->where('type', $type)->first();

		$menus = Menu::all();
		foreach ($menus as $row) {
            $pos = strpos($block->content,$row->tag);
            if ($pos !== false) {
				$navbar = new Nav($row->content, $row->type);
				$block->content = str_replace($row->tag, $navbar->get(), $block->content);
            }
        }

		return $block->content;
	}
}
