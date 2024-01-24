<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DepartmentApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $paginationCount = 50; // Puedes ajustar este valor según tus necesidades.

    $departments = Department::orderBy('id', 'asc')->paginate($paginationCount);

    return response()->json([
        'departments' => $departments->items(),
        'total' => $departments->total(),
        'per_page' => $paginationCount, // Estableces el número de elementos por página.
        'current_page' => $departments->currentPage(),
        'last_page' => $departments->lastPage(),
    ])->setStatusCode(Response::HTTP_OK);
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
            return response()->json([
                'name' => $request->name
            ], Response::HTTP_ACCEPTED);

    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
        return response()->json($department);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        //

            $department->name = $request->name;
            $department->save();
            return response()->json([
                'name' => $request->name
            ], Response::HTTP_ACCEPTED);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        //
        try {
            $department->delete();
            return response()->json([
                'Se eliminó con exito'
            ], Response::HTTP_ACCEPTED);
        } catch (\Throwable $th) {
            return response()->setStatusCode(Response::HTTP_NO_CONTENT);
        }
    }
}
