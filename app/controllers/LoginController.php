<?php

class LoginController extends \BaseController {

	public function getLogin()
    {
        return View::make('admin.login');
    }

    public function postLogin()
    {
        $credentials = array(
            'email' => Input::get('email'),
            'password' => Input::get('password')
        );

        $rules = array(
            'email' => 'required|min:4|max:254|email',
            'password' => 'required|min:6'
        );

        $validator = Validator::make($credentials, $rules);

        if ($validator->passes()) {

        }

        $err_code = "";
        try {
            $user = Sentry::authenticate($credentials, false);
            if ($user) {

                return Redirect::route('/');
            }
        } catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
            $err_code = "login_field_is_required";
        } catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
            $err_code = "password_field_is_required";
        } catch (Cartalyst\Sentry\Users\WrongPasswordException $e) {
            $err_code = "wrong_password_exception";
        } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
            $err_code = "user_not_found";
        } catch (Cartalyst\Sentry\Users\UserNotActivatedException $e) {
            $err_code = "user_is_not_activated";
        } catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e) {
            $err_code = "user_is_suspended";
        } catch (Cartalyst\Sentry\Throttling\UserBannedException $e) {
            $err_code = "user_is_banned";
        }
        return Redirect::route('admin.login')->withErrors(array(
            'login' => Lang::get("sentry." . $err_code)
        ));
    }

    public function getLogout()
    {
        Sentry::logout();
        return Redirect::route('admin.login');
    }
}
