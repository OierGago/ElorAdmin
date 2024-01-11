<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Cycle;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $query = User::query();

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->input('search') . '%')
                  ->orWhere('surname', 'like', '%' . $request->input('search') . '%')
                  ->orWhere('dni', 'like', '%' . $request->input('search') . '%');
        }
    
        $users = $query->paginate(12);

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
        return view('users.index',['users'=>$users], compact('customPaginator'));
    }
    public function index2(Request $request)
    {   
      
       // $users = User::All();
       
        
        $users = User::OrderBy('surname','asc')->paginate(15);
       // $users = User::(15); 
        return view('users.index2',['users' => $users],compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::All();
        return view('users.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->roles = $request->input('role');
        $user->dni = $request->input('dni');
        $user->curso = $request->input('curso');
        $user->fct = $request->input('fct');
        $user->save();
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //$user = Auth::user()->load('department', 'cycle.modules', 'cycle.users');

        $cycles = Cycle::all();
    
        return view('users.show', compact('user', 'cycles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        $users = User::all();
        $roles = Role::all();
        return view('users.edit', ['users' => $users, 'user' => $user, 'roles'=> $roles]);
    }

    /**
     * Update the specified resource in storage.
     */
   /* public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->save();
        return redirect()->route('users.index');
    }
    **/
    public function update(Request $request, User $user){
        // Validar los datos según tus necesidades
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required',
            'roles' => 'array', // Asegúrate de que 'roles' sea un array
            'dni' => 'required'
        ]);

        // Actualizar los campos básicos del usuario
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->dni = $request->dni;

        // Actualizar roles del usuario
        $user->roles()->sync($request->roles);

        // Guardar los cambios
        $user->save();

        // Redirigir a la vista de detalles del usuario o a donde desees
        return redirect()->route('users.index', $user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        try {
            $user->delete();
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'No se pudo borrar el usuario');
        }
    }
   

}
