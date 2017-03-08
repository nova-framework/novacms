<?php
/**
 * Dasboard - Implements a simple Administration Dashboard.
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */

namespace App\Modules\System\Controllers;

use App\Core\BackendController;
use App\Modules\System\Models\UserLog;

use Auth;

class Dashboard extends BackendController
{
    public function index()
    {
        return $this->getView()->shares('title', 'Dashboard');
    }
}
