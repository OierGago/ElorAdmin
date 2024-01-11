<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Module;
use App\Models\Department;
use App\Models\Cycle;
use App\Models\User;
use App\Models\Role;
use App\Models\CycleRegister;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $modules = Module::all();
        $departments = Department::all(); 
        $cycles = Cycle::all();  
        $users = User::all(); 
        $roles = Role::all(); 
        $cyclesRegisters = CycleRegister::all();

        // Pasa las variables a la vista
        return view('home', compact('modules','departments','cycles','users', 'roles','cyclesRegisters'));
    }
}
