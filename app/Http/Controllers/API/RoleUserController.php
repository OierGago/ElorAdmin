<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoleUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $roleUsers = RoleUser::orderBy('role_id', 'asc')->get();
        return response()->json(['roleUser' => $roleUsers])
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
                'role_id' => 'required|integer',
                'user_id' => 'required|integer'
                // Otros campos y reglas de validación según tus necesidades.
            ]);
            $roleUser = new RoleUser();
            $roleUser->role_id = $request->role_id;
            $roleUser->user_id = $request->user_id;
            $roleUser->save();
            return response()->setStatusCode(Response::HTTP_ACCEPTED);
        } catch (\Exception  $e) {
            return response()->json(['error' => 'Los campos no son validos', 'message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(RoleUser $roleUser)
    {
        return response()->json($roleUser);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RoleUser $roleUser)
    {
        try {
            $request->validate([
                'role_id' => 'required|integer',
                'user_id' => 'required|integer'
                // Otros campos y reglas de validación según tus necesidades.
            ]);
            $roleUser = new RoleUser();
            $roleUser->role_id = $request->role_id;
            $roleUser->user_id = $request->user_id;
            $roleUser->save();
            return response()->setStatusCode(Response::HTTP_ACCEPTED);
        } catch (\Exception  $e) {
            return response()->json(['error' => 'Error al procesar la solicitud', 'message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoleUser $roleUser)
    {
        //
        try {
            $roleUser->delete();
            return response()->setStatusCode(Response::HTTP_ACCEPTED);
        } catch (\Throwable $th) {
            return response()->setStatusCode(Response::HTTP_NO_CONTENT);
        }
    }
}
