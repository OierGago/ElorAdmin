<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

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
        $departments = Department::paginate(15);
        $customPaginator = new LengthAwarePaginator(
            $departments->items(),
            $departments->total(),
            $departments->perPage(),
            $departments->currentPage(),
            [
                'path' => LengthAwarePaginator::resolveCurrentPath(),
                'pageName' => 'page',
            ]
        );
        $totalDepartment=Department::count();
        return view('departments.index', ['departments' => $departments], compact('customPaginator','totalDepartment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $departments = Department::All();
        return view('departments.create', ['departments' => $departments]);
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
        return view('departments.show', ['department' => $department]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        //
        $departments = Department::All();
        return view('departments.edit', ['department' => $department],['departments' => $departments]);
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
        return redirect()->route('departments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        try {
            $department->delete();
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'No se pudo borrar el departamento');
        }
    }
}
