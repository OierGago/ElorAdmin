<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pagination = config('PAGINATION_COUNT');
        
        $roles = Role::All();
        $roles = Role::orderBy('name','asc')->get();
        $roles = Role::paginate($pagination);
        $customPaginator = new LengthAwarePaginator(
            $roles->items(),
            $roles->total(),
            $roles->perPage(),
            $roles->currentPage(),
            [
                'path' => LengthAwarePaginator::resolveCurrentPath(),
                'pageName' => 'page',
            ]
        );
        return view('roles.index', ['roles' => $roles], compact('customPaginator'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $roles = Role::All();
        return view('roles.create', ['roles' => $roles]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $roles = new Role();
        $roles->name =  $request->name;
        $roles->save();
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        $pagination = config('PAGINATION_COUNT');

        $users = $role->users()->paginate($pagination);

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
        return view('roles.show', ['role' => $role, 'users' => $users], compact('customPaginator'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
        $roles = Role::All();
        return view('roles.edit', ['roles' => $roles, 'role' => $role]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //
        $role->name = $request->name;
        $role->save();
        return redirect()->route('roles.index')->with('success', 'Rol editado con éxito');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
        try {
            if($role->name=='Administrador' ||$role->name=='Profesor'||$role->name=='Estudiante'){
                return redirect()->back()->with('error', 'No se puede eliminar ese rol');
            }
            $role->delete();
            return redirect()->back()->with('success', 'Rol eliminado con éxito');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'No se pudo eliminar el rol');
        }
    }
}
