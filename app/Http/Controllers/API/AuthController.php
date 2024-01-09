<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Response;


class AuthController extends Controller
{
    public function update(Request $request ,User $user)
    {   
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'surname' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
                'address' => 'required|string|max:255',
                'phone' => 'required|integer',
                'dni' => 'required|string|max:255',
                'curso' => 'integer',
                'department_id' => 'integer',
                'cycle_id'=> 'integer'
            ]);

            if(!$user){
                return response()->json(['error' => 'Recurso no encontrado'], Response::HTTP_NOT_FOUND);
            }

            $user->name = $request->name;
            $user->surname = $request->surname;
            $user-> email = $request->email;
            $user-> password = $request->password;
            $user-> address = $request->address;
            $user-> phone = $request->phone;
            $user-> dni = $request->dni;
            $user-> curso = $request->curso;
            $user-> department_id = $request->department_id;
            $user-> cycle_id = $request->cycle_id;
            $user -> save();

            return response()->json([
                'name' => $request->name,
                'surname' => $request->surname,
                'email' => $request->email,
                'password' => $request->password,
                'address' => $request->address,
                'phone' => $request->phone,
                'dni' => $request->dni,
                'curso' => $request->curso,
                'department_id' => $request->department_id,
                'cycle_id' => $request->cycle_id

            ], Response::HTTP_ACCEPTED);


        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al procesar la solicitud', 'message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function register(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'address' => 'required|string|max:255',
            'phone' => 'required|integer',
            'dni' => 'required|string|max:255',
            'curso' => 'integer',
            'department_id' => 'integer',
            'cycle_id'=> 'integer'

        ]);
        $user = User::create([
            'name' => $validatedData['name'],
            'surname' => $validatedData['surname'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'address' => $validatedData['address'],
            'phone'=> $validatedData['phone'],
            'dni' => $validatedData['dni'],
            'curso' => $validatedData['curso'],
            'department_id' => $validatedData['department_id'],
            'cycle_id' => $validatedData['cycle_id'],

        ]);
        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
        ])->setStatusCode(Response::HTTP_CREATED);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => ['Username or password incorrect'],
            ])->setStatusCode(Response::HTTP_UNAUTHORIZED);
        }

        
        // FIXME: queremos dejar más dispositivos?
        // $user->tokens()->delete();
        $token = $user->createToken($request->email)->plainTextToken;
        return response()->json([
            'status' => 'success',
            'message' => 'User logged in successfully',
            'name' => $user->name, 
            'token' => $token,
        ])->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'User logged out successfully'
        ])->setStatusCode(Response::HTTP_OK);
    }
}
