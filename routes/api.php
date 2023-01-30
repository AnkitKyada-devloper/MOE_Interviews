<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\InstitutesController;
use App\Http\Controllers\InterviewRoundsController;
use App\Http\Controllers\InterviewSubRoundsController;
use App\Http\Controllers\JobTitlesController;
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

Route::post('/verifylogin',[UsersController::class,'login']);
Route::post('/registeruser',[UsersController::class,'register']);

Route::post('/institute',[InstitutesController::class,'add']);
Route::post('/institute/{id}',[InstitutesController::class,'add']);

Route::post('/interviewrounds',[InterviewRoundsController::class,'interview']);
Route::post('/interviewrounds/{id}',[InterviewRoundsController::class,'interview']);
Route::get('/interviewround/get_by_id/{id}',[InterviewRoundsController::class,'get_by_id']);

Route::post('/interviewsubround',[InterviewSubRoundsController::class,'subround']);
Route::post('/interviewsubround/{id}',[InterviewSubRoundsController::class,'subround']);
Route::get('/interviewsubround/get_all/{is_active?}',[InterviewSubRoundsController::class,'get_all']);
Route::get('/interviewsubround/get_by_id/{id}',[InterviewSubRoundsController::class,'get_by_id']);

Route::post('/jobtitle',[JobTitlesController::class,'add_update']);
Route::post('/jobtitle/{id}',[JobTitlesController::class,'add_update']);
Route::get('/jobtitle/get_by_id/{id}',[JobTitlesController::class,'get_by_id']);
Route::get('/jobtitle/get_all/{is_active?}',[JobTitlesController::class,'get_all']);