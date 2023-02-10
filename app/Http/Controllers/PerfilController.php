<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
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

    public function store(Request $request)
    {
        // dd('guardando cambios ');
        //Modificar el request (para evitar el username repetido)
        $request->request->add(['username'=>Str::slug($request->username)]);
        $this->validate($request,[
            'username'=>['required','unique:users','min:3','max:20','not_in:twitter,editar-perfil'],//--> cuando son mas de tres reglas se ponen en array
        ]);
    }
}
