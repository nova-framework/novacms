<?php
namespace App\Modules\System\Controllers;

use App\Modules\System\Controllers\BaseController as Controller;
use App\Modules\System\Models\UserLog;

use Auth;
use Redirect;

class Errors extends Controller
{
    public function __construct()
    {
        $this->beforeFilter('role:administrator');
    }

    public function errorLog()
    {
        $logs = file_get_contents(ROOTDIR.'storage/logs/error.log');

        return $this->getView()
            ->shares('title', 'Error Log')
            ->with('logs', $logs);
    }

    public function clear()
    {
        file_put_contents(ROOTDIR.'storage/logs/error.log', '');

        return Redirect::to('admin/errorlog')->withStatus('Errors have been cleared');

    }
}
