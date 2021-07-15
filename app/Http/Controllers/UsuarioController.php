<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Mockery\Undefined;

class UsuarioController extends Controller
{
    public function index()
    {

        return view('panel.administracion.usuario.create');
    }

    public static function list()
    {
        $usuarios = User::where('tipo', '=', 1)->get();
        return $usuarios;
    }

    public function changeTipoUser(Request $request)
    {

        $usuario = User::where('email', '=', $request->email)->get()->first();
        if ($usuario == null || !isset($usuario)) {
            return false;
        } else {

            $usuario->tipo = 1;
            $usuario->save();
            return $usuario->email;
        }
    }
    public static function changeTipoUserRegular(Request $request)
    {
        $usuario = User::where('email', '=', $request->email)->get()->first();
        if ($usuario == null || !isset($usuario)) {
            return false;
        } else {
            if ($usuario->estado == 2) {
                return $usuario->email;
            } else {
                $usuario->tipo = 2;
                $usuario->save();
                return $usuario->email;
            }
        }
    }
}
