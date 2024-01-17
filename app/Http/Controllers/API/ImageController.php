<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Puedes ajustar las reglas según tus necesidades
        ]);
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('images', $imageName, 'public');
    
            // Puedes almacenar la información de la imagen en la base de datos si es necesario
            // Aquí asumimos que tienes un modelo Image asociado a una tabla images
            // y un campo 'file_path' para almacenar la ruta del archivo en la base de datos
            $imageModel = new Image();
            $imageModel->file_path = '/var/www/html/public/images' . $imageName;
            $imageModel->save();
    
            return response()->json([
                'success' => true,
                'message' => 'Imagen cargada exitosamente',
                'imageUrl' => url('/var/www/html/public/images' . $imageName),
            ], 200);
        }
    
        return response()->json([
            'success' => false,
            'message' => 'No se proporcionó ninguna imagen',
        ], 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
