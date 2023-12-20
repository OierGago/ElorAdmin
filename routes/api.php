<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
use App\Http\Controllers\API\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])
->middleware('auth:sanctum');


// AÑADIR LA RUTA DE LA BASE API
use App\Http\Controllers\API\DepartmentApiController;

Route::resource('departments', DepartmentApiController::class);

use App\Http\Controllers\API\CycleController;
Route::resource('cycles', CycleController::class);

use App\Http\Controllers\API\ModuleController;
Route::resource('modules', ModuleController::class);

use App\Http\Controllers\API\RoleController;
Route::resource('roles', RoleController::class);


use App\Http\Controllers\API\RoleUserController;
Route::resource('roleUser', RoleUserController::class);
