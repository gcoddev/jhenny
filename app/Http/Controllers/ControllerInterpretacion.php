<?php

namespace App\Http\Controllers;

use App\Models\Idioma;
use App\Models\Interpretacion;
use App\Models\Pago;
use App\Models\SolicitudPago;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerInterpretacion extends Controller
{
    public function index()
    {
        $pagos = Pago::where('estado_pago', '=', 'ACTIVO')->get();
        $interpretes = User::where('status', '=', 'ACTIVO')->where('id_role', '=', 4)->get();

        if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2 || Auth::user()->id_role == 3 || Auth::user()->id_role == 4) {
            $interpretaciones = Interpretacion::where('estado_interpretacion', '<>', 'ELIMINADO')->get();
        } elseif (Auth::user()->id_role == 5) {
            $interpretaciones = Interpretacion::where('estado_interpretacion', '<>', 'ELIMINADO')->where('id', '=', Auth::user()->id)->get();
        }

        return view('layouts.interpretacion.interpretaciones', compact('interpretaciones', 'interpretes', 'pagos'));
    }
    public function getPago(Request $request)
    {
        // dd($request);
    }
    public function post_estado_interpretacion($id)
    {
        $editEstado = Interpretacion::where('id_interpretacion', '=', $id)->first();
        if ($editEstado->estado_interpretacion == 'ACTIVO') {
            Interpretacion::where('id_interpretacion', '=', $id)->update(['estado_interpretacion' => 'INACTIVO']);
        } else if ($editEstado->estado_interpretacion == 'INACTIVO') {
            Interpretacion::where('id_interpretacion', '=', $id)->update(['estado_interpretacion' => 'ACTIVO']);
        }

        return redirect()->route('interpretacion')->with('mensaje', 'Estado actualizado correctamente.');
    }
    public function nuevoInterpretacion()
    {
        $idiomas = Idioma::where('estado_idioma', '=', 'ACTIVO')->get();
        return view('layouts.interpretacion.nuevoInterpretacion', compact('idiomas'));
    }
    public function editarInterpretacion($id)
    {
        $idiomas = Idioma::where('estado_idioma', '=', 'ACTIVO')->get();
        $interpretacion = Interpretacion::where('id_interpretacion', '=', $id)->first();

        return view('layouts.interpretacion.editarInterpretacion', compact('interpretacion', 'idiomas'));
    }
    public function eliminarInterpretacion($id)
    {
        Interpretacion::where('id_interpretacion', '=', $id)->update(['estado_interpretacion' => 'ELIMINADO']);

        return redirect()->route('interpretacion')->with('mensaje', 'Solicitud de interpretacion eliminada correctamente.');
    }
    public function asignarInterprete(Request $request, $id_interpretacion)
    {
        $validated = $request->validate([
            'id_asignado' => 'required',
        ]);
        Interpretacion::where('id_interpretacion', '=', $id_interpretacion)->update(['id_asignado' => $request->input('id_asignado')]);

        return redirect()->route('interpretacion')->with('mensaje', 'Solicitud de interpretacion asignada correctamente.');
    }
    public function pagoComprobar(Request $request, $id_interpretacion)
    {
        $validated = $request->validate([
            'id_pago' => 'required',
        ]);
        $id_pago = $request->input('id_pago');

        if ($id_pago == 1) {
            $name = 'EFECTIVO';
        } else {
            $validated = $request->validate([
                'comprobante_pago' => 'required',
            ]);
            $file = $request->file('comprobante_pago');
            $name = time() . '.' . $file->extension();
            $file->storeAs('public/comprobante', $name);
        }

        SolicitudPago::where('id_interpretacion', '=', $id_interpretacion)->update(['id_pago' => $id_pago, 'comprobante_pago' => $name]);

        return redirect()->route('interpretacion')->with('mensaje', 'Comprobante pago enviado correctamente.');
    }
    public function post_nuevoInterpretacion(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required',
            'id_idioma' => 'required',
            'titulo_interpretacion' => 'required',
            'descripcion_interpretacion' => 'required',
        ]);

        $nuevoInterpretacion = new Interpretacion;
        $nuevoInterpretacion->id = $request->input('id');
        $nuevoInterpretacion->id_idioma = $request->input('id_idioma');
        $nuevoInterpretacion->titulo_interpretacion = $request->input('titulo_interpretacion');
        $nuevoInterpretacion->descripcion_interpretacion = $request->input('descripcion_interpretacion');
        $nuevoInterpretacion->save();

        $interpretacion = Interpretacion::orderBy('id_interpretacion', 'DESC')->first();
        $solPago = new SolicitudPago();
        $solPago->id_interpretacion = $interpretacion->id_interpretacion;
        $solPago->save();

        return redirect()->route('interpretacion')->with('mensaje', 'Solicitud de interpretacion creada correctamente.');
    }
    public function postInterpretacion(Request $request)
    {
        $validated = $request->validate([
            'id_interpretacion' => 'required',
            'id_idioma' => 'required',
            'titulo_interpretacion' => 'required',
            'descripcion_interpretacion' => 'required',
        ]);

        $id_interpretacion = $request->input('id_interpretacion');

        $editarInterpretacion = Interpretacion::where('id_interpretacion', '=', $id_interpretacion)->first();
        $editarInterpretacion->id_idioma = $request->input('id_idioma');
        $editarInterpretacion->titulo_interpretacion = $request->input('titulo_interpretacion');
        $editarInterpretacion->descripcion_interpretacion = $request->input('descripcion_interpretacion');
        $editarInterpretacion->save();

        return redirect()->route('interpretacion')->with('mensaje', 'Solicitud de interpretacion actualizada correctamente.');
    }
}
