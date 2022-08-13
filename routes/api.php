<?php

use App\Http\Controllers\API\Students\StudentApiController;
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

Route::post('student/auth', 'App\Http\Controllers\API\Students\StudentApiController@StudentLogin')->name('student.auth');

Route::group(['prefix' => 'student', 'middleware' => 'student'], function () {

    Route::post('timetable', [\App\Http\Controllers\API\Students\Standart\TimeTableStudentController::class, 'getLessonForWeek']);

    Route::post('personal/information', [StudentApiController::class, 'personalInf']);

    Route::post('personal/information/update', [StudentApiController::class, 'updatePersonalInf'])->name('student.personal.update');

    Route::post('img/change', [StudentApiController::class, 'changeAvatarImgStore']);

    Route::post('login/password/change', [StudentApiController::class, 'changeLoginAndPassword']);

    Route::post('add/comment', [\App\Http\Controllers\API\Students\StudentApiController::class, 'addComment']);

    Route::get('get/comment', [\App\Http\Controllers\API\Students\StudentApiController::class, 'getComment']);

    Route::post('add/rating', [\App\Http\Controllers\API\Students\StudentApiController::class, 'addRating']);

    Route::get('get/department',[\App\Http\Controllers\API\Students\StudentApiController::class, 'getDeparmtents']);

    Route::get('get/account/inform',[\App\Http\Controllers\API\Students\StudentApiController::class, 'getAccountInform']);

    Route::get('get/department/worker',[\App\Http\Controllers\API\Students\StudentApiController::class, 'getDeparmtentWorker']);

    Route::get('post',[\App\Http\Controllers\API\Students\StudentApiController::class, 'getPosts']);

    Route::post('add/suggestion',[\App\Http\Controllers\API\Students\StudentApiController::class, 'createSuggestion']);

});

Route::post('worker/login', [\App\Http\Controllers\API\Workers\WorkerApiController::class, 'WorkerLogin']);

Route::group(['prefix' => 'worker','middleware'=>'worker_api'], function () {

    Route::post('change/login/password',[\App\Http\Controllers\API\Workers\WorkerApiController::class,'changeLoginAndPassword']);

    Route::post('account/information',[\App\Http\Controllers\API\Workers\WorkerApiController::class,'accountInf']);

    Route::get('personal/information',[\App\Http\Controllers\API\Workers\WorkerApiController::class,'personalInf']);

    Route::post('personal/update/information',[\App\Http\Controllers\API\Workers\WorkerApiController::class,'updatePersonalInf']);

    Route::post('img/change', [\App\Http\Controllers\API\Workers\WorkerApiController::class, 'changeAvatarImgStore']);

    Route::post('add/comment', [\App\Http\Controllers\API\Workers\WorkerApiController::class, 'addComment']);

    Route::post('add/suggestion',[\App\Http\Controllers\API\Workers\WorkerApiController::class, 'createSuggestion']);

});

Route::group(['prefix' => 'worker/umo','middleware' => 'denary'], function () {

    Route::get('all/group', [\App\Http\Controllers\API\Workers\Denary\DenaryWorkerApiController::class, 'getGroups']);

    Route::get('{course}/group', [\App\Http\Controllers\API\Workers\Denary\DenaryWorkerApiController::class, 'getCourseGroups']);

    Route::get('get/{id}/group', [\App\Http\Controllers\API\Workers\Denary\DenaryWorkerApiController::class, 'getStudentsGroup']);

    Route::post('add/pass', [\App\Http\Controllers\API\Workers\Denary\DenaryWorkerApiController::class, 'addPass']);

});
