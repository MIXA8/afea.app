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
Route::group(['prefix' => 'student', 'middleware' => 'student'], function () {

    Route::post('register', [StudentApiController::class, 'Studentauthorize']);

    Route::post('auth', 'App\Http\Controllers\API\Students\StudentApiController@StudentLogin')->name('student.auth');

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


Route::group(['prefix' => 'worker'], function () {

    Route::post('login', [\App\Http\Controllers\API\Workers\WorkerApiController::class, 'WorkerLogin']);

    Route::get('worker/all/group', [\App\Http\Controllers\API\Workers\Denary\DenaryWorkerApiController::class, 'getGroups']);

    Route::get('worker/get/{id}/group', [\App\Http\Controllers\API\Workers\Denary\DenaryWorkerApiController::class, 'getStudentsGroup']);

    Route::post('worker/add/pass', [\App\Http\Controllers\API\Workers\Denary\DenaryWorkerApiController::class, 'addPass'])->middleware('denary');

    Route::get('holiday', [StudentApiController::class, 'holidays']);

    Route::post('worker/img/change', [\App\Http\Controllers\API\Workers\WorkerApiController::class, 'changeAvatarImgStore']);

    Route::post('worker/add/comment', [\App\Http\Controllers\API\Workers\WorkerApiController::class, 'addComment']);

});

