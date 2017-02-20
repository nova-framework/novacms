<?php
namespace App\Modules\System\Controllers;

use App\Core\BackendController;
use App\Helpers\Member;
use App\Helpers\Export;
use App\Modules\System\Models\Role;
use App\Modules\System\Models\UserLog;

use Auth;
use Input;
use Str;
use Redirect;
use View;
use Validator;

class UserLogs extends BackendController
{
    public function index()
    {
        $logs     = $this->getLogs()->paginate();
        $sections = UserLog::select('section')->groupby('section')->get();
        $types    = UserLog::select('type')->groupby('type')->get();
        $sources  = UserLog::select('source')->groupby('source')->get();
        $users    = Member::getMembers();

        $queryStrings = [
            'title' => Input::get('title'),
            'daterange' => Input::get('daterange'),
            'link' => Input::get('link'),
            'refID' => Input::get('refID'),
            'user_id' => Input::get('user_id'),
            'section' => Input::get('section'),
            'type' => Input::get('type'),
            'source' => Input::get('source')
        ];

        return $this->getView()
            ->shares('title', 'User Logs')
            ->with('logs', $logs)
            ->with('sections', $sections)
            ->with('types', $types)
            ->with('sources', $sources)
            ->with('users', $users)
            ->with('queryStrings', $queryStrings);
    }

    public function export($type)
    {
        $logs = $this->getLogs()->get();

        if ($type == 'csv') {
            $content = View::fetch('UserLogs/Csv', ['logs' => $logs], 'System');
            Export::csv($content, 'userlogs');
        }

        if ($type == 'pdf') {
            $content = View::fetch('UserLogs/Pdf', ['logs' => $logs], 'System');
            $content = View::fetch('Pdfs/Default', ['content' => $content]);
            Export::pdf($content, 'userlogs', 'D');
        }
    }

    protected function getLogs()
    {
        //init query
        $query = UserLog::orderBy('created_at', 'DESC');

        if (Input::exists('title')) {

            //get form data
            $input     = Input::all();
            $title     = '%'.$input['title'].'%';
            $daterange = $input['daterange'];
            $user_id   = $input['user_id'];
            $link      = '%'.$input['link'].'%';
            $section   = $input['section'];
            $source    = $input['source'];
            $type      = $input['type'];
            $refID     = $input['refID'];

            //do conditions
            if ($title !='') {
                $query->where('title', 'like', $title);
            }

            if ($daterange !='') {
                $parts = explode(' - ', $daterange);
                $from = $parts[0];
                $to = $parts[1].' 23:59:59';
                $query->whereBetween('created_at', array($from, $to));
            }

            if ($user_id !='') {
                $query->where('user_id', $user_id);
            }

            if ($link !='') {
                $query->where('link', 'like', $link);
            }

            if ($section !='') {
                $query->where('section', $section);
            }

            if ($source !='') {
                $query->where('source', $source);
            }

            if ($type !='') {
                $query->where('type', $type);
            }

            if ($refID !='') {
                $query->where('refID', $refID);
            }
        }

        //execute and pass to final variable
        return $query;
    }

}
