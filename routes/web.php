<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin');
});

use App\Http\Controllers\DepartmentController;
Route::resource('/departments', DepartmentController::class);

use App\Http\Controllers\CycleController;
Route::resource('/cycles', CycleController::class);

use App\Http\Controllers\ModuleController;
Route::resource('/modules', ModuleController::class);

use App\Http\Controllers\RoleController;
Route::resource('/roles', RoleController::class);

use App\Http\Controllers\RoleUserController;
Route::resource('/roleUser', RoleUserController::class);


// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
