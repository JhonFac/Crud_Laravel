<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/* These lines of code are defining routes for a RESTful API related to users. Here's a breakdown of
each route: */
Route::get('/users/page/{id}', 'App\Http\Controllers\UserController@index'); //mostrar todos los registros
Route::post('/users', 'App\Http\Controllers\UserController@store'); //crear un registro
Route::put('/users/{id}', 'App\Http\Controllers\UserController@update'); //actualizar un registro
Route::delete('/users/{id}', 'App\Http\Controllers\UserController@destroy'); //actualizar un registro


/* These lines of code are defining routes for a RESTful API related to challenges. Each route
corresponds to a specific HTTP method and action to be performed on the challenges resource. Here's
a breakdown of each route: */
Route::get('/challenges', 'App\Http\Controllers\ChallengeController@index'); //mostrar todos los registros
Route::post('/challenges', 'App\Http\Controllers\ChallengeController@store'); //crear un registro
Route::put('/challenges/{id}', 'App\Http\Controllers\ChallengeController@update'); //actualizar un registro
Route::delete('/challenges/{id}', 'App\Http\Controllers\ChallengeController@destroy'); //actualizar un registro


/* These lines of code are defining routes for a RESTful API related to a resource called "company".
Each route corresponds to a specific HTTP method and action to be performed on the company resource.
Here's a breakdown of each route: */
Route::get('/company', 'App\Http\Controllers\CompanyController@index'); //mostrar todos los registros
Route::post('/company', 'App\Http\Controllers\CompanyController@store'); //crear un registro
Route::put('/company/{id}', 'App\Http\Controllers\CompanyController@update'); //actualizar un registro
Route::delete('/company/{id}', 'App\Http\Controllers\CompanyController@destroy'); //actualizar un registro


/* These lines of code are defining routes for a RESTful API related to a resource called "programs".
Each route corresponds to a specific HTTP method and action to be performed on the programs
resource. Here's a breakdown of each route: */
Route::get('/programs', 'App\Http\Controllers\ProgramsController@index'); //mostrar todos los registros
Route::post('/programs', 'App\Http\Controllers\ProgramsController@store'); //crear un registro
Route::put('/programs/{id}', 'App\Http\Controllers\ProgramsController@update'); //actualizar un registro
Route::delete('/programs/{id}', 'App\Http\Controllers\ProgramsController@destroy'); //actualizar un registro


/* These lines of code are defining routes for a RESTful API related to a resource called
"program_participants". Each route corresponds to a specific HTTP method and action to be performed
on the program_participants resource. Here's a breakdown of each route: */
Route::get('/program_participants', 'App\Http\Controllers\ProgramParticipantsController@index'); //mostrar todos los registros
Route::post('/program_participants', 'App\Http\Controllers\ProgramParticipantsController@store'); //crear un registro
Route::put('/program_participants/{id}', 'App\Http\Controllers\ProgramParticipantsController@update'); //actualizar un registro
Route::delete('/program_participants/{id}', 'App\Http\Controllers\ProgramParticipantsController@destroy'); //actualizar un registro
