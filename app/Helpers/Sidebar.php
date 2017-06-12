<?php
namespace App\Helpers;

use App\Modules\System\Models\Dept;
use App\Modules\Menus\Models\Menu as MenuCollection;
use App\Helpers\Menu as Nav;

class Sidebar
{
    /**
     * load any menu from the menu tag should it exist in the content
     * @param  string $content the content
     * @return string $content the updated content
     */
    public static function display($content)
    {
        $menus = MenuCollection::all();
        foreach ($menus as $menurow) {
            $pos = strpos($content, $menurow->tag);
            if ($pos !== false) {
                $navbar = new Nav($menurow->content, $menurow->type);
                $content = str_replace($menurow->tag, $navbar->get(), $content);
            }
        }

        return $content;
    }
}
