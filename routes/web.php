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

Route::get('/worker/registration', 'App\Http\Controllers\Web\Workers\WorkerController@getForm')->name('worker.registration.form');
Route::post('/worker/registration', 'App\Http\Controllers\Web\Workers\WorkerController@Workerauthorize')->name('worker.registration');
Route::get('/worker/authorization', 'App\Http\Controllers\Web\Workers\WorkerController@WorkerLoginForm')->name('worker.authorization.form');
Route::post('/worker/authorization', 'App\Http\Controllers\Web\Workers\WorkerController@WorkerLogin')->name('worker.authorization');

Route::get('/worker/index', 'App\Http\Controllers\Web\Workers\WorkerController@WorkerIndex')->name('worker.index');


Route::get('student/get/comment', 'App\Http\Controllers\Web\Students\StudentController@getComment');
Route::get('student/add/comment', 'App\Http\Controllers\Web\Students\StudentController@addComment');
Route::get('student/get/timetable/week/', 'App\Http\Controllers\API\Students\Standart\TimeTableStudentController@getLessonForWeek');


Route::group(['prefix' => 'worker/umo/', 'middleware' => 'umo'], function () {
    Route::resource('room', \App\Http\Controllers\Web\Workers\UMO\UMOWorkerRoomController::class);
    Route::resource('teacher', \App\Http\Controllers\Web\Workers\UMO\UMOWorkerTeacherController::class);
    Route::resource('subject', \App\Http\Controllers\Web\Workers\UMO\UMOWorkerSubjectController::class);
    Route::resource('timetable', \App\Http\Controllers\Web\Workers\UMO\UMOWorkerTimetablesController::class);

});

Route::group(['prefix' => 'worker/denary/'], function () {
    Route::match(['get', 'post'], 'index', 'App\Http\Controllers\Web\Workers\Denary\DenaryWorkerController@getStudentsAttendance')->name('worker.denary.index');
    Route::get('{group}/pass', 'App\Http\Controllers\Web\Workers\Denary\DenaryWorkerController@groupPassEdit')->name('pass.edit');
    Route::post('pass/add', 'App\Http\Controllers\Web\Workers\Denary\DenaryWorkerController@addPass')->name('worker.add.pass');
    Route::get('student/{id}/information', 'App\Http\Controllers\Web\Workers\Denary\DenaryWorkerController@studentInformation')->name('worker.student.information');
    Route::post('student/change/information', 'App\Http\Controllers\Web\Workers\Denary\DenaryWorkerController@changeStudentInformation')->name('worker.denary.student.change.information');
    Route::get('student/{id}/all/information', 'App\Http\Controllers\Web\Workers\Denary\DenaryWorkerController@studentInformationAll')->name('worker.student.all.information');
    Route::get('student/{id}/all/pass', 'App\Http\Controllers\Web\Workers\Denary\DenaryWorkerController@studentPassAll')->name('worker.student.all.pass');
    Route::resource('group','App\Http\Controllers\Web\Workers\Denary\Group\DenaryGroupController');
    Route::get('group/{group}/all/student','App\Http\Controllers\Web\Workers\Denary\DenaryWorkerController@studentsGroupCreate')->name('worker.denary.group.all.student');
    Route::get('student/create','App\Http\Controllers\Web\Workers\Denary\DenaryWorkerController@studentCreate')->name('worker.denary.student.create');
    Route::post('student/create','App\Http\Controllers\Web\Workers\Denary\DenaryWorkerController@studentStore')->name('worker.denary.student.store');
    //    Route::get('room', \App\Http\Controllers\Web\Workers\Denary\DenaryWorkerController::class);
});

Route::resource('lord/department', \App\Http\Controllers\Web\Workers\Lord\DepartmentController::class);
Route::resource('worker/writter', \App\Http\Controllers\Web\Workers\WritterController::class);
