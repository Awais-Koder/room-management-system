<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EntrySimulationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\MyEntryLogsController;
use App\Http\Controllers\MyPermissionController;
use App\Http\Controllers\RoomController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::controller(HomeController::class)->group(function () {
    Route::get('/dashboard', 'index')->name(name: 'dashboard');
});
Route::middleware('auth')->group(function () {


    Route::middleware('admin')->controller(EmployeeController::class)->group(function () {
        Route::get('/employee/show/{id}', 'show')->name(name: 'employee.show')->withoutMiddleware('admin');
        Route::get('/employees', 'index')->name(name: 'employees')->withoutMiddleware('admin');
        Route::get('/employee/create', 'create')->name(name: 'employee.create');
        Route::post('/employee/store', 'store')->name(name: 'employee.store');
        Route::get('/employee/edit/{id}', 'edit')->name(name: 'employee.edit');
        Route::post('/employee/update/{id}', 'update')->name(name: 'employee.update');
        Route::get('/employee/delete/{id}', 'delete')->name(name: 'employee.delete');
        Route::get('/employee/history/{id}', 'history')->name(name: 'employee.history');
    });
    // job roles
    Route::middleware('admin')->controller(JobsController::class)->group(function () {
        Route::get('/positions', 'index')->name(name: 'jobs')->withoutMiddleware('admin');
        Route::get('/position/create', 'create')->name(name: 'job.create');
        Route::get('/position/create', 'create')->name(name: 'job.create');
        Route::post('/position/store', 'store')->name(name: 'job.store');
        Route::get('/position/edit/{id}', 'edit')->name(name: 'job.edit');
        Route::post('/position/update/{id}', 'update')->name(name: 'job.update');
        Route::get('/position/delete/{id}', 'delete')->name(name: 'job.delete');
        Route::get('/position/show/{id}', 'show')->name(name: 'job.show')->withoutMiddleware('admin');
    });

    Route::middleware('admin')->controller(RoomController::class)->group(function () {
        Route::get('rooms', 'index')->name('rooms')->withoutMiddleware('admin');
        Route::get('room/create', 'create')->name('room.create');
        Route::post('room/store', 'store')->name('room.store');
        Route::get('room/edit/{id}', 'edit')->name('room.edit');
        Route::post('room/update/{id}', 'update')->name('room.update');
        Route::get('room/show/{id}', 'show')->name('room.show')->withoutMiddleware('admin');
        Route::get('room/delete/{id}', 'delete')->name('room.delete');
        Route::get('room/entry/history/{id}', 'history')->name('room.entry.history');
    });

    Route::controller(EntrySimulationController::class)->group(function () {
        Route::get('entries', 'index')->name('entry.simulation');
        Route::post('entry/check/access', 'checkAccess')->name('entry.check.access');

    });

    Route::controller(MyPermissionController::class)->group(function () {
        Route::get('my-permissions', 'index')->name('my.permission');
    });
    Route::controller(MyEntryLogsController::class)->group(function () {
        Route::get('my-entry-logs', 'index')->name('my.entry.logs');
    });
});

Auth::routes();

