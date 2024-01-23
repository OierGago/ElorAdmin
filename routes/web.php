<?php

use App\Http\Controllers\CycleRegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CycleController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\RoleController;


use App\Http\Controllers\RoleUserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;

use App\Models\Role;
use App\Models\User;
use App\Models\Cycle;
use App\Models\Department;
use App\Models\Module;
use Illuminate\Pagination\LengthAwarePaginator;


Route::get('/admin', function () {

        $totalUsers = User::count();
        $alumnos = User::obtenerUsuariosPorRol('estudiante')->count();
        $usuariosMatriculados = $alumnos - User::studentsNotInCycleRegister()->count();
        $totalCycles = Cycle::count();
        $usersSinRol = User::countUsersWithoutRole();
        $totalModules = Module::count();
        $totalDepartment=Department::count();
    return view('infoAdmin',  compact('totalDepartment','totalUsers','usersSinRol','totalModules','totalCycles', 'usuariosMatriculados'));
});
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
    return view('auth.login');
});

Route::middleware(['auth','admin'])->group(function () {
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
    Route::resource('users', UserController::class);
    Route::resource('cycleRegister', CycleRegisterController::Class);
    // ... otras rutas de administrador
});


//Route::resource('departments', DepartmentController::class);
//Route::resource('cycles', CycleController::class);
//Route::resource('modules', ModuleController::class);
//Route::resource('roles', RoleController::class);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

use Illuminate\Support\Facades\Auth;
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users', [UserController::class, 'index2']);
Route::get('/departments', [DepartmentController::class, 'index2']);

Route::get('/registerUser', [UserController::class, 'showRegistrationForm'])->name('registerUser');
Route::post('/admin/users/create', [UserController::class, 'create']);

Route::get('/cycles', [CycleController::class, 'index2']);