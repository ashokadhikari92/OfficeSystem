<?php

class UserController extends \BaseController {

    protected $user;

    protected $mailer;

    function __construct(Mailer $mailer,User $user)
    {
        $this->mailer = $mailer;
        $this->user = $user;
    }


    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $users = \Sentry::findAllUsers();

        foreach($users as $user)
        {
            $throttle = \Sentry::findThrottlerByUserId($user->id);

            $user['suspended'] = $throttle->isSuspended();

            $user['banned'] = $throttle->isBanned();

            $user['activated'] = $user->isActivated();

            $group = $user->getGroups();

            $user['group'] = $group;
        }

		return View::make('users.index')->with('users',$users);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $roles = \Sentry::findAllGroups();

        return View::make('users.create')->with('roles',$roles);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = Input::all();

        $rules = array(
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|min:4|max:254|email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
            'group' => 'required'
        );

        $validator = Validator::make($input, $rules);

        if ($validator->passes()) {

            $result = array();
            try
            {
                $user = \Sentry::register(array(
                    'email' => $input['email'],
                    'password' => $input['password'],
                    'first_name' => $input['first_name'],
                    'last_name' => $input['last_name']
                ));

                $group = \Sentry::findGroupById($input['group']);

                $user->addGroup($group);

                $this->mailer->welcome($user);
                $result['success'] = true;
                $result['message'] = 'Activation code is sent , please check your email';
            }
            catch (Exception\LoginRequiredException $e)
            {
                $result['success'] = false;
                $result['message'] = 'Login field is required.';

            }
            catch (Exception\PasswordRequiredException $e)
            {
                $result['success'] = false;
                $result['message'] = 'Password field is required.';
            }
            catch (Exception\UserExistsException $e)
            {
                $result['success'] = false;
                $result['message'] = 'User with this login already exists';

            }
            return Redirect::route('users.index')->with('message',$result['message']);
            //return Redirect::route('users.index')->with('message','Successfully Registered');
        }

        return Redirect::route('users.create')->withInput()->withErrors($validator);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        /*$user= $this->user->findUserById($id);
        $roles = $this->role->getRoles();
        return View::make('users.edit', compact('user','roles'));*/
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        \Sentry::findUserById($id)->delete();

