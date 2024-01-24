<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $paginationCount = 50; // Puedes ajustar este valor según tus necesidades.

    $modules = Module::orderBy('id', 'asc')->paginate($paginationCount);

    return response()->json([
        'modules' => $modules->items(),
        'total' => $modules->total(),
        'per_page' => $paginationCount, // Estableces el número de elementos por página.
        'current_page' => $modules->currentPage(),
        'last_page' => $modules->lastPage(),
    ])->setStatusCode(Response::HTTP_OK);
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string'
            ]);
            $module = new Module();
            $module->name = $request->name;
            $module->save();
            return response()->json([
                'name' => $request->name
            ], Response::HTTP_ACCEPTED);
        } catch (\Exception  $e) {
            return response()->json(['error' => 'Los campos no son validos', 'message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Module $module)
    {
        return response()->json($module);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Module $module)
    {
        try {
            $request->validate([
                'name' => 'required|string'
            ]);
            $module->name = $request->name;
            $module->save();
            return response()->json([
                'name' => $request->name
            ], Response::HTTP_ACCEPTED);
        } catch (\Exception  $e) {
            return response()->json(['error' => 'Error al procesar la solicitud', 'message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Module $module)
    {
        try {
            $module->delete();
            return response()->json([
                'Se eliminó con exito'
            ], Response::HTTP_ACCEPTED);
        } catch (\Throwable $th) {
            return response()->setStatusCode(Response::HTTP_NO_CONTENT);
        }
    }
}
