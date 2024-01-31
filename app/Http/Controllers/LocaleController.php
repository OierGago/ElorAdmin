<?php

namespace App\Http\Controllers;


class LocaleController extends Controller
{
    public function cambiarIdioma($locale)
    {
        
            app()->setLocale($locale);
            session()->put('locale', $locale);
        
        return redirect()->back(); // Regresa a la página anterior
    }
}

