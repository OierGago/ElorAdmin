<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cycle;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CycleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cycles = Cycle::orderBy('name', 'asc')->get();
        return response()->json(['cycles' => $cycles])
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
                'name' => 'required|string',
                'department_id' => 'required|integer'
            ]);
            $cycle = new Cycle();

            $cycle->name = $request->name;
            $cycle->department_id = $request->department_id;
            $cycle->save();
            return response()->setStatusCode(Response::HTTP_ACCEPTED);
        } catch (\Exception  $e) {
            return response()->json(['error' => 'Los campos no son validos', 'message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cycle $cycle)
    {
        //
        return  response()->json($cycle);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cycle $cycle)
    {
        //
        try {
            $request->validate([
                'name' => 'required|string',
                'department_id' => 'required|integer'
            ]);

            $cycle->name = $request->name;
            $cycle->department_id = $request->department_id;
            $cycle->save();
            return response()->setStatusCode(Response::HTTP_ACCEPTED);
        } catch (\Exception  $e) {
            return response()->json(['error' => 'Error al procesar la solicitud', 'message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cycle $cycle)
    {
        //
        try {
            $cycle->delete();
            return response()->setStatusCode(Response::HTTP_ACCEPTED);
        } catch (\Throwable $th) {
            return response()->setStatusCode(Response::HTTP_NO_CONTENT);
        }
    }
}
