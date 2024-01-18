<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Cycle;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pagination = config('PAGINATION_COUNT');

        $modules = Module::All();
        $modules = Module::orderBy('created_at')->get();
        $modules = Module::paginate($pagination);
        $customPaginator = new LengthAwarePaginator(
            $modules->items(),
            $modules->total(),
            $modules->perPage(),
            $modules->currentPage(),
            [
                'path' => LengthAwarePaginator::resolveCurrentPath(),
                'pageName' => 'page',
            ]
        );
        return view('modules.index',['modules' => $modules], compact('customPaginator'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $modules = Module::All();
        $cycles = Cycle::all();
        return view('modules.create', ['modules' => $modules, 'cycles'=> $cycles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $module = new Module();
        $module->name = $request->name;
        $module->save();
        return redirect()->route('modules.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Module $module)
    {
        return view('modules.show',['module'=>$module]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Module $module)
    {
        $cycles = Cycle::all(); 
        $modules = Module::all(); 

        return view('modules.edit',['module'=>$module, 'modules'=>$modules, 'cycles' => $cycles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Module $module)
    {
        $module->name = $request->name;
        $module->save();
        return view('modules.index',['module'=>$module]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Module $module)
    {
        $module->delete();
        return redirect()->route('modules.index');
    }
}
