<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use App\Models\Cycle;

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
        $totalDepartment = Department::count();
        return view('departments.index', ['departments' => $departments], compact('customPaginator', 'totalDepartment'));
    }
    public function index2(Request $request)
    {

        $departments = Department::OrderBy('name', 'asc')->get();


        foreach ($departments as $department) {
            // Obtén los usuarios del departamento ordenados por apellido
            $users = $department->users()->orderBy('surname', 'asc')->get();

            // Añade los usuarios al departamento actual
            $department->users = $users;
        }

        // Muestra la vista con la información de los departamentos y usuarios
        return view('departments.index2', compact('departments'));
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
        $department->name = $request->name;
        $department->save();
        return redirect()->route('departments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        $pagination = config('PAGINATION_COUNT');

        $cycles = Cycle::where('department_id', $department->id)->orderBy('name', 'asc')->paginate(15);
        $users = $department->users()->paginate($pagination);
        $customPaginator = new LengthAwarePaginator(
            $users->items(),
            $users->total(),
            $users->perPage(),
            $users->currentPage(),
            [
                'path' => LengthAwarePaginator::resolveCurrentPath(),
                'pageName' => 'page',
            ]
        );

        return view('departments.show', compact('department' ,'cycles', 'users', 'customPaginator'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        //
        $departments = Department::All();
        return view('departments.edit', ['department' => $department], ['departments' => $departments]);
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
