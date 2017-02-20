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
        /*$cronjobs = array();
        $cronjobs['App\Modules\System\Crons\DoIt'] = '42 * * * *';
        $cronjobs['App\Modules\System\Crons\Report'] = '40 * * * *';
        $cronjobs['monthly_sales_report'] = '0 5 1,15 * *';
        $cronjobs['purchase_report'] = '0 10 15 02 *';

        foreach ($cronjobs as $class => $cron) {
            if ($this->isTimeCron(time(), $cron)) {
                $result = $class::run();
                echo $result;
            }
        }*/

        return $this->getView()->shares('title', 'Dashboard');
    }

    /**
        Test if a timestamp matches a cron format or not
        //$cron = '5 0 * * *';
    */
    protected function isTimeCron($time, $cron)
    {
        $cron_parts = explode(' ' , $cron);
        if(count($cron_parts) != 5)
        {
            return false;
        }

        list($min , $hour , $day , $mon , $week) = explode(' ' , $cron);

        $to_check = array('min' => 'i' , 'hour' => 'G' , 'day' => 'j' , 'mon' => 'n' , 'week' => 'w');

        $ranges = array(
            'min' => '0-59' ,
            'hour' => '0-23' ,
            'day' => '1-31' ,
            'mon' => '1-12' ,
            'week' => '0-6' ,
        );

        foreach($to_check as $part => $c)
        {
            $val = $$part;
            $values = array();

            /*
                For patters like 0-23/2
            */
            if(strpos($val , '/') !== false)
            {
                //Get the range and step
                list($range , $steps) = explode('/' , $val);

                //Now get the start and stop
                if($range == '*')
                {
                    $range = $ranges[$part];
                }
                list($start , $stop) = explode('-' , $range);

                for($i = $start ; $i <= $stop ; $i = $i + $steps)
                {
                    $values[] = $i;
                }
            }
            /*
                For patters like :
                2
                2,5,8
                2-23
            */
            else
            {
                $k = explode(',' , $val);

                foreach($k as $v)
                {
                    if(strpos($v , '-') !== false)
                    {
                        list($start , $stop) = explode('-' , $v);

                        for($i = $start ; $i <= $stop ; $i++)
                        {
                            $values[] = $i;
                        }
                    }
                    else
                    {
                        $values[] = $v;
                    }
                }
            }

            if ( !in_array( date($c , $time) , $values ) and (strval($val) != '*') )
            {
                return false;
            }
        }

        return true;
    }
}
