<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskStatusController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', [PagesController::class, 'loginPage'])->name('home');
Route::get('/dashboard', [PagesController::class, 'dashboardPage'])->name('dashboard')->middleware('auth');

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    // User
    Route::get('tasks',[UserController::class,'getTasks'])->name('get.user.tasks');

    // Tasks
    Route::get('task/{id}',[TaskController::class, 'getTaskByID'])->name('get.task.by.id');
    Route::post('manage/task',[TaskController::class, 'manageTask'])->name('manage.task');
    Route::post('delete/task/{id}',[TaskController::class,'delete'])->name('delete.task');
    Route::post('restore/task/{id}', [TaskController::class,'restoreTask'])->name('restore.task');
    Route::get('task/get/parent/{id}', [TaskController::class, 'getParentId'])->name('get.task.parent.id');
    Route::get('tasks/download', [TaskController::class,'downloadTasks'])->name('download.data');
    Route::get('tasks/get/archived',[TaskController::class, 'getArchivedTasks'])->name('get.archived.tasks');
    Route::get('tasks/get/stats',[TaskController::class, 'getStatistics'])->name('get.stats');
    Route::post('tasks/update/order', [TaskController::class, 'updateOrder'])->name('update.order');

    //Task Statuses
    Route::get('get/all/statuses', [TaskStatusController::class, 'getAllStatusesByUser'])->name('get.all.statuses.by.user');
    Route::post('create/new/status', [TaskStatusController::class, 'create'])->name('create.new.status');

});
