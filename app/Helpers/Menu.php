<?php
namespace App\Helpers;

class Menu
{
    private $menu;
    private $type;

    public function __construct($json, $type)
    {
        $this->menu = json_decode($json, true);
        $this->type = $type;
        $this->menu = $this->buildMenu($this->menu);
    }

    private function buildMenu($menuArray, $isSub = false)
    {
        if (empty($menuArray)) {
            return;
        }
        
        if ($this->type == 'Bootstrap') {

            $ul_attrs = $isSub ? 'class="dropdown-menu"' : 'class="nav navbar-nav"';
            $menu = "<ul $ul_attrs>";

            foreach ($menuArray as $id => $attrs) {
              $sub = isset($attrs['children']) ? $this->buildMenu($attrs['children'], true) : null;
              $li_attrs = $sub ? 'class="dropdown-submenu"' : null;
              $a_attrs  = $sub ? 'class="dropdown-toggle" data-toggle="dropdown"' : null;
              $carat    = $sub ? '<span class="caret"></span>' : null;
              $menu .= "<li $li_attrs>";
              $menu .= "<a href='${attrs['slug']}' $a_attrs>${attrs['title']}$carat</a>$sub";
              $menu .= "</li>";
            }

            return $menu . "</ul>";

        } elseif ($this->type == 'Plain') {
            $menu = "<ul>";
            foreach($menuArray as $id => $attrs) {
              $sub = isset($attrs['children']) ? $this->buildMenu($attrs['children'], true) : null;
              $menu .= "<li>";
              $menu .= "<a href='${attrs['slug']}'>${attrs['title']}</a>$sub";
              $menu .= "</li>";
            }
            return $menu . "</ul>";
        }
    }

    public function get()
    {
        return $this->menu;
    }
}
