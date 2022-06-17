<?php

use App\Http\Controllers\API\Students\StudentApiController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::post('student/register', [StudentApiController::class, 'Studentauthorize']);
//Route::post('student/register', 'App\Http\Controllers\API\Students\StudentApiController@Studentauthorize')->name('student.register');
Route::post('student/auth', 'App\Http\Controllers\API\Students\StudentApiController@StudentLogin')->name('student.auth');
Route::post('student/personal/information', [StudentApiController::class, 'personalInf']);
Route::post('student/personal/information/update', [StudentApiController::class, 'updatePersonalInf']);
Route::post('student/img/change', [StudentApiController::class, 'changeAvatarImgStore']);
Route::post('student/login/password/change', [StudentApiController::class, 'changeLoginAndPassword']);

Route::post('worker/login',[\App\Http\Controllers\API\Workers\WorkerApiController::class,'WorkerLogin']);
Route::get('worker/all/group',[\App\Http\Controllers\API\Workers\Denary\DenaryWorkerApiController::class,'getGroups']);
Route::get('worker/get/{id}/group',[\App\Http\Controllers\API\Workers\Denary\DenaryWorkerApiController::class,'getStudentsGroup']);
Route::post('worker/add/pass',[\App\Http\Controllers\API\Workers\Denary\DenaryWorkerApiController::class,'addPass']);
Route::get('holiday',[StudentApiController::class,'holidays']);
Route::post('worker/img/change', [\App\Http\Controllers\API\Workers\WorkerApiController::class, 'changeAvatarImgStore']);
