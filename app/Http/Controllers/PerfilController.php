<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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
            'username'=>['required','unique:users,username,'.auth()->user()->id,'min:3','max:20','not_in:twitter,editar-perfil'],//--> cuando son mas de tres reglas se ponen en array
        ]);

        if($request->imagen){
            $imagen = $request->file('imagen');
            //modificar imagenes
            $nombreImagen = Str::uuid() . "." . $imagen->extension();//-->genera id unico
            $imagenServidor = Image::make($imagen);
            $imagenServidor->fit(1000,1000);

            $imagenPath = public_path('perfiles') . '/' . $nombreImagen;
            $imagenServidor->save($imagenPath);
           
        } 
        //Guardar cambios
        $usuario = User::find( auth()->user()->id);

        $usuario->username = $request->username;
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null; //--> no la elimina pero si hay img en base de datos no la borra
        $usuario->save();

        //REdireccionar

        return redirect()->route('posts.index', $usuario->username);

        
    }
}
