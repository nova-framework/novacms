<?php
/**
 * BackendController - A backend Controller for the included example Modules.
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */

namespace App\Modules\System\Controllers;

use Nova\Support\Facades\Auth;
use Nova\Support\Facades\Event;
use Nova\Support\Facades\Redirect;
use Nova\Support\Facades\View;

use App\Controllers\BaseController as Controller;


abstract class BaseController extends Controller
{
    /**
     * The currently used Theme.
     *
     * @var string
     */
    protected $theme = 'AdminLite';

    /**
     * The currently used Layout.
     *
     * @var mixed
     */
    protected $layout = 'Backend';


    /**
     * Method executed before any action.
     */
    protected function initialize()
    {
        parent::initialize();

        // Setup the main Menu.
        if (Auth::check()) {
            // The User is logged in; setup the Backend Menu.
            $user = Auth::user();

            View::share('menuItems', $this->getMenuItems($user, 'backend.menu'));
            View::share('menuItemsSystem', $this->getMenuItems($user, 'backend.menu.system'));
            View::share('menuItemsModules', $this->getMenuItems($user, 'backend.menu.modules'));
            View::share('menuItemsQuickCreate', $this->getMenuItems($user, 'backend.menu.quickcreate'));
        }
    }

    protected function getMenuItems($user, $menuName)
    {
        $items = array();

        // Prepare the Event payload.
        $payload = array($user);

        // Fire the Event 'backend.menu' and store the results.
        $results = Event::fire($menuName, $payload);

        // Merge all results on a menu items array.
        foreach ($results as $result) {
            if (is_array($result) && ! empty($result)) {
                $items = array_merge($items, $result);
            }
        }

        // Sort the menu items by their weight and title.
        if (! empty($items)) {
            $items = array_sort($items, function($value) {
                return $value['weight'] .' - ' .$value['title'];
            });
        }

        return $items;
    }
}
