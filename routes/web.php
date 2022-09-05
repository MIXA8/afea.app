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
Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});
//Route::get('/worker/registration', 'App\Http\Controllers\Web\Workers\WorkerController@getForm')->name('worker.registration.form');
//Route::post('/worker/registration', 'App\Http\Controllers\Web\Workers\WorkerController@Workerauthorize')->name('worker.registration');
Route::get('/worker/authorization', 'App\Http\Controllers\Web\Workers\WorkerController@WorkerLoginForm')->name('worker.authorization.form');
Route::get('/worker/logout', 'App\Http\Controllers\Web\Workers\WorkerController@logout')->name('worker.logout');
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

Route::group(['prefix' => 'lord', ], function () {
    Route::resource('post', \App\Http\Controllers\Web\Workers\Lord\Post\PostLordController::class);

});

Route::group(['prefix' => 'worker/', 'middleware' => 'worker'], function () {
    Route::get('coming-soon', 'App\Http\Controllers\Controller@commingSoon')->name('coming.soon');
    Route::get('setting', 'App\Http\Controllers\Web\Workers\WorkerController@getSettings')->name('worker.setting');
    Route::post('setting/change/img', 'App\Http\Controllers\Web\Workers\WorkerController@changeAvatarImgStore')->name('worker.change.img');
    Route::post('setting/change/login/password', 'App\Http\Controllers\Web\Workers\WorkerController@changeLoginAndPassword')->name('worker.change.login.password');
    Route::post('setting/change/information/account', 'App\Http\Controllers\Web\Workers\WorkerController@changeAccountProfile')->name('worker.change.information.account');
});

Route::group(['prefix' => 'worker/standart/', 'middleware' => 'webstandartgets'], function () {
    Route::match(['get', 'post'], 'index', 'App\Http\Controllers\Web\Workers\Denary\DenaryWorkerController@getStudentsAttendance')->name('worker.denary.index');
    Route::get('{group}/pass/html','App\Http\Controllers\Web\Workers\Denary\DenaryWorkerController@groupPassPDF')->name('pass.pdf');
    Route::get('student/{id}/all/information', 'App\Http\Controllers\Web\Workers\Denary\DenaryWorkerController@studentInformationAll')->name('worker.student.all.information');
    Route::get('student/{id}/all/pass', 'App\Http\Controllers\Web\Workers\Denary\DenaryWorkerController@studentPassAll')->name('worker.student.all.pass');
    Route::get('student/{id}/all/statement', 'App\Http\Controllers\Web\Workers\Denary\DenaryWorkerController@studentStatementAll')->name('worker.student.all.state');
    Route::get('group/{group}/all/student', 'App\Http\Controllers\Web\Workers\Denary\DenaryWorkerController@studentsGroup')->name('worker.denary.group.all.student');
    Route::get('group/{statement}', 'App\Http\Controllers\Web\Workers\Denary\DenaryWorkerController@showStatement')->name('worker.statement.show');
});



Route::group(['prefix' => 'worker/denary/', 'middleware' => 'webworkerdenary'], function () {
    Route::get('{group}/pass', 'App\Http\Controllers\Web\Workers\Denary\DenaryWorkerController@groupPassEdit')->name('pass.edit');
    Route::post('pass/add', 'App\Http\Controllers\Web\Workers\Denary\DenaryWorkerController@addPass')->name('worker.add.pass');
    Route::get('student/{id}/information', 'App\Http\Controllers\Web\Workers\Denary\DenaryWorkerController@studentInformation')->name('worker.student.information');
    Route::post('student/change/information', 'App\Http\Controllers\Web\Workers\Denary\DenaryWorkerController@changeStudentInformation')->name('worker.denary.student.change.information');
    Route::resource('group', 'App\Http\Controllers\Web\Workers\Denary\Group\DenaryGroupController');
    Route::get('student/create', 'App\Http\Controllers\Web\Workers\Denary\DenaryWorkerController@studentCreate')->name('worker.denary.student.create');
    Route::post('student/create', 'App\Http\Controllers\Web\Workers\Denary\DenaryWorkerController@studentStore')->name('worker.denary.student.store');
    Route::resource('statement', 'App\Http\Controllers\Web\Workers\Denary\Statement\DenaryStatementController');
});

//Route::resource('lord/department', \App\Http\Controllers\Web\Workers\Lord\DepartmentController::class);
//Route::resource('worker/writter', \App\Http\Controllers\Web\Workers\WritterController::class);
