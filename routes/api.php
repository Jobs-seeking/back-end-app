<?php

use App\Http\Controllers\Api\ApplicantController;
use App\Http\Controllers\Api\JobController;
use App\Http\Controllers\Api\UserController;
use App\Http\Resources\JobResource;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('users', UserController::class)->except(['edit','create']);
Route::resource('applicants', ApplicantController::class)->except(['edit','create']);
Route::resource('jobs', JobController::class)->except(['edit','create']);
Route::post('users/login', [UserController::class, 'login']);
Route::get('/companies', [UserController::class, 'getAllCompany']);
Route::get('/companies/{id}', [UserController::class, 'getCompanyById']);
Route::get('/students', [UserController::class, 'getAllStudent']);
Route::get('/search-by-name', [JobController::class, 'searchByName']);
// Route::post('/register',[UserController::class,'store']);
