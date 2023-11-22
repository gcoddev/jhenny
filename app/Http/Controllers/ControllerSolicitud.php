<?php

namespace App\Http\Controllers;

use App\Models\Idioma;
use App\Models\Pago;
use App\Models\Solicitud;
use App\Models\SolicitudPago;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerSolicitud extends Controller
{
    public function index()
    {
        $pagos = Pago::where('estado_pago', '=', 'ACTIVO')->get();
        $traductores = User::where('status', '=', 'ACTIVO')->where('id_role', '=', 3)->get();

        if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2 || Auth::user()->id_role == 3 || Auth::user()->id_role == 4) {
            $solicitudes = Solicitud::where('estado_solicitud', '<>', 'ELIMINADO')->get();
        } elseif (Auth::user()->id_role == 5) {
            $solicitudes = Solicitud::where('estado_solicitud', '<>', 'ELIMINADO')->where('id', '=', Auth::user()->id)->get();
        }

        return view('layouts.traduccion.solicitudes', compact('solicitudes', 'pagos', 'traductores'));
    }
    public function getPago(Request $request)
    {
        dd($request);
    }
    public function post_estado_solicitud($id)
    {
        $editEstado = Solicitud::where('id_solicitud', '=', $id)->first();
        if ($editEstado->estado_solicitud == 'ACTIVO') {
            Solicitud::where('id_solicitud', '=', $id)->update(['estado_solicitud' => 'INACTIVO']);
        } else if ($editEstado->estado_solicitud == 'INACTIVO') {
            Solicitud::where('id_solicitud', '=', $id)->update(['estado_solicitud' => 'ACTIVO']);
        }

        return redirect()->route('solicitudes')->with('mensaje', 'Estado actualizado correctamente.');
    }
    public function nuevoSolicitud()
    {
        $idiomas = Idioma::where('estado_idioma', '=', 'ACTIVO')->get();
        return view('layouts.traduccion.nuevoSolicitud', compact('idiomas'));
    }
    public function editarSolicitud($id)
    {
        $idiomas = Idioma::where('estado_idioma', '=', 'ACTIVO')->get();
        $solicitud = Solicitud::where('id_solicitud', '=', $id)->first();

        return view('layouts.traduccion.editarSolicitud', compact('solicitud', 'idiomas'));
    }
    public function eliminarSolicitud($id)
    {
        Solicitud::where('id_solicitud', '=', $id)->update(['estado_solicitud' => 'ELIMINADO']);

        return redirect()->route('solicitudes')->with('mensaje', 'Solicitud eliminada correctamente.');
    }
    public function asignarSolicitud(Request $request, $id_solicitud)
    {
        $validated = $request->validate([
            'id_asignado' => 'required',
        ]);
        Solicitud::where('id_solicitud', '=', $id_solicitud)->update(['id_asignado' => $request->input('id_asignado')]);

        return redirect()->route('solicitudes')->with('mensaje', 'Solicitud asignada correctamente.');
    }
    public function asignarSolicitudTraductor(Request $request)
    {
        $validated = $request->validate([
            'id_asignado' => 'required',
            'id_solicitud' => 'required',
        ]);

        Solicitud::where('id_solicitud', '=', $request->input('id_solicitud'))->update(['id_asignado' => $request->input('id_asignado')]);

        return redirect()->route('solicitudes')->with('mensaje', 'Solicitud asignada correctamente.');
    }
    public function pagoComprobar(Request $request, $id_solicitud)
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

        SolicitudPago::where('id_solicitud', '=', $id_solicitud)->update(['id_pago' => $id_pago, 'comprobante_pago' => $name]);

        return redirect()->route('solicitudes')->with('mensaje', 'Comprobante pago enviado correctamente.');
    }
    public function post_nuevoSolicitud(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required',
            'id_idioma' => 'required',
            'titulo_solicitud' => 'required',
            'descripcion_solicitud' => 'required',
            'documento_solicitud' => 'required',
        ]);

        $nuevoSolicitud = new Solicitud;
        $nuevoSolicitud->id = $request->input('id');
        $nuevoSolicitud->id_idioma = $request->input('id_idioma');
        $nuevoSolicitud->titulo_solicitud = $request->input('titulo_solicitud');
        $nuevoSolicitud->descripcion_solicitud = $request->input('descripcion_solicitud');

        $file = $request->file('documento_solicitud');
        $name = time() . '.' . $file->extension();
        $file->storeAs('public/documentos', $name);

        $nuevoSolicitud->documento_solicitud = $name;
        $nuevoSolicitud->save();

        $solicitud = Solicitud::orderBy('id_solicitud', 'DESC')->first();
        $solPago = new SolicitudPago();
        $solPago->id_solicitud = $solicitud->id_solicitud;
        $solPago->save();

        return redirect()->route('solicitudes')->with('mensaje', 'Solicitud creada correctamente.');
    }
    public function postSolicitud(Request $request)
    {
        $id_solicitud = $request->input('id_solicitud');

        $validated = $request->validate([
            'id_solicitud' => 'required',
            'id_idioma' => 'required',
            'titulo_solicitud' => 'required',
            'descripcion_solicitud' => 'required',
        ]);

        $editarSolicitud = Solicitud::where('id_solicitud', '=', $id_solicitud)->first();
        $editarSolicitud->id_idioma = $request->input('id_idioma');
        $editarSolicitud->titulo_solicitud = $request->input('titulo_solicitud');
        $editarSolicitud->descripcion_solicitud = $request->input('descripcion_solicitud');

        if ($request->file('documento_solicitud')) {
            $file = $request->file('documento_solicitud');
            $name = time() . '.' . $file->extension();
            $file->storeAs('public/documentos', $name);

            $editarSolicitud->documento_solicitud = $name;
        }

        $editarSolicitud->save();

        return redirect()->route('solicitudes')->with('mensaje', 'Solicitud actualizada correctamente.');
    }
    public function descargarDocumento($id)
    {
        $sol = Solicitud::where('id_solicitud', '=', $id)->first();
        $pathToFile = storage_path('app/public/documentos/' . $sol->documento_solicitud);
        return response()->download($pathToFile);
    }
    public function descargarDocumentoFin($id)
    {
        $sol = Solicitud::where('id_solicitud', '=', $id)->first();
        $pathToFile = storage_path('app/public/documentos/' . $sol->documento_solicitud_fin);
        return response()->download($pathToFile);
    }
}
