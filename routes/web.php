<?php

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

Route::get('/test', 'App\Http\Controllers\Web\Workers\WorkerController@getForm')->name('index');
Route::post('/test', 'App\Http\Controllers\Web\Workers\WorkerController@Workerauthorize')->name('indep');
Route::get('/testlogin', 'App\Http\Controllers\Web\Workers\WorkerController@WorkerLoginForm')->name('WorkerLoginForm');
Route::post('/testlogin', 'App\Http\Controllers\Web\Workers\WorkerController@WorkerLogin')->name('WorkerLogin');
//Route::post('student/img/change', [StudentApiController::class, 'changeAvatarImgStore']);
//Route::post('student/img/change','App\Http\Controllers\Web\Students\StudentController@changeAvatarImgStore');
// Роуты для УМО

Route::group(['prefix' => 'worker/umo/','middleware'=>'umo'], function () {
    Route::resource('room', \App\Http\Controllers\Web\Workers\UMO\UMOWorkerRoomController::class);
    Route::resource('teacher', \App\Http\Controllers\Web\Workers\UMO\UMOWorkerTeacherController::class);
    Route::resource('subject', \App\Http\Controllers\Web\Workers\UMO\UMOWorkerSubjectController::class);
    Route::resource('timetable', \App\Http\Controllers\Web\Workers\UMO\UMOWorkerTimetablesController::class);
});


