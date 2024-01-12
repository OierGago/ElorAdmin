<?php

namespace App\Http\Controllers;


use App\Models\Department;
use App\Models\Cycle;
use App\Models\CycleRegister;
use Illuminate\Http\Request;

class CycleRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $departments = Department::all();
        $cycles = Cycle::all();
        $cycleRegister = CycleRegister::All();
        return view('cycleRegister.index',['cycleRegister'=>$cycleRegister, 'departments'=>$departments, 'cycles'=> $cycles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cycleRegister = CycleRegister::All();
        return view('cycleRegister.create', ['cycleRegister' => $cycleRegister]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $cycle = new CycleRegister();
        $cycle->user_id =$request->user_id;
        $cycle->cycle_id =$request->cycle_id;
        $cycle->module_id =$request->module_id;
        $cycle->year =$request->year;
        $cycle->save();
        return redirect()->route('cycleRegister.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CycleRegister $cycleRegister)
    {
        //
        return view('cycleRegister.show', ['cycleRegister'=>$cycleRegister]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CycleRegister $cycleRegister)
    {
        //$
        return view('cycleRegister.edit',['cycleRegister'=>$cycleRegister]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CycleRegister $cycleRegister)
    {
        //
        $cycleRegister->user_id =$request->user_id;
        $cycleRegister->cycle_id =$request->cycle_id;
        $cycleRegister->module_id =$request->module_id;
        $cycleRegister->year =$request->year;
        $cycleRegister->pass =$request->pass;
        $cycleRegister->save();
        return redirect()->route('cycleRegister.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CycleRegister $cycleRegister)
    {
        //
        try {
            $cycleRegister->delete();
        } catch (\Throwable $th) {
            return redirect()->back() - with('error', 'No se pudo borrar el registro');
        }
    }
}
