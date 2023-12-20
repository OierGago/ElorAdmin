<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Cycle;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modules = Module::All();
        $modules = Module::orderBy('created_at')->get();
        $modules = Module::paginate(2);
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
        $cycles = Cycle::OrderBy('name', 'asc')->get();
        return view('modules.create', ['modules' => $modules ,'cycles' => $cycles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $module = new Module();
        $module->name = $request->input('cycle_id');
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
        $modules = Module::All();
        $cycles = Cycle::OrderBy('name', 'asc')->get();
        return view('modules.create',['cycles' => $cycles , 'modules' => $modules , 'module'=>$module],);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Module $module)
    {
        $module->name = $request->name;
        $module->save();
        return redirect()->route('modules.index');
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
