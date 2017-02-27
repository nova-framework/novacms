<?php
/**
 * Authorise - A Controller for managing the User Authentication.
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */

namespace App\Modules\System\Controllers;

use App\Core\BackendController;
use App\Modules\System\Models\UserLog;
use App\Modules\System\Models\User;

use Carbon\Carbon;
use Auth;
use Config;
use Crypt;
use Hash;
use Input;
use Password;
use Mailer;
use Redirect;
use Session;
use Str;
use Validator;


class Authorise extends BackendController
{
    protected $layout = 'Default';

    public function magiclink()
    {
        return $this->getView()
            ->shares('title', 'Login');
    }

    public function sendToken()
    {
        $input = Input::only('email');
        $rules = array('email' => 'required|email|max:255|exists:users,email');

        $validator = Validator::make($input, $rules);

        if($validator->passes()) {

            $email = $input['email'];
            $token = Crypt::encrypt(Str::random(50));
            $content = "<a href='".admin_url("login/magiclink/$token")."'>Click to login</a>";

            $user = User::where('email', $email)->first();
            $user->magic_token = $token;
            $user->magic_token_created_at = Carbon::now();
            $user->save();

            Mailer::send('Emails/Plain', ['content' => $content], function($message) use($email)
            {
                $message->to($email)->subject('Click the magic link to login');
            });

            return Redirect::to('cp/login/magiclink')->withStatus('Link has been emailed.');
        }

        return Redirect::back()->withStatus($validator->errors(), 'danger');
    }

    public function magicLinkLogin($token)
    {
        $user = User::where('magic_token', $token)->first();

        if($user == null) {
           return Redirect::to('cp/login/magiclink')->withStatus('Link has already been used, please request a new link.', 'danger');
        }

        $timestamp = Carbon::parse($user->magic_token_created_at);
        $now = Carbon::now();

        //expire links after 15 minutes.
        if ($timestamp->diffInMinutes($now) > 15) {
            return Redirect::to('cp/login/magiclink')->withStatus('Link has passed the 15 minute window, please request a new link.', 'danger');
        }

        $user->magic_token = null;
        $user->save();

        Auth::loginUsingId($user->id);

        $this->runLoginProcess($user);

        //redirect to dashboard if no intended url exists in a session.
        return Redirect::intended('cp/dashboard');

    }

    /**
     * Display the login view.
     *
     * @return Response
     */
    public function login()
    {
        return $this->getView()
            ->shares('title', __d('users', 'User Login'));
    }

    /**
     * Handle a POST request to login the User.
     *
     * @return Response
     */
    public function postLogin()
    {
        // Retrieve the Authentication credentials.
        $credentials = Input::only('username', 'password');
        $remember = 'on';

        // Make an attempt to login the Guest with the given credentials.
        if(! Auth::attempt($credentials, $remember)) {
            // An error has happened on authentication.
            return Redirect::back()->withStatus('Wrong username or password.', 'danger');
        }

        $user = Auth::user();

        if (Hash::needsRehash($user->password)) {
            $user->password = Hash::make($credentials['password']);
            $user->save();
        }

        $this->runLoginProcess($user);

        //redirect to dashboard if no intended url exists in a session.
        return Redirect::intended('cp/dashboard');
    }

    protected function runLoginProcess($user)
    {
        if($user->officeLoginOnly == 'Yes'){

            $allowlist = Config::get('app.ipAccessList');

            if (!array_key_exists($_SERVER['REMOTE_ADDR'], $allowlist)) {
                $log          = new UserLog();
                $log->user_id = Auth::user()->id;
                $log->title   = "Attempted to login from an unauthorised location. User set to office login only.";
                $log->section = "users";
                $log->refID   = $user->id;
                $log->type    = 'Auth';
                $log->save();
                die('This system cannot be accessed from your location.');
            }

        }

        //record login date and time
        $user->lastLoggedIn = date('Y-m-d H:i:s');
        $user->save();

        if($user->active != 'Yes') {

            $log          = new UserLog();
            $log->user_id = Auth::user()->id;
            $log->title   = "Tried to login with inactive account.";
            $log->section = "users";
            $log->refID   = $user->id;
            $log->type    = 'Auth';
            $log->save();

            Auth::logout();

            // User not activated; go logout and redirect him back.
            return Redirect::back()->withStatus('There is a problem. Have you activated your Account?', 'warning');
        }

        $log          = new UserLog();
        $log->user_id = Auth::user()->id;
        $log->title   = "Logged in.";
        $log->section = "users";
        $log->refID   = $user->id;
        $log->type    = 'Auth';
        $log->save();

        if ($user->forceChangePassword == 'Yes') {
            Session::set('changelogin', true);
            Redirect::to('cp/users/'.$user->id.'/edit');
        }
    }

    /**
     * Handle a GET request to logout the current User.
     *
     * @return Response
     */
    public function logout()
    {
        $log          = new UserLog();
        $log->user_id = Auth::user()->id;
        $log->title   = "Logged out.";
        $log->section = "users";
        $log->refID   = Auth::user()->id;
        $log->type    = 'Auth';
        $log->save();

        Auth::logout();

        return Redirect::to('cp/login')->withStatus('You have successfully logged out.');
    }

    /**
     * Display the password reminder view.
     *
     * @return Response
     */
    public function remind()
    {
        return $this->getView()->shares('title', 'Password Recovery');
    }

    /**
     * Handle a POST request to remind a User of their password.
     *
     * @return Response
     */
    public function postRemind()
    {
        $error = array();

        $credentials = Input::only('email');

        switch ($response = Password::remind($credentials)) {
            case Password::INVALID_USER:
                return Redirect::back()->withStatus('We can\'t find a user with that e-mail address.', 'danger');

            case Password::REMINDER_SENT:
                return Redirect::back()->withStatus('Reset instructions have been sent to your email address');
        }
    }

    /**
     * Display the password reset view for the given token.
     *
     * @param  string  $token
     * @return Response
     */
    public function reset($token)
    {
        return $this->getView()
            ->shares('title', 'Password Reset')
            ->with('token', $token);
    }

    /**
     * Handle a POST request to reset a User's password.
     *
     * @return Response
     */
    public function postReset()
    {
        $credentials = Input::only('email', 'password', 'password_confirmation', 'token');

        // Add to Password Broker a custom validation.
        Password::validator(function($credentials)
        {
            $pattern = "/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/";

            return (preg_match($pattern, $credentials['password']) === 1);
        });

        $response = Password::reset($credentials, function($user, $password)
        {
            $user->password = Hash::make($password);
            $user->save();
        });

        // Parse the response.
        switch ($response) {
            case Password::INVALID_PASSWORD:
                $status = __d('users', 'Passwords must be strong enough and match the confirmation.');
                break;
            case Password::INVALID_TOKEN:
                $status = __d('users', 'This password reset token is invalid.');

                break;
            case Password::INVALID_USER:
                $status = __d('users', 'We can\'t find a user with that e-mail address.');

                break;
            case Password::PASSWORD_RESET:
                $status = __d('users', 'You have successfully reset your Password.');

                return Redirect::to('cp/login')->withStatus($status);
        }

        return Redirect::back()->withStatus($status, 'danger');
    }

}
