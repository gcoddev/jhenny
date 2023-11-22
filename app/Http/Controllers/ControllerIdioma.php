<?php

namespace App\Http\Controllers;

use App\Models\Idioma;
use Illuminate\Http\Request;

class ControllerIdioma extends Controller
{
    public function index()
    {
        $idiomas = Idioma::where('estado_idioma', '<>', 'ELIMINADO')->get();

        return view('layouts.idioma.idiomas', compact('idiomas'));
    }
    public function editarIdioma($id)
    {
        $idioma = Idioma::where('id_idioma', '=', $id)->first();

        return view('layouts.idioma.editarIdioma', compact('idioma'));
    }
    public function post_estado_idioma($id_idioma)
    {
        $editEstado = Idioma::where('id_idioma', '=', $id_idioma)->first();
        if ($editEstado->estado_idioma == 'ACTIVO') {
            Idioma::where('id_idioma', '=', $id_idioma)->update(['estado_idioma' => 'INACTIVO']);
        } else if ($editEstado->estado_idioma == 'INACTIVO') {
            Idioma::where('id_idioma', '=', $id_idioma)->update(['estado_idioma' => 'ACTIVO']);
        }

        return redirect()->route('idiomas');
    }
    public function postIdioma(Request $request)
    {
        $id_idioma = $request->input('id_idioma');
        $validated = $request->validate([
            'nombre_idioma' => 'required',
            'tipo_idioma' => 'required',
        ]);

        $nombre_idioma = $request->input('nombre_idioma');
        $tipo_idioma = $request->input('tipo_idioma');

        if ($request->file('imagen_idioma')) {
            $file = $request->file('imagen_idioma');
            $name = time() . '.' . $file->extension();
            $file->storeAs('public/idiomas', $name);

            Idioma::where('id_idioma', '=', $id_idioma)->update(['nombre_idioma' => $nombre_idioma, 'tipo_idioma' => $tipo_idioma, 'imagen_idioma' => $name]);
        } else {
            Idioma::where('id_idioma', '=', $id_idioma)->update(['nombre_idioma' => $nombre_idioma, 'tipo_idioma' => $tipo_idioma]);
        }

        return redirect()->route('idiomas')->with('mensaje', 'Idioma actualizada correctamente.');
    }
    public function eliminarIdioma($id_idioma)
    {
        Idioma::where('id_idioma', '=', $id_idioma)->update(['estado_idioma' => 'ELIMINADO']);

        return redirect()->route('idiomas');
    }
    public function nuevoIdioma()
    {
        return view('layouts.idioma.nuevoIdioma');
    }
    public function post_nuevoIdioma(Request $request)
    {
        $validated = $request->validate([
            'nombre_idioma' => 'required',
            'tipo_idioma' => 'required',
            'imagen_idioma' => 'required',
        ]);

        $nuevoIdioma = new Idioma;
        $nuevoIdioma->nombre_idioma = $request->input('nombre_idioma');
        $nuevoIdioma->tipo_idioma = $request->input('tipo_idioma');

        $file = $request->file('imagen_idioma');
        $name = time() . '.' . $file->extension();
        $file->storeAs('public/idiomas', $name);
        $nuevoIdioma->imagen_idioma = $name;

        $nuevoIdioma->tipo_idioma = $request->input('tipo_idioma');
        $nuevoIdioma->save();

        return redirect()->route('idiomas')->with('mensaje', 'Idioma creado correctamente.');
    }
}
