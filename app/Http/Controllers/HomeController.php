<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Department;
use App\Models\Cycle;
use App\Models\User;
use App\Models\Role;

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

        // Pasa las variables a la vista
        return view('home', compact('modules', 'departments','cycles','users', 'roles'));
    }
}
