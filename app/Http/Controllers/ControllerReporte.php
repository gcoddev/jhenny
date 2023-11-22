<?php

namespace App\Http\Controllers;

use App\Models\Idioma;
use App\Models\Interpretacion;
use App\Models\Solicitud;
use App\Models\User;
use Codedge\Fpdf\Fpdf\Fpdf;

class ControllerReporte extends Controller
{
    public function index()
    {
        $idiomas = Idioma::where('estado_idioma', '<>', 'ELIMINADO')->get();
        return view('layouts.reportes', compact('idiomas'));
    }
    public function interpretacion()
    {
        $idiomas = Idioma::where('estado_idioma', '<>', 'ELIMINADO')->get();
        return view('layouts.reportesI', compact('idiomas'));
    }
    public function generarPDF($id_idioma = 0, $tipo = 'T')
    {
        $pdf = new Fpdf();
        $pdf->AddFont('EdwardianScriptITC', '', "EdwardianScriptITC.php");
        $pdf->Addpage();
        $pdf->Image(public_path() . '/logo-upea.png', 10, 8, 25, 25);
        $pdf->Image(public_path() . '/logo.jpeg', 176, 7, 25, 25);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('EdwardianScriptITC', '', 38);
        $pdf->Cell(0, 5, utf8_decode('Universidad Pública de El Alto'), 0, 1, 'C');
        $pdf->SetFont('Arial', 'I', 6);
        $pdf->Cell(0, 9, 'Creada por Ley 2115 del 5 de Septiembre de 2000 y ' . utf8_decode('Autónoma') . ' por Ley 2556 del 12 de Noviembre de 2003', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 2, utf8_decode('LINGUISTICA E IDIOMAS'), 0, 1, 'C');
        $pdf->Cell(0, 10, utf8_decode('REPORTE DE TRADUCCIONES'), 0, 1, 'C');

        $pdf->SetFont('Helvetica', 'BI', 14);
        $pdf->SetXY(30, 40);

        if ($id_idioma != 0) {
            $idioma = $this->getIdioma($id_idioma);
            if ($tipo == 'I') {
                $pdf->Cell(150, 5, utf8_decode('INTERPRETACIONES "IDIOMA ' . $idioma->nombre_idioma . '"'), 0, 0, 'C');
            } else {
                $pdf->Cell(150, 5, utf8_decode('TRADUCCIONES "IDIOMA ' . $idioma->nombre_idioma . '"'), 0, 0, 'C');
            }
        } else {
            if ($tipo == 'I') {
                $pdf->Cell(150, 5, utf8_decode('INTERPRETACIONES "TODOS LOS IDIOMAS"'), 0, 0, 'C');
            } else {
                $pdf->Cell(150, 5, utf8_decode('TRADUCCIONES "TODOS LOS IDIOMAS"'), 0, 0, 'C');
            }
        }

        $bordeCelda = 1;
        $tam = 5;
        $alturaTabla = 50;
        $pdf->SetFont('Arial', 'B', 6);
        $pdf->SetXY(10, $alturaTabla);
        $pdf->Cell(5, $tam, utf8_decode('N°'), $bordeCelda, 0, 'C');
        $pdf->Cell(30, $tam, utf8_decode('TITULO'), $bordeCelda, 0, 'C');
        $pdf->Cell(45, $tam, utf8_decode('DESCRIPCION'), $bordeCelda, 0, 'C');
        $pdf->Cell(35, $tam, utf8_decode('SOLICITANTE'), $bordeCelda, 0, 'C');
        if ($tipo == 'I') {
            $pdf->Cell(35, $tam, utf8_decode('INTERPRETE'), $bordeCelda, 0, 'C');
        } else {
            $pdf->Cell(35, $tam, utf8_decode('TRADUCTOR'), $bordeCelda, 0, 'C');
        }
        $pdf->Cell(20, $tam, utf8_decode('IDIOMA'), $bordeCelda, 0, 'C');
        $pdf->Cell(20, $tam, utf8_decode('OBSERVACION'), $bordeCelda, 0, 'C');

        $alturaTabla += $tam;
        $i = 1;
        $sinAsignar = 0;
        $pendientes = 0;
        $entregados = 0;

        $pdf->SetFont('Arial', '', 6);
        if ($tipo == 'I') {
            $reporte = $this->getReporteSQLI($id_idioma);
        } else {
            $reporte = $this->getReporteSQL($id_idioma);
        }
        $total = count($reporte);
        if ($total > 0) {
            $corte = 44;
            foreach ($reporte as $r) {
                $pdf->SetXY(10, $alturaTabla);

                $pdf->Cell(5, $tam, utf8_decode($i), $bordeCelda, 0, 'L');
                if ($tipo == 'I') {
                    $pdf->Cell(30, $tam, utf8_decode($r->titulo_interpretacion), $bordeCelda, 0, 'L');
                    $pdf->Cell(45, $tam, utf8_decode($r->descripcion_interpretacion), $bordeCelda, 0, 'L');
                } else {
                    $pdf->Cell(30, $tam, utf8_decode($r->titulo_solicitud), $bordeCelda, 0, 'L');
                    $pdf->Cell(45, $tam, utf8_decode($r->descripcion_solicitud), $bordeCelda, 0, 'L');
                }
                $pdf->Cell(35, $tam, utf8_decode($r->paterno . ' ' . $r->materno . ' ' . $r->nombres), $bordeCelda, 0, 'L');
                if ($r->id_asignado) {
                    $asignado = $this->getUser($r->id_asignado);
                    $pdf->Cell(35, $tam, utf8_decode($asignado->paterno . ' ' . $asignado->materno . ' ' . $asignado->nombres), $bordeCelda, 0, 'L');
                } else {
                    $pdf->Cell(35, $tam, utf8_decode('-'), $bordeCelda, 0, 'C');
                }
                $pdf->Cell(20, $tam, utf8_decode($r->nombre_idioma), $bordeCelda, 0, 'C');
                if ($tipo == 'I') {
                    if ($r->estado_interpretacion == 'ACTIVO' || $r->estado_interpretacion == 'INACTIVO') {
                        if ($r->id_asignado != null) {
                            $pdf->Cell(20, $tam, utf8_decode('PENDIENTE'), $bordeCelda, 0, 'C');
                            $pendientes++;
                        } else {
                            $pdf->Cell(20, $tam, utf8_decode('SIN ASIGNAR'), $bordeCelda, 0, 'C');
                            $sinAsignar++;
                        }
                    } else {
                        $pdf->Cell(20, $tam, utf8_decode($r->estado_solicitud), $bordeCelda, 0, 'C');
                        $entregados++;
                    }
                } else {
                    if ($r->estado_solicitud == 'ACTIVO' || $r->estado_solicitud == 'INACTIVO') {
                        if ($r->id_asignado != null) {
                            $pdf->Cell(20, $tam, utf8_decode('PENDIENTE'), $bordeCelda, 0, 'C');
                            $pendientes++;
                        } else {
                            $pdf->Cell(20, $tam, utf8_decode('SIN ASIGNAR'), $bordeCelda, 0, 'C');
                            $sinAsignar++;
                        }
                    } else {
                        $pdf->Cell(20, $tam, utf8_decode($r->estado_solicitud), $bordeCelda, 0, 'C');
                        $entregados++;
                    }
                }

                $alturaTabla += $tam;

                if ($i == $corte) {
                    $pdf->AddPage();
                    $alturaTabla = 20;
                    $corte = $corte + 51;
                }

                $i++;
            }
        } else {
            $pdf->SetXY(10, $alturaTabla);
            $pdf->SetFont('Arial', 'B', 6);
            if ($tipo == 'I') {
                $pdf->Cell(190, $tam, utf8_decode('SIN INTERPRETACIONES'), $bordeCelda, 0, 'C');
            } else {
                $pdf->Cell(190, $tam, utf8_decode('SIN TRADUCCIONES'), $bordeCelda, 0, 'C');
            }
            $alturaTabla += $tam;
        }

        $alturaTabla = $alturaTabla + 3;
        $meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
        $dia = date("j");
        $mes = date("n");
        $anio = date("Y");
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetXY(3, $alturaTabla);
        $pdf->Cell(60, 5, utf8_decode('El Alto, ' . $dia . ' de ' . $meses[$mes - 1] . ' de ' . $anio), 0, 0, 'C');

        $pdf->Addpage();
        $alturaTabla = 45;
        $pdf->Image(public_path() . '/logo-upea.png', 10, 8, 25, 25);
        $pdf->Image(public_path() . '/logo.jpeg', 176, 7, 25, 25);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('EdwardianScriptITC', '', 38);
        $pdf->Cell(0, 5, utf8_decode('Universidad Pública de El Alto'), 0, 1, 'C');
        $pdf->SetFont('Arial', 'I', 6);
        $pdf->Cell(0, 9, 'Creada por Ley 2115 del 5 de Septiembre de 2000 y ' . utf8_decode('Autónoma') . ' por Ley 2556 del 12 de Noviembre de 2003', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 2, utf8_decode('LINGUISTICA E IDIOMAS'), 0, 1, 'C');
        if ($tipo == 'I') {
            $pdf->Cell(0, 10, utf8_decode('REPORTE DE INTERPRETACIONES'), 0, 1, 'C');
        } else {
            $pdf->Cell(0, 10, utf8_decode('REPORTE DE TRADUCCIONES'), 0, 1, 'C');
        }

        $pdf->SetFont('Helvetica', 'BI', 14);

        $pdf->SetXY(30, 40);
        $pdf->Cell(150, 5, utf8_decode('INFORMACION GENERAL'), 0, 0, 'C');

        $pdf->SetFont('ARIAL', 'B', 12);
        if ($total > 0) {
            $pdf->SetXY(72, $alturaTabla + 5);
            $pdf->Cell(40, $tam, utf8_decode('TOTALES'), 1, 0, 'C');
            $pdf->Cell(10, $tam, utf8_decode('N°'), 1, 0, 'C');
            $pdf->Cell(15, $tam, utf8_decode('%'), 1, 0, 'C');

            $pdf->SetFont('Arial', '', 7);
            $pdf->SetXY(72, $alturaTabla + 10);
            $pdf->Cell(40, $tam, utf8_decode('SIN ASIGNAR'), 1, 0, 'L');
            $pdf->Cell(10, $tam, utf8_decode($sinAsignar), 1, 0, 'C');
            $pdf->Cell(15, $tam, utf8_decode(number_format(($sinAsignar * 100) / $total, 2) . '%'), 1, 0, 'C');

            $pdf->SetXY(72, $alturaTabla + 15);
            $pdf->Cell(40, $tam, utf8_decode('PENDIENTES'), 1, 0, 'L');
            $pdf->Cell(10, $tam, utf8_decode($pendientes), 1, 0, 'C');
            $pdf->Cell(15, $tam, utf8_decode(number_format(($pendientes * 100) / $total, 2) . '%'), 1, 0, 'C');

            $pdf->SetXY(72, $alturaTabla + 20);
            $pdf->Cell(40, $tam, utf8_decode('ENTREGADOS'), 1, 0, 'L');
            $pdf->Cell(10, $tam, utf8_decode($entregados), 1, 0, 'C');
            $pdf->Cell(15, $tam, utf8_decode(number_format(($entregados * 100) / $total, 2) . '%'), 1, 0, 'C');

            $pdf->SetFont('Arial', 'B', 7);
            $pdf->SetXY(72, $alturaTabla + 25);
            $pdf->Cell(40, $tam, utf8_decode('TOTAL'), 1, 0, 'C');
            $pdf->Cell(10, $tam, utf8_decode($total), 1, 0, 'C');
            $pdf->Cell(15, $tam, utf8_decode(($total * 100) / $total . '%'), 1, 0, 'C');
        }
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetXY(75, 77);
        $pdf->Cell(60, 5, utf8_decode('El Alto, ' . $dia . ' de ' . $meses[$mes - 1] . ' de ' . $anio), 0, 0, 'C');

        $pdf->Output('I', 'Reporte.pdf');
        exit();
    }
    public function getReporteSQL($id)
    {
        if ($id != 0) {
            return Solicitud::join('idiomas', 'solicituds.id_idioma', '=', 'idiomas.id_idioma')
                ->join('users', 'users.id', '=', 'solicituds.id')
                ->where('solicituds.id_idioma', '=', $id)
                ->where('solicituds.estado_solicitud', '<>', 'ELIMINADO')
                ->get();
        } else {
            return Solicitud::join('idiomas', 'solicituds.id_idioma', '=', 'idiomas.id_idioma')
                ->join('users', 'users.id', '=', 'solicituds.id')
                ->where('solicituds.estado_solicitud', '<>', 'ELIMINADO')
                ->get();
        }
    }
    public function getReporteSQLI($id)
    {
        if ($id != 0) {
            return Interpretacion::join('idiomas', 'interpretacions.id_idioma', '=', 'idiomas.id_idioma')
                ->join('users', 'users.id', '=', 'interpretacions.id')
                ->where('interpretacions.id_idioma', '=', $id)
                ->where('interpretacions.estado_interpretacion', '<>', 'ELIMINADO')
                ->get();
        } else {
            return Interpretacion::join('idiomas', 'interpretacions.id_idioma', '=', 'idiomas.id_idioma')
                ->join('users', 'users.id', '=', 'interpretacions.id')
                ->where('interpretacions.estado_interpretacion', '<>', 'ELIMINADO')
                ->get();
        }
    }
    public function getUser($id)
    {
        return User::findOrFail($id);
    }
    public function getIdioma($id)
    {
        return Idioma::findOrFail($id);
    }
}
