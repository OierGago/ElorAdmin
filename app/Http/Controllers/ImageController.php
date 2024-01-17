<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('images', $imageName, 'public');

            // Puedes ajustar la respuesta según tus necesidades
            return response()->json([
                'success' => true,
                'message' => 'Imagen cargada exitosamente',
                'imageUrl' => url('storage/images/' . $imageName),
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'No se proporcionó ninguna imagen',
        ], 400);
    }
}