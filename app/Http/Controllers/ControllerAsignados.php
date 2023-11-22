<?php

namespace App\Http\Controllers;

use App\Models\Idioma;
use App\Models\Interpretacion;
use App\Models\Solicitud;
use App\Models\SolicitudPago;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerAsignados extends Controller
{
    public function index()
    {
        if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2) {
            $solicitudes = Solicitud::join('solicitud_pagos as sp', 'sp.id_solicitud', '=', 'solicituds.id_solicitud')->where('solicituds.estado_solicitud', '<>', 'ELIMINADO')->where('solicituds.id_asignado', '<>', 'null')->get();
        } else {
            $solicitudes = Solicitud::join('solicitud_pagos as sp', 'sp.id_solicitud', '=', 'solicituds.id_solicitud')->where('solicituds.estado_solicitud', '<>', 'ELIMINADO')->where('solicituds.id_asignado', '=', Auth::user()->id)->get();
        }

        $solicitudesAll = Solicitud::where('id_asignado', '=', null)->where('estado_solicitud', '<>', 'ELIMINADO')->get();
        $traductores = User::where('status', '=', 'ACTIVO')->where('id_role', '=', 3)->get();

        return view('layouts.traduccion.asignados', compact('solicitudes', 'traductores', 'solicitudesAll'));
    }
    public function interpretacion()
    {
        if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2) {
            $interpretaciones = Interpretacion::join('solicitud_pagos as sp', 'sp.id_interpretacion', '=', 'interpretacions.id_interpretacion')->where('interpretacions.estado_interpretacion', '<>', 'ELIMINADO')->where('interpretacions.id_asignado', '<>', 'null')->get();
        } else {
            $interpretaciones = Interpretacion::join('solicitud_pagos as sp', 'sp.id_interpretacion', '=', 'interpretacions.id_interpretacion')->where('interpretacions.estado_interpretacion', '<>', 'ELIMINADO')->where('interpretacions.id_asignado', '=', Auth::user()->id)->get();
        }

        $interpretacionesAll = Interpretacion::where('id_asignado', '=', null)->where('estado_interpretacion', '<>', 'ELIMINADO')->get();
        $interpretes = User::where('status', '=', 'ACTIVO')->where('id_role', '=', 4)->get();

        return view('layouts.interpretacion.asignadosI', compact('interpretaciones', 'interpretes', 'interpretacionesAll'));
    }
    public function enviarTraduccion($id)
    {
        $idiomas = Idioma::where('estado_idioma', '=', 'ACTIVO')->get();
        $solicitud = Solicitud::where('id_solicitud', '=', $id)->first();

        return view('layouts.traduccion.enviarTraduccion', compact('solicitud', 'idiomas'));
    }
    public function validarPago(Request $request, $id)
    {
        $id_solicitud = $request->input('id_solicitud');
        $id_pago = $request->input('id_pago');
        // Solicitud::where('id_solicitud', '=', $id_solicitud)->update(['estado_solicitud' => 'ENTREGADO']);
        SolicitudPago::where('id_solicitud_pagos', '=', $id)->where('id_solicitud', '=', $id_solicitud)->where('id_pago', '=', $id_pago)->update(['estado' => 'PAGADO']);

        return redirect()->route('asignados')->with('mensaje', 'Pago validado correctamente.');
    }
    public function validarPagoI(Request $request, $id)
    {
        $id_interpretacion = $request->input('id_interpretacion');
        $id_pago = $request->input('id_pago');
        // Interpretacion::where('id_interpretacion', '=', $id_interpretacion)->update(['estado_solicitud' => 'INTERPRETADO']);
        SolicitudPago::where('id_solicitud_pagos', '=', $id)->where('id_interpretacion', '=', $id_interpretacion)->where('id_pago', '=', $id_pago)->update(['estado' => 'PAGADO']);

        return redirect()->route('asignadosI')->with('mensaje', 'Pago validado correctamente.');
    }
    public function postEntrega(Request $request)
    {
        $id_solicitud = $request->input('id_solicitud');

        $validated = $request->validate([
            'id_solicitud' => 'required',
            'descripcion_solicitud_fin' => 'required',
            'documento_solicitud_fin' => 'required',
        ]);

        $descripcion_solicitud_fin = $request->input('descripcion_solicitud_fin');
        $file = $request->file('documento_solicitud_fin');
        $name = time() . '.' . $file->extension();
        $file->storeAs('public/documentos', $name);
        $documento_solicitud_fin = $name;

        Solicitud::where('id_solicitud', '=', $id_solicitud)->update(['descripcion_solicitud_fin' => $descripcion_solicitud_fin, 'documento_solicitud_fin' => $name, 'estado_solicitud' => 'ENTREGADO']);

        return redirect()->route('solicitudes')->with('mensaje', 'Traduccion entregada correctamente.');
    }
}
