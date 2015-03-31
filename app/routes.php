<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/* these routes doesnot require authentication check as they occur before user logs in*/
Route::get('login', array('as' => 'admin.login', 'uses' => 'UserController@getLogin'));
Route::post('authenticate', array('as' => 'admin.authenticate', 'uses' => 'UserController@postLogin'));

Route::group(array('before'=>'auth.admin'),function()
{

    Route::get('logout', array('as' => 'admin.logout', 'uses' => 'UserController@getLogout'));
    Route::get('/', function()
    {
        return View::make('dashboard.index');
    });

    Route::resource('dashboard','DashboardController');

    /****************************************************************************************************************************************************
    Routes for Project
     ***************************************************************************************************************************************************/
    Route::resource('projects','ProjectController');

    Route::get('project/delete/{id}','ProjectController@destroy');

    Route::get('project/getAll',array('as'=>'project/getAll','uses'=>'ProjectController@getAllProjects'));

    /****************************************************************************************************************************************************
    Routes for User
     ***************************************************************************************************************************************************/

    Route::resource('users','UserController');

    //Route to resend the activation code
    Route::post('/resend',array('as'=>'activation/resend','uses'=>'UserController@resend'));

    //Route to suspend user
    Route::get('user/suspend/{id}',array('as'=>'user/suspend','uses'=>'UserController@suspend'));

    //Route to unsuspend user
    Route::get('user/unsuspend/{id}',array('as'=>'user/unsuspend','uses'=>'UserController@unsuspend'));

    //Route to ban the user
    Route::get('user/ban/{id}',array('as'=>'user/ban','uses'=>'UserController@ban'));

    //Route to unban the user
    Route::get('user/unban/{id}',array('as'=>'user/unban','uses'=>'UserController@unban'));

    //Route to change the user password
    Route::get('change',array('as'=>'change','uses'=>'UserController@change'));

    //Route to change the user password
    Route::post('password/change',array('as'=>'password/change','uses'=>'UserController@changePassword'));

    //Route to return all available users
    Route::get('user/getAll',array('as'=>'user/getAll','uses'=>'UserController@getUsers'));

    Route::get('/delete/user/{userId}',array(
            'as' => 'user/delete',
            'uses' => 'UserController@destroy')
    );
    /****************************************************************************************************************************************************
    Routes for Client
     ***************************************************************************************************************************************************/
    Route::resource('clients','ClientController');

    Route::get('client/delete/{id}','ClientController@destroy');

    Route::get('client/getAll',array('as'=>'client/getAll','uses'=>'ClientController@getAllClients'));

    /****************************************************************************************************************************************************
    Routes for Task
     ***************************************************************************************************************************************************/

    Route::resource('tasks','TaskController');

    Route::get('task/delete/{id}','TaskController@destroy');

    Route::get('task/getAll',array('as'=>'task/getAll','uses'=>'TaskController@getAllTasks'));


    /****************************************************************************************************************************************************
    Routes for Issues Bugs
     ***************************************************************************************************************************************************/

    Route::resource('issues','IssueBugController');

    Route::get('issue/delete/{id}','IssueBugController@destroy');

    Route::get('issue/getAll',array('as'=>'issue/getAll','uses'=>'IssueBugController@getAllIssues'));

});


//Route for user activation
Route::get('/activate/{id}/{code}',array('as'=>'activate/user','uses'=>'UserController@activate'));

//Route to reset the password
//Route::post('/password/reset/{id}/{code}',array('as'=>'password/reset','uses'=>'UserController@reset'));

//Route to redirect the user to the forgot view page to take input ( email , new password and password conformation
Route::get('/password/forgot',array('as'=>'forgot','uses'=>'UserController@forgot'));

Route::get('/password/reset/{id}/{code}/{password}',array('as'=>'password/reset','uses'=>'UserController@reset'));

//Route to take values from forgot password view to controller and then send email to the user .
Route::post('/password/forgot',array('as'=>'password/forgot','uses'=>'UserController@passwordForgot'));