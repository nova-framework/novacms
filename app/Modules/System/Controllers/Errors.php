<?php
namespace App\Modules\System\Controllers;

use App\Core\BackendController;
use App\Modules\System\Models\UserLog;

use Auth;
use Redirect;

class Errors extends BackendController
{
    public function errorLog()
    {
        $logs = file_get_contents(ROOTDIR.'Storage/Logs/error.log');

        return $this->getView()
            ->shares('title', 'Error Log')
            ->with('logs', $logs);
    }

    public function clear()
    {
        file_put_contents(ROOTDIR.'Storage/Logs/error.log', '');

        $log          = new UserLog();
        $log->user_id = Auth::user()->id;
        $log->title   = "Emptied the error log.";
        $log->section = "errorlog";
        $log->link    = "admin/errorlog";
        $log->type    = 'Delete';
        $log->save();

        return Redirect::to('admin/errorlog')->withStatus('Errors have been cleared');

    }
}
