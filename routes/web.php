<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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

// 1. determine the route method e.g get, post, put, delete
// 2. create your controller
// 3. determine your route parameter
// 4. import your controller
// 5. put in the function method from your controller 

Route::get('/dashboard', [DashboardController::class, 'index']);

//get the register page
Route::get('/register', [RegisterController::class, 'index']);

//submit the register form
Route::post('/submit-register-form', [RegisterController::class, 'store'])->name('register');


//index - getting all data // get
//store - inputting // post
//show - single data // get
//update - update data //put
//destroy - delete date // delete