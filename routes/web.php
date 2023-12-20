<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CycleController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoleUserController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/admin', function () {
    return view('admin');
});
Route::middleware(['auth'])->group(function () {
    Route::resources([    ]);
    });
    // 'middleware' => ['auth', 'admin']
Route::group(['prefix' => 'admin'], function () {
    // Rutas para el panel de administración
    //Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::resource('departments', DepartmentController::class);
    Route::resource('cycles', CycleController::class);
    Route::resource('modules', ModuleController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('roleUsers', RoleUserController::class);
    // ... otras rutas de administrador
});


//Route::resource('departments', DepartmentController::class);
//Route::resource('cycles', CycleController::class);
//Route::resource('modules', ModuleController::class);
//Route::resource('roles', RoleController::class);



use Illuminate\Support\Facades\Auth;
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
