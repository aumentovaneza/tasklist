<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskStatusController;
use App\Http\Controllers\UserController;
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

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    // User
    Route::get('tasks',[UserController::class,'getTasks'])->name('get.user.tasks');

    // Tasks
    Route::get('task/{id}',[TaskController::class, 'getTaskByID'])->name('get.task.by.id');
    Route::post('manage/task',[TaskController::class, 'manageTask'])->name('manage.task');
    Route::delete('delete/task/{id}',[TaskController::class,'delete'])->name('delete.task');
    Route::post('restore/task/{id}', [TaskController::class,'restoreTask'])->name('restore.task');

    //Task Statuses
    Route::get('get/all/statuses', [TaskStatusController::class, 'getAllStatusesByUser'])->name('get.all.statuses.by.user');
    Route::post('create/new/status', [TaskStatusController::class, 'create'])->name('create.new.status');

});
