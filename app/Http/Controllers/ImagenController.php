<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    //
    public function store(Request $request)
    {
    //    $input = $request->all();
    $imagen = $request->file('file');
    //modificar imagenes
    $nombreImagen = Str::uuid() . "." . $imagen->extension();//-->genera id unico
    $imagenServidor = Image::make($imagen);
    $imagenServidor->fit(1000,1000);

    $imagenPath = public_path('uploads') . '/' . $nombreImagen;
    $imagenServidor->save($imagenPath);

       return response()->json(['imagen'=> $nombreImagen]);
    }
}
