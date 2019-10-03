<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/projects', 'ProjectController');


/*

-----------------------------------------------------------------------------------+
| Domain | Method    | URI                        | Name             | Action                                                                 | Middleware                                                                                                                         |
+--------+-----------+----------------------------+------------------+------------------------------------------------------------------------+------------------------------------------------------------------------------------------------------------------------------------+
|        | GET|HEAD  | /                          |                  | Closure                                                                | web                                                                                                                                |
|        | POST      | _ignition/execute-solution |                  | Facade\Ignition\Http\Controllers\ExecuteSolutionController             | Facade\Ignition\Http\Middleware\IgnitionEnabled,Facade\Ignition\Http\Middleware\IgnitionConfigValueEnabled:enableRunnableSolutions |
|        | GET|HEAD  | _ignition/health-check     |                  | Facade\Ignition\Http\Controllers\HealthCheckController                 | Facade\Ignition\Http\Middleware\IgnitionEnabled                                                                                    |
|        | GET|HEAD  | _ignition/scripts/{script} |                  | Facade\Ignition\Http\Controllers\ScriptController                      | Facade\Ignition\Http\Middleware\IgnitionEnabled                                                                                    |
|        | POST      | _ignition/share-report     |                  | Facade\Ignition\Http\Controllers\ShareReportController                 | Facade\Ignition\Http\Middleware\IgnitionEnabled,Facade\Ignition\Http\Middleware\IgnitionConfigValueEnabled:enableShareButton       |
|        | GET|HEAD  | _ignition/styles/{style}   |                  | Facade\Ignition\Http\Controllers\StyleController                       | Facade\Ignition\Http\Middleware\IgnitionEnabled                                                                                    |
|        | GET|HEAD  | api/user                   |                  | Closure                                                                | api,auth:api                                                                                                                       |
|        | GET|HEAD  | home                       | home             | App\Http\Controllers\HomeController@index                              | web,auth                                                                                                                           |
|        | GET|HEAD  | login                      | login            | App\Http\Controllers\Auth\LoginController@showLoginForm                | web,guest                                                                                                                          |
|        | POST      | login                      |                  | App\Http\Controllers\Auth\LoginController@login                        | web,guest                                                                                                                          |
|        | POST      | logout                     | logout           | App\Http\Controllers\Auth\LoginController@logout                       | web                                                                                                                                |
|        | POST      | password/email             | password.email   | App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail  | web,guest                                                                                                                          |
|        | POST      | password/reset             | password.update  | App\Http\Controllers\Auth\ResetPasswordController@reset                | web,guest                                                                                                                          |
|        | GET|HEAD  | password/reset             | password.request | App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm | web,guest                                                                                                                          |
|        | GET|HEAD  | password/reset/{token}     | password.reset   | App\Http\Controllers\Auth\ResetPasswordController@showResetForm        | web,guest                                                                                                                          |
|        | GET|HEAD  | projects                   | projects.index   | App\Http\Controllers\ProjectController@index                           | web                                                                                                                                |
|        | POST      | projects                   | projects.store   | App\Http\Controllers\ProjectController@store                           | web                                                                                                                                |
|        | GET|HEAD  | projects/create            | projects.create  | App\Http\Controllers\ProjectController@create                          | web                                                                                                                                |
|        | GET|HEAD  | projects/{project}         | projects.show    | App\Http\Controllers\ProjectController@show                            | web                                                                                                                                |
|        | PUT|PATCH | projects/{project}         | projects.update  | App\Http\Controllers\ProjectController@update                          | web                                                                                                                                |
|        | DELETE    | projects/{project}         | projects.destroy | App\Http\Controllers\ProjectController@destroy                         | web                                                                                                                                |
|        | GET|HEAD  | projects/{project}/edit    | projects.edit    | App\Http\Controllers\ProjectController@edit                            | web                                                                                                                                |
|        | POST      | register                   |                  | App\Http\Controllers\Auth\RegisterController@register                  | web,guest                                                                                                                          |
|        | GET|HEAD  | register                   | register         | App\Http\Controllers\Auth\RegisterController@showRegistrationForm      | web,guest

 */

Route::post('projects/{project}/Tasks', 'TaskController@store');

// /projects/{{$project->id}}/tasks

Route::patch('/tasks/{task}', 'TaskController@update');