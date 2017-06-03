<?php
namespace App\Helpers;

use App\Modules\System\Models\User;
use App\Modules\System\Models\UserLog;

use Auth;
use Config;
use Redirect;
use Request;
use Session;
use DB;

class Member
{
	public static function check($user)
	{
	    if ($user->active != 'Yes') {

            $log = new UserLog();
            $log->user_id = $user->id;
            $log->title = 'account has been deactivated.';
            $log->section = 'users';
            $log->save();

            Auth::logout();

            return Redirect::to('')->withStatus('Your account is no longer active.', 'danger');
        }

        if ($user->officeLoginOnly == 'Yes'){

            $allowlist = Config::get('app.ipAccessList');

            if (!array_key_exists($_SERVER['REMOTE_ADDR'], $allowlist)) {

                $log          = new UserLog();
                $log->user_id = Auth::user()->id;
                $log->title   = "Attempted to login from an unauthorised location. User set to office login only.";
                $log->section = "users";
                $log->refID   = $user->id;
                $log->type    = 'Auth';
                $log->save();

                Auth::logout();

                return Redirect::to('')->withStatus('This system cannot be accessed from your location.', 'danger');
            }

        }


	    if (Session::get('changelogin') == true && Request::path() !='users/'.$user->id.'/edit') {
    		header('Location: '.site_url('users/'.$user->id.'/edit'));
			exit;
		}

		if ($user->forceChangePassword == 'Yes' && Request::path() !='users/'.$user->id.'/edit') {
            Session::set('changelogin', true);
            header('Location: '.site_url('users/'.$user->id.'/edit'));
			exit;
        }

	}

	/**
	 * get
	 * get column from users table for logged in user or when $id is passed user the user id.
	 * @param  string $column name of the column in the users table
	 * @param  integar $id    id of the user
	 * @return string         return the data from the column.
	 */
	public static function get($column, $id = null)
	{
        if ($id == null) {
            if (Auth::check()) {
                $id = Auth::user();
            }
        }

        $user = self::getData($id);

        return $user->$column;

	}

    /**
     * getMembers
     * get all users that are active
     * @param  boolean $active if active is true or false
     * @return string  return the data.
     */
    public static function getMembers($active = true)
    {
        $query = user::orderBy('username');

        if ($active == true) {
            $query->where('active', 'Yes');
        }

        //execute and pass to final variable
        return $query->get();
    }

	/**
	 * getAll
	 * get all columns from users table for logged in user or when $id is passed user the user id.
	 * @param  integar $id    id of the user
	 * @return string         return the data from the column.
	 */
	public static function getAll($id = null)
	{
		//if user is logged in
        if (Auth::check()) {
        	if ($id === null) {
				return Auth::user();
			}

			$user = self::getData($id);

		    return $user;
		}
	}

	/**
	 * getData
	 * find user from users table
	 * @param  integar $id    id of the user
	 * @return object         return the users object
	 */
	private static function getData($id)
	{
		$user = User::find($id);

		if ($user === null) {
            return "user: $id not found.";
        }

        return $user;
	}
}
