<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConfigurationsController;
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

Route::post('/configurations',[ConfigurationsController::class,'add_update']);
Route::post('/configurations/{id}',[ConfigurationsController::class,'add_update']);
Route::get('/configurations/delete/{id}',[ConfigurationsController::class,'delete']);
Route::get('/configurations/get_all/{is_active?}',[ConfigurationsController::class,'get_all']);
Route::get('/configurations/get_by_id/{id}',[ConfigurationsController::class,'get_by_id']);
Route::get('/configurations/get_conf_key1/{conf_key?}',[ConfigurationsController::class,'get_conf_key']);
Route::get('/configurations/get_conf_key/{conf_key}/{conf_value?}',[ConfigurationsController::class,'get_conf_value']);
Route::get('/configurations/active_change/{id}/{is_active?}',[ConfigurationsController::class,'change_cong']);


// Route::post('/institute',[InstitutesController::class,'institute_add_update']);
// Route::post('/institute/{id}',[InstitutesController::class,'institute_add_update']);

Route::post('/institute/user',[InstitutesController::class,'institute']);

Route::get('/institute/get_all/{is_active?}',[InstitutesController::class,'get_all']);
Route::get('/institute/get_by_id/{id}',[InstitutesController::class,'get_by_id']);
Route::get('/institute/delete/{id}',[InstitutesController::class,'delete_institutes']);

Route::post('/interviewrounds',[InterviewRoundsController::class,'interview']);
Route::post('/interviewrounds/{id}',[InterviewRoundsController::class,'interview']);
Route::get('/interviewround/get_all/{is_active?}',[InterviewRoundsController::class,'get_all']);
Route::get('/interviewround/get_by_id/{id}',[InterviewRoundsController::class,'get_by_id']);
Route::get('/interviewround/delete/{id}',[InterviewRoundsController::class,'deleteround']);
Route::get('/interviewround/active_change/{id}/{is_active}',[InterviewRoundsController::class,'active_change_rounds']);

Route::post('/interviewsubround',[InterviewSubRoundsController::class,'subround']);
Route::post('/interviewsubround/{id}',[InterviewSubRoundsController::class,'subround']);
Route::get('/interviewsubround/get_by_round/{round_id}',[InterviewSubRoundsController::class,'round_id']);
Route::get('/interviewsubround/get_all/{is_active?}',[InterviewSubRoundsController::class,'get_all']);
Route::get('/interviewsubround/get_by_id/{id}',[InterviewSubRoundsController::class,'get_by_id']);
Route::get('/interviewsubround/delete/{id}',[InterviewSubRoundsController::class,'deletesubround']);
Route::get('/interviewsubround/active_change/{id}/{is_active}',[InterviewSubRoundsController::class,'active_change_subrounds']);

Route::post('/jobtitle',[JobTitlesController::class,'add_update']);
Route::post('/jobtitle/{id}',[JobTitlesController::class,'add_update']);
Route::get('/jobtitle/get_by_id/{id}',[JobTitlesController::class,'get_by_id']);
Route::get('/jobtitle/get_all/{is_active?}',[JobTitlesController::class,'get_all']);
Route::get('/jobtitle/delete/{id}',[JobTitlesController::class,'delete']);
Route::get('/jobtitle/active_changel/{id}/{is_active}',[JobTitlesController::class,'active_change']);