<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // dd('Aqui se muestra el perfil del usuario');
        return view('perfil.index');
    }
}
