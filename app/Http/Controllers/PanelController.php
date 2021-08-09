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

        return view('panel.dashboard.usuarios.index');
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
