<?php

namespace App\Http\Controllers;

use App\Models\Idioma;

class MainController extends Controller
{
    public function index()
    {
        $idiomas = Idioma::where('estado_idioma', '=', 'ACTIVO')->get();

        return view('landing-page', compact('idiomas'));
    }
}
