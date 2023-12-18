<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $departments = Department::All();
        $departments = Department::orderBy('name', 'asc')->get();

        return view('departments.index', ['departments' => $departments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $departments = Department::All();
        return view('departmets.create', ['departments' => $departments]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $department = new Department();
        $department->name =  $request->name;
        $department->save();
        return redirect()->route('departments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
        return view('departmets.show', ['department' => $department]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        //
        return view('departmets.edit', ['department' => $department]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        //
        $request->validate([
            'name' => 'required|String',
            // Otros campos y reglas de validación según tus necesidades.
        ]);
        $department->name = $request->name;
        $department->save();
        return view('departmets.show', ['department' => $department]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        //

        try {
            $department->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'No se pudo borrar el departamento');
        }
    }
}
