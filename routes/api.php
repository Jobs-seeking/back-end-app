<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobDetailController;
use App\Http\Controllers\UserController;
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

Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index');
    Route::get('/users/{user}', 'show');
    Route::post('/users', 'create');
    Route::put('/users/{user}', 'update');
    Route::delete('/users/{user}', 'delete');
    Route::get('/token', 'getToken');
    Route::post('/users/login', 'onLogin');
    Route::post('/users/register', 'onRegister');
});

Route::controller(JobController::class)->group(function () {
    Route::get('/jobs', 'index');
    Route::get('/jobs/{job}', 'show');
    Route::post('/jobs', 'create');
    Route::put('/jobs/{job}', 'update');
    Route::delete('/jobs/{job}', 'delete');
});

Route::controller(JobDetailController::class)->group(function () {
    Route::get('/jobDetails', 'index');
    Route::get('/jobDetails/{jobDetail}', 'show');
    Route::post('/jobDetails', 'create');
    Route::put('/jobDetails/{jobDetail}', 'update');
    Route::delete('/jobDetails/{jobDetail}', 'delete');
    Route::get('/search-by-title', 'searchByTitle');
    Route::get('/search-by-salary', 'searchBySalary');
});


Route::controller(ApplicantController::class)->group(function () {
    Route::get('/applicants', 'index');
    Route::get('/applicants/{applicant}', 'show');
});
