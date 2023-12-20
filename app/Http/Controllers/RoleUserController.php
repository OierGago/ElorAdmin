<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleUser;
use Illuminate\Pagination\LengthAwarePaginator;

class RoleUserController extends Controller
{
    //
    /**
     * Muestra la lista de roles de usuario.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roleUsers = RoleUser::all();
        $roleUsers = RoleUser::orderBy('created_at')->get();
        $roleUsers = RoleUser::paginate(2);
        $customPaginator = new LengthAwarePaginator(
            $roleUsers->items(),
            $roleUsers->total(),
            $roleUsers->perPage(),
            $roleUsers->currentPage(),
            [
                'path' => LengthAwarePaginator::resolveCurrentPath(),
                'pageName' => 'page',
            ]
        );
        return view('roleUsers.index', ['roleUsers' => $roleUsers], compact('customPaginator'));
    }

    /**
     * Muestra el formulario para crear un nuevo rol de usuario.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roleUsers.create');
    }

    /**
     * Almacena un nuevo rol de usuario en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
            return redirect()->route('roleUsers.index')
                ->with('success', 'Rol de usuario creado correctamente.');
        } catch (\Exception  $e) {
            //TODO que devuelva error
        }
    }
    public function show(RoleUser $roleUser)
    {
        //
        return view('roleUsers.show ', ['roleUser' => $roleUser]);
    }
    public function edit(RoleUser $roleUser)
    {
        //
        return view('roleUsers.edit', ['roleUser' => $roleUser]);
    }
    public function update(Request $request, RoleUser $roleUser)
    {
        //
        try {
        $request->validate([
            'role_id' => 'required|integer',
            'user_id' => 'required|integer'
            // Otros campos y reglas de validación según tus necesidades.
        ]);

        $roleUser->name = $request->name;
        $roleUser->role_id = $request->role_id;
        $roleUser->user_id = $request->user_id;
        $roleUser->save();
        return view('roleUsers.show', ['roleUser' => $roleUser]);
    } catch (\Exception  $e) {
        //TODO que devuelva error
    }
    }
    public function destroy(RoleUser $roleUser)
    {
        //

        try {
            $roleUser->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'No se pudo borrar el Usuario y Rol');
        }
    }
}
