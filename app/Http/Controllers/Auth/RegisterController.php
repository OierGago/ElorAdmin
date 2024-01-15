<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Department;
use App\Models\Cycle; 
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required','string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'address' => ['required','string', 'max:255'],
            'phone' => ['required','integer'],
            'dni' => ['required','string', 'max:10'],
            'curso' => ['integer', 'max:255', 'nullable'],
            'department_id' => ['integer', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */

     public function showRegistrationForm()
     {
         $departments = Department::all();
         $cycles = Cycle::all();
         return view('auth.register', compact('departments', 'cycles'));
     }

     public function rules()
    {
        $rules = [
            // ... otras reglas de validación ...

            'curso' => ['required', Rule::in(['1', '2'])],
        ];

        // Si el curso es 2, agregar regla para el checkbox FCT
        if ($this->input('curso') == 2) {
            $rules['fct'] = 'nullable|boolean';
        }

        return $rules;
    }
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'password' => Hash::make('Elorrieta00'),
            'address' => $data['address'],
            'phone' => $data['phone'],
            'dni' => $data['dni'],
            /*'curso' => $data['curso'],
            // Si el elemento existe en el array devuelve true si no existe devuelve false
            'fct' => array_key_exists('fct',$data),
            'department_id' => $data['department_id'],
            'cycle_id' => $data['cycle_id'],*/
        ]);

        /*if ($data['curso'] == 1 && isset($data['fct'])) {
            $user->fct = false;
            $user->save();
        }*/

        return $user;
    }
}
