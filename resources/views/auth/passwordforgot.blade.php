@extends('layouts.app')

@section('content')
<div class="auth3">

    <!-- message de réussite -->
    @if (session('message'))
    <div class="mb-4 font-medium text-green-600 text-center">
        <p>{{ session('message') }}</p>
    </div>
    @endif
    @if (session('message5'))
    <div class="mb-4 font-medium text-red-600 text-center">
        <p>{{ session('message5') }}</p>
    </div>
    @endif
    <form method="POST" action="{{route('password.email')}}" class="w-full max-w-sm mx-auto rounded-lg border shadow-md p-5 mb-5">
        @csrf
        <h1 class="font-semibold text-3xl text-per mb-6 text-center">Mots de passe oublié</h1>
        <div class="mb-4">
            <label for="email" class="block font-semibold text-gray-700 mb-2">Email</label>
            <input id="email" type="email" name="email" class="shadow border rounded w-full p-2" value="{{ old('email') }}" autocomplete="email" placeholder="Votre email" autofocus>
            @error('email')
            <span class="text-red-400 text-sm">
                <span>{{ $message }}</span>
            </span>
            @enderror
            @if (session('message2'))
            <span class="text-red-400 text-sm">
                <span>{{ session('message2') }}</span>
            </span>
            @endif
        </div>
        <button type="submit" class="bg-per text-white hover:bg-orange-700 transition ease-in-out duration-500 rounded-md shadow-md w-full block px-4 py-2 mt-3">Réinitialiser</button>

        <p class="text-center mt-3">
            Retour <a href="{{route('login')}}" class="text-per">connexion</a>
        </p>

    </form>
</div>

@endsection
