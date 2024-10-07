<?php

use App\Http\Controllers\API\V1\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\Auth\RegisterController;

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


Route::post('/v1/register', [RegisterController::class, 'store']);
Route::post('/v1/login', [LoginController::class, 'login']);
Route::get('/v1/get-single-user/{id}', [RegisterController::class, 'show']);
Route::get('/v1/get-all-user/', [RegisterController::class, 'index']);
Route::put('/v1/update-a-single-user/{id}', [RegisterController::class, 'update']);
Route::delete('/v1/delete-a-single-user/{id}', [RegisterController::class, 'delete']);
