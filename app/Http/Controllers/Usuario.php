<?php

namespace App\Http\Controllers;

use App\Models\Interpretacion;
use App\Models\Role;
use App\Models\Solicitud;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Usuario extends Controller
{
    public function dashboard()
    {
        $solicitudes = Solicitud::all();
        $interpretaciones = Interpretacion::all();
        return view('layouts.home', compact('solicitudes', 'interpretaciones'));
    }

    public function usuarios()
    {
        $usuarios = User::join('roles', 'users.id_role', '=', 'roles.id_role')
            ->where('users.status', '<>', 'ELIMINADO')
            ->get();
        return view('layouts.admin.usuarios', compact('usuarios'));
    }
    public function editarUsuario(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::where('estado_rol', '<>', 'ELIMINAR')->get();

        return view('layouts.admin.editarUsuario', compact('user', 'roles'));
    }
    public function postUsuario(Request $request)
    {
        $id = $request->input('id');
        $editUser = User::findOrFail($id);

        $validated = $request->validate([
            'ci' => 'required',
            'expedido' => 'required',
            'paterno' => 'required',
            'materno' => 'required',
            'nombres' => 'required',
            'fecha_nacimiento' => 'required',
            'estado_civil' => 'required',
            'profesion' => 'required',
            'email' => 'required',
            'username' => 'required',
            'id_role' => 'required',
        ]);
        $editUser->ci = $request->input('ci');
        $editUser->expedido = $request->input('expedido');
        $editUser->materno = $request->input('materno');
        $editUser->paterno = $request->input('paterno');
        $editUser->nombres = $request->input('nombres');
        $editUser->fecha_nacimiento = $request->input('fecha_nacimiento');
        $editUser->estado_civil = $request->input('estado_civil');
        $editUser->profesion = $request->input('profesion');
        $editUser->email = $request->input('email');
        $editUser->username = $request->input('username');
        $editUser->id_role = $request->input('id_role');

        $password = $request->input('password');
        $confirmar_password = $request->input('confirmar_password');
        if ($password != '') {
            $validated = $request->validate([
                'password' => 'min:8',
                'confirmar_password' => 'required|min:8|same:password',
            ]);
            $editUser->password = bcrypt($password);
        }

        if ($request->file('imagen_perfil')) {
            $file = $request->file('imagen_perfil');
            $name = time() . '.' . $file->extension();
            // dd($name);
            $file->storeAs('public/perfil', $name);
            $editUser->imagen_perfil = $name;
        }
        $editUser->save();

        // Alert::alert('title', 'efw', 'success');

        return redirect()->route('admin')->with('mensaje', 'Usuario actualizado correctamente.');
    }
    public function nuevoUsuario()
    {
        $roles = Role::where('estado_rol', '<>', 'ELIMINAR')->get();
        return view('layouts.admin.nuevoUsuario', compact('roles'));
    }
    public function post_nuevoUsuario(Request $request)
    {
        $validated = $request->validate([
            'ci' => 'required|unique:users|max:10',
            'expedido' => 'required|max:3',
            'paterno' => 'required|alpha',
            'materno' => 'required|alpha',
            'nombres' => 'required|regex:/^[\pL\s\-]+$/u',
            'fecha_nacimiento' => 'required|date',
            'estado_civil' => 'required',
            'profesion' => 'required|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|email',
            'celular' => 'required|numeric|min:7',
            'username' => 'required|alpha|min:4|unique:users',
            'password' => 'required|min:8',
            'confirmar_password' => 'required|min:8|same:password',
        ]);

        $nuevoUser = new User;
        $nuevoUser->ci = $request->input('ci');
        $nuevoUser->expedido = $request->input('expedido');
        $nuevoUser->paterno = $request->input('paterno');
        $nuevoUser->materno = $request->input('materno');
        $nuevoUser->nombres = $request->input('nombres');
        $nuevoUser->fecha_nacimiento = $request->input('fecha_nacimiento');
        $nuevoUser->estado_civil = $request->input('estado_civil');
        $nuevoUser->profesion = $request->input('profesion');
        $nuevoUser->email = $request->input('email');
        $nuevoUser->celular = $request->input('celular');
        $nuevoUser->username = $request->input('username');
        $nuevoUser->id_role = 5;
        $nuevoUser->password = bcrypt($request->input('password'));
        $nuevoUser->save();

        if (Auth::check()) {
            if (Auth::user()->id_role != 5) {
                return redirect()->route('usuarios')->with('mensaje', 'Usuario creado correctamente.');
            } else {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->route('login')->with('mensaje', 'Usuario creado correctamente.');
            }
        } else {
            return redirect()->route('login')->with('mensaje', 'Usuario creado correctamente.');
        }
    }

    public function roles()
    {
        $roles = Role::outher('users', 'users.id_role', '=', 'roles.id_role')
            ->where('estado_rol', '<>', 'ELIMINADO')
            ->select('roles.*', DB::raw('count(users.id_role) as usuarios'))
            ->groupBy('roles.id_role')
            ->get();
        return view('layouts.admin.roles', compact('roles'));
    }

    public function post_status(Request $request, $id)
    {
        $editarEstado = User::find($id);
        if ($request->input('status') == 'ACTIVO') {
            $editarEstado->status = 'INACTIVO';
        } else if ($request->input('status') == 'INACTIVO') {
            $editarEstado->status = 'ACTIVO';
        }
        $editarEstado->save();

        return redirect()->route('usuarios');
    }

    public function post_status_rol(Request $request, $id)
    {
        $editarEstado = Role::find($id);
        if ($request->input('estado_rol') == 'ACTIVO') {
            $editarEstado->estado_rol = 'INACTIVO';
        } else if ($request->input('estado_rol') == 'INACTIVO') {
            $editarEstado->estado_rol = 'ACTIVO';
        }
        $editarEstado->save();

        return redirect()->route('roles');
    }
    public function eliminarUsuario($id)
    {
        $userEliminar = User::findOrFail($id);
        $userEliminar->status = 'ELIMINADO';
        $userEliminar->save();

        return redirect()->route('admin')->with('mensaje', 'Usuario eliminado correctamente.');
    }
}
