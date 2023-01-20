@extends('layouts.app')

@section('titulo')
    Inicia sesion en Devstagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center mt-10 md:gap-10 md:items-center ">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/login.jpg') }}" alt="imagen login de usuarios">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form method="POST" action="{{ route('login')}}" novalidate>
                @csrf               
                
               @if (session('mensaje'))
                <p class="bg-red-500 text-white my-2 text-sm p-2 text-center rounded-lg">{{ session('mensaje') }}</p>
               @endif
                <div class="mb-5">

                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input type="email" id="email" name="email" placeholder="Tu email de registro" class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror" value={{old('email')}}>
                </div>
                @error('email')
                    <p class="bg-red-500 text-white my-2 text-sm p-2 text-center rounded-lg">{{ $message }}</p>
                @enderror
                <div class="mb-5">

                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password de registro" class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror" >
                </div>
                @error('password')
                <p class="bg-red-500 text-white my-2 text-sm p-2 text-center rounded-lg">{{ $message }}</p>
            @enderror
                

                <input type="submit" value="Iniciar sesion" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection