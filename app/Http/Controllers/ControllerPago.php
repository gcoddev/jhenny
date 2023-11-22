<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use Illuminate\Http\Request;

class ControllerPago extends Controller
{
    public function index()
    {
        $pagos = Pago::where('estado_pago', '<>', 'ELIMINADO')->get();

        return view('layouts.pago.pagos', compact('pagos'));
    }
    public function editarPago($id)
    {
        $pago = Pago::where('id_pago', '=', $id)->first();

        return view('layouts.pago.editarPago', compact('pago'));
    }
    public function post_estado_pago($id_pago)
    {
        $editEstado = Pago::where('id_pago', '=', $id_pago)->first();
        if ($editEstado->estado_pago == 'ACTIVO') {
            Pago::where('id_pago', '=', $id_pago)->update(['estado_pago' => 'INACTIVO']);
        } else if ($editEstado->estado_pago == 'INACTIVO') {
            Pago::where('id_pago', '=', $id_pago)->update(['estado_pago' => 'ACTIVO']);
        }

        return redirect()->route('pagos');
    }
    public function postPago(Request $request)
    {
        $id_pago = $request->input('id_pago');
        $validated = $request->validate([
            'nombre_pago' => 'required',
            'tipo_pago' => 'required',
            'descripcion_pago' => 'required',
        ]);
        $editarPago = Pago::where('id_pago', '=', $id_pago)->first();
        $nombre_pago = $request->input('nombre_pago');
        $tipo_pago = $request->input('tipo_pago');
        $descripcion_pago = $request->input('descripcion_pago');
        $tipo = $request->input('tipo_pago');
        switch ($tipo) {
            case 'DEPOSITO':
                $validated = $request->validate([
                    'info_numero_pago' => 'required',
                    'numero_pago' => 'required',
                ]);
                $info_numero_pago = $request->input('info_numero_pago');
                $numero_pago = $request->input('numero_pago');

                Pago::where('id_pago', '=', $id_pago)->update(['nombre_pago' => $nombre_pago, 'tipo_pago' => $tipo_pago, 'descripcion_pago' => $descripcion_pago, 'info_numero_pago' => $info_numero_pago, 'numero_pago' => $numero_pago, 'qr_imagen_pago' => null]);
                break;
            case 'TRANSFERENCIA':
                if ($editarPago->qr_imagen_pago) {
                    if ($request->file('qr_imagen_pago')) {
                        $file = $request->file('qr_imagen_pago');
                        $name = time() . '.' . $file->extension();
                        $file->storeAs('public/qr', $name);
                    }
                    $qr_imagen_pago = $name;
                } else {
                    $validated = $request->validate([
                        'qr_imagen_pago' => 'required',
                    ]);
                    $file = $request->file('qr_imagen_pago');
                    $name = time() . '.' . $file->extension();
                    $file->storeAs('public/qr', $name);
                    $qr_imagen_pago = $name;
                }
                Pago::where('id_pago', '=', $id_pago)->update(['nombre_pago' => $nombre_pago, 'tipo_pago' => $tipo_pago, 'descripcion_pago' => $descripcion_pago, 'info_numero_pago' => null, 'numero_pago' => null, 'qr_imagen_pago' => $qr_imagen_pago]);
                break;
            default:
                Pago::where('id_pago', '=', $id_pago)->update(['nombre_pago' => $nombre_pago, 'tipo_pago' => $tipo_pago, 'descripcion_pago' => $descripcion_pago, 'info_numero_pago' => null, 'numero_pago' => null, 'qr_imagen_pago' => null]);
                break;
        }

        return redirect()->route('pagos')->with('mensaje', 'Metodo de pago actualizada correctamente.');
    }
    public function eliminarPago($id_pago)
    {
        Pago::where('id_pago', '=', $id_pago)->update(['estado_pago' => 'ELIMINADO']);

        return redirect()->route('pagos')->with('mensaje', 'Pago eliminado correctamente.');
    }
    public function nuevoPago()
    {
        return view('layouts.pago.nuevoPago');
    }
    public function post_nuevoPago(Request $request)
    {
        $validated = $request->validate([
            'nombre_pago' => 'required',
            'tipo_pago' => 'required',
            'descripcion_pago' => 'required',
        ]);
        $nuevoPago = new Pago;
        $nuevoPago->nombre_pago = $request->input('nombre_pago');
        $nuevoPago->tipo_pago = $request->input('tipo_pago');
        $nuevoPago->descripcion_pago = $request->input('descripcion_pago');
        $tipo = $request->input('tipo_pago');
        switch ($tipo) {
            case 'DEPOSITO':
                $validated = $request->validate([
                    'info_numero_pago' => 'required',
                    'numero_pago' => 'required',
                ]);
                $nuevoPago->info_numero_pago = $request->input('info_numero_pago');
                $nuevoPago->numero_pago = $request->input('numero_pago');
                break;
            case 'TRANSFERENCIA':
                $validated = $request->validate([
                    'qr_imagen_pago' => 'required',
                ]);
                $file = $request->file('qr_imagen_pago');
                $name = time() . '.' . $file->extension();
                // dd($name);
                $file->storeAs('public/qr', $name);
                $nuevoPago->qr_imagen_pago = $name;
                break;
        }

        $nuevoPago->save();

        return redirect()->route('pagos')->with('mensaje', 'Metodo de pago creado correctamente.');
    }
}