        return Redirect::route('users.index')->with('message', 'User successfully deleted.');
	}

    public function getLogin()
    {
        return View::make('admin.login');
    }

    public function postLogin()
    {
        $credentials = array(
            'email' => Input::get('user'),
            'password' => Input::get('password')
        );

        $rules = array(
            'email' => 'required|min:4|max:254|email',
            'password' => 'required|min:5'
        );

        $validator = Validator::make($credentials, $rules);

        //dd($validator->passes());
        if ($validator->passes()) {

            $err_code = "";
            try {
                $user = Sentry::authenticate($credentials, false);
                if ($user) {

                    return Redirect::route('dashboard.index');
                }
            } catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
                $err_code = "Login field is required";
            } catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
                $err_code = "Password field is required";
            } catch (Cartalyst\Sentry\Users\WrongPasswordException $e) {
                $err_code = "Wrong password exception";
            } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
                $err_code = "User not found";
            } catch (Cartalyst\Sentry\Users\UserNotActivatedException $e) {
                $err_code = "User is not activated";
            } catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e) {
                $err_code = "User is suspended";
            } catch (Cartalyst\Sentry\Throttling\UserBannedException $e) {
                $err_code = "User is banned";
            }
            return Redirect::route('admin.login')->withErrors(array(
                'login' => Lang::get($err_code)
            ));
        }

        return Redirect::route('admin.login')->withInput()->withErrors($validator);
    }

    public function getLogout()
    {
        Sentry::logout();
        return Redirect::route('admin.login');
    }

    /**
     * @brief This method is for user activation
     * @param $id
     * @param $code
     * @return mixed
     */
    public function activate($id, $code)
    {
        $result = array();

        try
        {
            // Find the user using the user id
            $user = \Sentry::findUserById($id);

            // Attempt to activate the user
            if ($user->attemptActivation($code))
            {
                $result['success'] = true;
                $result['message'] = 'User is activated';
            }
            else
            {
                $result['success'] = false;
                $result['message'] = 'User activation failed';
            }
        }
        catch (Exception\UserNotFoundException $e)
        {
            $result['success'] = false;
            $result['message'] = 'User was not found.';
        }
        catch (Exception\UserAlreadyActivatedException $e)
        {
            $result['success'] = false;
            $result['message'] = 'User is already activated.';
        }

        if($result['success'] == true){

            return Redirect::route('admin.login')->with('message', $result['message']);
        }

        return Redirect::route('activation/resend')->with('message', $result['message']);
    }

    /**
     * @brief This method is to suspend the user for some time interval (by default 15 mins)
     * @param $id
     */
    public function suspend($id){

        $result = array();
        try
        {
            // Find the user using the user id
            $throttle = \Sentry::findThrottlerByUserId($id);

            // Suspend the user
            $throttle->suspend();

            $result['success'] = true;
            $result['message'] = 'User is Suspended';
        }
        catch (Exception\UserNotFoundException $e)
        {
            $result['success'] = false;
            $result['message'] = 'User was not found';
        }


        return Redirect::route('users.index')->with('message', 'User is successfully Suspended');
    }

    /**
     * @brief This method is to unsuspend the suspended user
     * @param $id
     */
    public function unsuspend($id){

        $result = array();
        try
        {
            // Find the user using the user id
            $throttle = \Sentry::findThrottlerByUserId($id);

            // Unsuspend the user
            $throttle->unsuspend();

            $result['success'] = true;
            $result['message'] = 'User is UnSuspended';

        }
        catch (Exception\UserNotFoundException $e)
        {
            $result['success'] = false;
            $result['message'] = 'User was not found';
        }

        return Redirect::route('users.index')->with('message', 'User is successfully UnSuspended');
    }

    /**
     * @brief This method is to ban the user to access the application
     * @param $id
     */
    public function ban($id){

        $result = array();
        try
        {
            // Find the user using the user id
            $throttle = \Sentry::findThrottlerByUserId($id);

            // Ban the user
            $throttle->ban();

            $result['success'] = true;
            $result['message'] = 'User is banded';
        }
        catch (Exception\UserNotFoundException $e)
        {
            $result['success'] = false;
            $result['message'] = 'User was not found';
        }

        return Redirect::route('users.index')->with('message', 'User is successfully Banned');
    }

    /**
     * @brief This method is to unban the already banned user
     * @param $id
     */
    public function unban($id){

        $result = array();
        try
        {
            // Find the user using the user id
            $throttle = \Sentry::findThrottlerByUserId($id);

            // Unban the user
            $throttle->unBan();

            $result['success'] = true;
            $result['message'] = 'User is UnBanded';
        }
        catch (Exception\UserNotFoundException $e)
        {
            $result['success'] = false;
            $result['message'] = 'User was not found';
        }

        return Redirect::route('users.index')->with('message', $result['message']);
    }

    /**
     * @brief This method redirects to the view page to input the change password
     */
    public function change()
    {
        return View::make('users.changePassword');
    }

    /**
     * @brief This method takes the values from view page and stores changed password and sends email to user .
     */
    public function changePassword()
    {
        $input = Input::all();

        $rules = array(
            'oldPassword' => 'required|min:6',
            'newPassword' => 'required|min:6|confirmed',
            'newPassword_confirmation' => 'required'
        );

        $validator = Validator::make($input, $rules);

        $result = $this->checkPassword($input['oldPassword']);

        if ($validator->passes()) {
            if($result['success'] === true){

                $newPassword = $input['newPassword'];

                $user = \Sentry::getUser();

                /*$this->user->updateUser($user->id,$newPassword);*/
                $user = \Sentry::findUserById($user->id);

                $user->password =$newPassword;

                if ($user->save())
                {
                    $this->mailer->newPassword($user->email,$newPassword);

                    $result['success'] = true;
                    $result['message'] = 'Password is changed';
                }
                else
                {
                    $result['success'] = false;
                    $result['message'] = 'Password can not be changed';
                }

                $this->user->logOut();
                return Redirect::route('admin.login')->with('message', 'Email is sent , Please check');
            }
            return Redirect::route('change')->with('message', $result['message']);
        }
        return Redirect::route('change')->withInput()->withErrors($validator);
    }

    /**
     * @brief This method just redirects user to the forgot view page to take email and new password input
     */
    public function forgot()
    {
        return View::make('users.forgot');
    }


    /**
     * @brief This method takes input from the view page and emails to user about new password
     */
    public function passwordForgot()
    {
        $input = Input::all();

        $rules = array(
            'email' => 'required|min:4|max:254|email',
            'newPassword' => 'required|min:6|confirmed',
            'newPassword_confirmation' => 'required'
        );

        $validator = Validator::make($input, $rules);

        if ($validator->passes()) {

            $result = array();
            try
            {

                $user = \Sentry::findUserByLogin($input['email']);

                $password = $input['newPassword'];

                $this->mailer->forgotPassword($user,$password);

                $result['success'] = true;
                $result['message'] = 'Password reset code is sent';

            }
            catch (Exception\UserNotFoundException $e)
            {
                $result['success'] = false;
                $result['message'] = 'User was not found';
            }


            $this->user->logOut();
            return Redirect::route('admin.login')->with('message', 'Password reset code is sent , Please check your Email');
        }

        return Redirect::route('forgot')->withInput()->withErrors($validator);

    }

    /**
     * @brief This method is for reset the password
     * @param $id
     * @param $code
     * @param $password
     */
    public function reset($id,$code,$password)
    {
        $result = array();

        try
        {
            // Find the user using the user id
            $user = \Sentry::findUserById($id);

            // Check if the reset password code is valid
            if ($user->checkResetPasswordCode($code))
            {
                // Attempt to reset the user password
                if ($user->attemptResetPassword($code, $password))
                {
                    $result['success'] = true;
                    $result['message'] = 'Password is changed successfully';
                }
                else
                {
                    $result['success'] = false;
                    $result['message'] = 'password can not be changed';
                }
            }
            else
            {
                $result['success'] = false;
                $result['message'] = 'Reset code is invalid';
            }
        }
        catch (Exception\UserNotFoundException $e)
        {
            $result['success'] = false;
            $result['message'] = 'User was not found';
        }


        if($result['success'] === true)
        {
            return Redirect::route('admin.login')->with('message',$result['message']);
        }
        return Redirect::route('admin.login')->with('message',$result['message']);
    }

    /**
     * @brief gets all users
     *
     * @return Mixed
     */
    public function getUsers()
    {
        $users = \Sentry::findAllUsers();

        foreach($users as $user)
        {
            $throttle = \Sentry::findThrottlerByUserId($user->id);

            $user['suspended'] = $throttle->isSuspended();

            $user['banned'] = $throttle->isBanned();

            $user['activated'] = $user->isActivated();
        }
        return $users;
    }

    /**
     * @param $password
     * @return mixed
     */
    public function checkPassword($password)
    {
        $result = array();
        try
        {
            // Find the user using the user id
            $user = \Sentry::getUser();

            if($user->checkPassword($password))
            {
                $result['success'] = true;
                $result['message'] = 'Password matches.';
            }
            else
            {
                $result['success'] = false;
                $result['message'] = 'Password does not match.';
            }
        }
        catch (Exception\UserNotFoundException $e)
        {
            $result['success'] = false;
            $result['message'] = 'User was not found.';
        }

        return $result;
    }
}
