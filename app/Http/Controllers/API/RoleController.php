<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $roles = Role::orderBy('id', 'asc')->get();
        return response()->json(['roles' => $roles])
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $request->validate([
                'name' => 'required|string'
            ]);
            $role = new Role();
            $role->name = $request->name;
            $role->save();
            return response()->json([$request->name ], Response::HTTP_ACCEPTED);
        } catch (\Exception  $e) {
            return response()->json(['error' => 'Los campos no son validos', 'message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
        return response()->json($role);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //
        try {
            $request->validate([
                'name' => 'required|string'
            ]);
            $role->name = $request->name;
            $role->save();
            return response()->json([$request->name ], Response::HTTP_ACCEPTED);
        } catch (\Exception  $e) {
            return response()->json(['error' => 'Error al procesar la solicitud', 'message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
        try {
            $role->delete();
            return response()->setStatusCode(Response::HTTP_ACCEPTED);
        } catch (\Throwable $th) {
            return response()->setStatusCode(Response::HTTP_NO_CONTENT);
        }
    }
}
