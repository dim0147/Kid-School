<?php

use App\Http\Controllers\Admin\ClassRoomController as AdminClassRoomController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

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

Route::prefix('admin')->as('admin.')->middleware('auth')->group(function () {
    Route::resource('permissions', PermissionController::class)->except('show')->middleware('role:admin');

    Route::resource('roles', RoleController::class)->except('show')->middleware('role:admin');

    Route::resource('users', UserController::class)->only(['index', 'edit', 'update', 'destroy'])->middleware('role:admin');

    Route::resource('classrooms', AdminClassRoomController::class)->except('show');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
