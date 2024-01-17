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
use App\Models\ProfessorCycle;
use Illuminate\Support\Facades\DB;

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
    
        $cycleName = DB::table("cycles")
            ->distinct()
            ->join('professor_cycle', 'cycles.id', '=', 'professor_cycle.cycle_id')
            ->select('cycles.name')
            ->where('professor_cycle.user_id', Auth::user()->id)
            ->get();

        
    
        // Pasa las variables a la vista
        return view('home', compact('modules', 'departments', 'cycleName'));
    }
    
}
