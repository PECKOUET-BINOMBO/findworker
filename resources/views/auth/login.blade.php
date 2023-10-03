@extends('layouts.app')

@section('content')
<div class="auth">
    @if (session('message4'))
    <div class="mb-4 font-medium text-green-600 text-center">
        <p>{{ session('message4') }}</p>
    </div>
    @endif
    <form method="POST" action="{{ route('login') }}" class="w-full max-w-sm mx-auto rounded-lg border shadow-md p-5 mb-5">
        @csrf
        <h1 class="font-semibold text-3xl text-per mb-6 text-center">Connexion</h1>
        <div class="mb-4">
            <label for="email" class="block font-semibold text-gray-700 mb-2">Email</label>
            <input id="email" type="email" name="email" class="shadow border rounded w-full p-2" value="{{ old('email') }}" autocomplete="email" placeholder="Votre email" autofocus>
            @error('email')
            <span class="text-red-400 text-sm">
                <span>{{ $message }}</span>
            </span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block font-semibold text-gray-700 mb-2">Mot de passe</label>
            <input id="password" type="password" name="password" class="shadow border rounded w-full p-2" value="{{ old('password') }}" autocomplete="password" placeholder="Votre mot de passe" autofocus>
            @error('password')
            <span class="text-red-400 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex justify-between">
            <div>
                <a href="{{ route('passwordforgot') }}" class="text-per hover:text-orange-700 transition ease-in-out duration-500 text-sm">Mot de passe oublié ?</a>
            </div>
            <div class="mb-4">
                <a href="{{ route('register') }}" class="text-per hover:text-orange-700 transition ease-in-out duration-500 text-sm">Pas encore inscrit ?</a>
            </div>
        </div>

        <button type="submit" class="bg-per text-white hover:bg-orange-700 transition ease-in-out duration-500 rounded-md shadow-md w-full block px-4 py-2 mt-3">Se connecter</button>
    </form>
</div>

@endsection
