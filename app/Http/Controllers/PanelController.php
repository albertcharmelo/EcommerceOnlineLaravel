<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index()
    {

        return view('panel.dashboard.tienda.index');
    }

    public function usuarios()
    {
        $usuarios = User::all();
        return view('panel.dashboard.usuarios.index')->with(compact('usuarios'));
    }

    public static function usuariosMayorisa($usuario){

        $usuario = User::find($usuario);
        if ( $usuario->rol_id == 2) {
            $usuario->rol_id = 3;
            $usuario->save();
        }else {
            $usuario->rol_id = 2;
            $usuario->save();
        }
        $usuarios = User::all();
        
        return redirect('/panel/dashboard/usuarios')->with('status', "El cliente $usuario->name $usuario->lname ahora es mayorista ");
       


    }

    public function blog()
    {
        
        return view('panel.dashboard.blog.index');
    }



    public static function getUsuarios()
    {
        $usuarios = User::all();
        return $usuarios;
    }
}
