<?php

use App\Http\Controllers\Autentication;
use App\Http\Controllers\ControllerAsignados;
use App\Http\Controllers\ControllerIdioma;
use App\Http\Controllers\ControllerInterpretacion;
use App\Http\Controllers\ControllerPago;
use App\Http\Controllers\ControllerReporte;
use App\Http\Controllers\ControllerSolicitud;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Usuario;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
// Ruta inicial
Route::get('/', [MainController::class, 'index'])->name('home');

// Registro de usuario
Route::get('#register', function () {
    return view('welcome');
})->name('register');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

// Inicio de sesión
Route::get('/login', function () {
    return view('pages.login');
})->middleware('usuario_no_autenticado')->name('login');

// Nuevo usuario invitado
Route::post('/usuariosN', [Usuario::class, 'post_nuevoUsuario'])->name('post_nuevoUsuario');
Route::post('/login', [Autentication::class, 'login'])->name('post_login');

// Verificar si esta iniciado sesión
Route::prefix('admin')->middleware('usuario_autenticado')->group(function () {
    Route::get('/', [Usuario::class, 'dashboard'])->name('admin');

    // Verificar si es Administrador o Coordinador
    Route::middleware('usuario_no_admin')->group(function () {
        // Rutas para administración de usuarios
        Route::get('/usuarios', [Usuario::class, 'usuarios'])->name('usuarios');
        Route::get('/usuarios/{id}', [Usuario::class, 'editarUsuario'])->name('editarUsuario');
        Route::delete('/usuarios/{id}', [Usuario::class, 'eliminarUsuario'])->name('eliminarUsuario');
        Route::post('/usuariosE', [Usuario::class, 'postUsuario'])->name('postUsuario');
        Route::post('/usuarios/{id}', [Usuario::class, 'post_status'])->name('post_status');
        Route::get('/nuevoUsuario', [Usuario::class, 'nuevoUsuario'])->name('nuevoUsuario');

        // Rutas para administración de idiomas
        Route::get('/idiomas', [ControllerIdioma::class, 'index'])->name('idiomas');
        Route::get('/idiomas/{id}', [ControllerIdioma::class, 'editarIdioma'])->name('editarIdioma');
        Route::delete('/idiomas/{id}', [ControllerIdioma::class, 'eliminarIdioma'])->name('eliminarIdioma');
        Route::post('/idiomas/{id}', [ControllerIdioma::class, 'post_estado_idioma'])->name('post_estado_idioma');
        Route::post('/idiomasE', [ControllerIdioma::class, 'postIdioma'])->name('postIdioma');
        Route::get('/nuevoIdioma', [ControllerIdioma::class, 'nuevoIdioma'])->name('nuevoIdioma');
        Route::post('/idiomasN', [ControllerIdioma::class, 'post_nuevoIdioma'])->name('post_nuevoIdioma');

        // Rutas para administración de métodos de pago
        Route::get('/pagos', [ControllerPago::class, 'index'])->name('pagos');
        Route::get('/pagos/{id}', [ControllerPago::class, 'editarPago'])->name('editarPago');
        Route::delete('/pagos/{id}', [ControllerPago::class, 'eliminarPago'])->name('eliminarPago');
        Route::post('/pagos/{id}', [ControllerPago::class, 'post_estado_pago'])->name('post_estado_pago');
        Route::post('/pagosE', [ControllerPago::class, 'postPago'])->name('postPago');
        Route::get('/nuevoPago', [ControllerPago::class, 'nuevoPago'])->name('nuevoPago');
        Route::post('/pagosN', [ControllerPago::class, 'post_nuevoPago'])->name('post_nuevoPago');

        // Rutas de asignación de traductores y/o interpretes
        Route::post('/asignar/{id}', [ControllerSolicitud::class, 'asignarSolicitud'])->name('asignarSolicitud');
        Route::post('/asignarST', [ControllerSolicitud::class, 'asignarSolicitudTraductor'])->name('asignarSolicitudTraductor');
    });

    // Verificar si es traductor o interprete
    Route::middleware('usuario_no_ti')->group(function () {
        Route::get('/reportes', [ControllerReporte::class, 'index'])->name('reportes');
        Route::get('/reportesI', [ControllerReporte::class, 'interpretacion'])->name('reportesI');
        Route::get('/pdf/{id_idioma}/{tipo}', [ControllerReporte::class, 'generarPDF'])->name('generarPDF');
    });

    // Verificar si es traductor
    Route::middleware('usuario_no_traductor')->group(function () {
        Route::get('/asignados', [ControllerAsignados::class, 'index'])->name('asignados');
        Route::post('/entrega/{id}', [ControllerAsignados::class, 'validarPago'])->name('validarPago');

        // Rutas de subida de documentos
        Route::get('/asignados/{id}', [ControllerAsignados::class, 'enviarTraduccion'])->name('enviarTraduccion');
        Route::post('/entrega', [ControllerAsignados::class, 'postEntrega'])->name('postEntrega');
    });

    // Verificar si es interprete
    Route::middleware('usuario_no_interprete')->group(function () {
        Route::get('/asignadosI', [ControllerAsignados::class, 'interpretacion'])->name('asignadosI');
        Route::post('/entregaI/{id}', [ControllerAsignados::class, 'validarPagoI'])->name('validarPagoI');
    });

    // Rutas de Solicitudes de Traducción
    Route::get('/solicitudes', [ControllerSolicitud::class, 'index'])->name('solicitudes');
    Route::get('/solicitudes/{id}', [ControllerSolicitud::class, 'editarSolicitud'])->name('editarSolicitud');
    Route::delete('/solicitudes/{id}', [ControllerSolicitud::class, 'eliminarSolicitud'])->name('eliminarSolicitud');
    Route::post('/solicitudes/{id}', [ControllerSolicitud::class, 'post_estado_solicitud'])->name('post_estado_solicitud');
    Route::post('/solicitudesE', [ControllerSolicitud::class, 'postSolicitud'])->name('postSolicitud');
    Route::get('/nuevoSolicitud', [ControllerSolicitud::class, 'nuevoSolicitud'])->name('nuevoSolicitud');
    Route::post('/solicitudesN', [ControllerSolicitud::class, 'post_nuevoSolicitud'])->name('post_nuevoSolicitud');
    Route::get('/documento/{id}', [ControllerSolicitud::class, 'descargarDocumento'])->name('descargarDocumento');
    Route::get('/documentoFin/{id}', [ControllerSolicitud::class, 'descargarDocumentoFin'])->name('descargarDocumentoFin');

    //Rutas de Solicitud de Interpretación
    Route::get('/interpretacion', [ControllerInterpretacion::class, 'index'])->name('interpretacion');
    Route::get('/interpretacion/{id}', [ControllerInterpretacion::class, 'editarInterpretacion'])->name('editarInterpretacion');
    Route::delete('/interpretacion/{id}', [ControllerInterpretacion::class, 'eliminarInterpretacion'])->name('eliminarInterpretacion');
    Route::post('/asignarI/{id}', [ControllerInterpretacion::class, 'asignarInterprete'])->name('asignarInterprete');
    Route::post('/interpretacion/{id}', [ControllerInterpretacion::class, 'post_estado_interpretacion'])->name('post_estado_interpretacion');
    Route::post('/interpretacionE', [ControllerInterpretacion::class, 'postInterpretacion'])->name('postInterpretacion');
    Route::get('/nuevoInterpretacion', [ControllerInterpretacion::class, 'nuevoInterpretacion'])->name('nuevoInterpretacion');
    Route::post('/interpretacionN', [ControllerInterpretacion::class, 'post_nuevoInterpretacion'])->name('post_nuevoInterpretacion');

    // Rutas de Validacion de pago de usuarios
    Route::post('/pagoC/{id}', [ControllerSolicitud::class, 'pagoComprobar'])->name('pagoComprobar');
    Route::post('/pagoCI/{id}', [ControllerInterpretacion::class, 'pagoComprobar'])->name('pagoComprobarI');

    // Route::get('/roles', [Usuario::class, 'roles'])->name('roles');
    // Route::post('/roles/{id}', [Usuario::class, 'post_status_rol'])->name('post_status_rol');

    // Cerrar sesión
    Route::post('/logout', [Autentication::class, 'logout'])->name('post_logout');
});
