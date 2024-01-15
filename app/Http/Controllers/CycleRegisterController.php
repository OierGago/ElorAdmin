<?php

namespace App\Http\Controllers;


use App\Models\Department;
use App\Models\Cycle;
use App\Models\User;
use App\Models\CycleRegister;
use Illuminate\Http\Request;

class CycleRegisterController extends Controller
{

    public function obtenerModulosDeCiclo($cycleId)
{
    $cycle = Cycle::find($cycleId);

    if ($cycle) {
        $modulos = $cycle->modules()->get();
        // Ahora $modulos contiene todos los módulos asociados a este ciclo
        // Puedes hacer algo con $modulos, como pasarlos a una vista, devolverlos en una respuesta JSON, etc.

        // Por ejemplo, si deseas pasar los módulos a una vista, puedes hacer algo como:
        return $modulos;
    } else {
        // Manejo de ciclo no encontrado
        return response()->json(['error' => 'Ciclo no encontrado'], 404);
    }
}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $departments = Department::all();
        $cycles = Cycle::all();
        $cycleRegister = CycleRegister::All();
        $studentsNotInCycleRegister = User::studentsNotInCycleRegister()->get();
        return view('cycleRegister.index',['cycleRegister'=>$cycleRegister, 'departments'=>$departments, 'cycles'=> $cycles, 'studentsNotInCycleRegister'=>$studentsNotInCycleRegister]);
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
        $cycle_id= $request->cycle_id;
        $cycle = Cycle::find($cycle_id);
        $modulos = $cycle->modules()->where('year', $request->curso)->get(); 
        foreach($modulos as $modulo){
            if(!($modulo->id == 14 && $request->fct != 'on')){
                $cycle = new CycleRegister();
                    $cycle->user_id =$request->user_id;
                    $cycle->cycle_id =$request->cycle_id;
                    $cycle->module_id =$modulo->id;
                    $cycle->year =now()->year;
                    $cycle->save();
            } 
        }

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
