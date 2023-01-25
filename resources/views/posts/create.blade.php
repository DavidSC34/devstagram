@extends('layouts.app')

@section('titulo')
Crea una nueva Publicacion
@endsection

@section('contenido')

    <div class="md:flex md:items-center mt-10">
            <div class="md:w-1/2 px-10">
                imagen aqui
            </div>
            <div class="md:w-1/2 px-10 bg-white p-10 rounded-lg shadow-xl mt-10 md:mt-0">
                <form action="{{route('register')}}" method="POST" novalidate>
                    @csrf
                    <div class="mb-5">
    
                        <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Nombre</label>
                        <input type="text" id="name" name="name" placeholder="Tu nombre" class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" value={{old('name')}}>
                    </div>
                    @error('name')  
                        <p class="bg-red-500 text-white my-2 text-sm p-2 text-center rounded-lg">{{ $message }}</p>
                    @enderror

                   
                 
    
                    <input type="submit" value="Crear cuenta" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
                </form>
            </div>
    </div>

@endsection