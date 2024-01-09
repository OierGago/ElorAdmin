<?php

namespace App\Http\Controllers;

use App\Models\Cycle;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class CycleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cycles = Cycle::All();
        $cycles = Cycle::orderBy('name', 'asc')->get();
        $cycles = Cycle::paginate(15);
        $customPaginator = new LengthAwarePaginator(
            $cycles->items(),
            $cycles->total(),
            $cycles->perPage(),
            $cycles->currentPage(),
            [
                'path' => LengthAwarePaginator::resolveCurrentPath(),
                'pageName' => 'page',
            ]
        );
        return view('cycles.index', ['cycles' => $cycles], compact('customPaginator'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::All();
        $cycles = Cycle::All();
        return view('cycles.create', ['cycles' => $cycles , 'departments' => $departments]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $cycle = new Cycle();
        $cycle->name = $request->name;
        $cycle->department_id = $request->input('department_id');
        $cycle->save();
        return redirect()->route('cycles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cycle $cycle)
    {
        //
        return view('cycles.show', ['cycle' => $cycle]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cycle $cycle)
    {
        //ç
        $departments = Department::All();
        $cycles = Cycle::All();
        return view('cycles.edit', ['cycles' => $cycles , 'departments' => $departments , 'cycle' => $cycle]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cycle $cycle)
    {
        //
        $cycle->name = $request->name;
        $cycle->department_id = $request->department_id;
        $cycle->save();
        return redirect()->route('cycles.index');
 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cycle $cycle)
    {
        //
        try{
            $cycle->delete();
        }
        catch(\Throwable $th){
            return redirect()->back()-with('error', 'No se pudo borrar el cyclo');
        }
    }
}
