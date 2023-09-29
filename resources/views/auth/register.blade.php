@extends('layouts.app')

@section('content')
<div class="auth4">
    <form method="POST" action="{{ route('register') }}" class="w-full max-w-sm mx-auto rounded-lg border shadow-md p-5 mb-5" enctype="multipart/form-data">
        @csrf
        <h1 class="font-semibold text-3xl text-per mb-6 text-center">Inscription</h1>

        <div class="mb-4">
            <label for="name" class="block font-semibold text-gray-700 mb-2">Nom d'utilisateur</label>
            <input id="name" type="text" name="name" class="shadow border rounded w-full p-2" value="{{ old('name') }}" autocomplete="name" placeholder="Nom d'utilisateur" autofocus>
            @error('name')
            <span class="text-red-400 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block font-semibold text-gray-700 mb-2">Email</label>
            <input id="email" type="email" name="email" class="shadow border rounded w-full p-2" value="{{ old('email') }}" autocomplete="email" placeholder="Votre email" autofocus>
            @error('email')
            <span class="text-red-400 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block font-semibold text-gray-700 mb-2">Mot de passe</label>
            <input id="password" type="password" name="password" class="shadow border rounded w-full p-2" value="{{ old('password') }}" autocomplete="password" placeholder="Votre mot de passe" autofocus>
            @error('password')
            <span class="text-red-400 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block font-semibold text-gray-700 mb-2">Confirmation du mot de passe</label>
            <input id="password_confirmation" type="password" name="password_confirmation" class="shadow border rounded w-full p-2" value="{{ old('password_confirmation') }}" autocomplete="password_confirmation" placeholder="Retapez votre mot de passe" autofocus>
        </div>

        <div class="mb-4">
            <label for="profile_picture" class="block font-semibold text-gray-700 mb-2">Photo de profil</label>
            <input id="profile_picture" type="file" name="profile_picture" class="shadow border rounded w-full p-2" accept="image/*">
            @error('profile_picture')
            <span class="text-red-400 text-sm font-semibold">{{ $message }}</span>
            @enderror
        </div>

        <!-- <div class="">
            <p for="role-select" class="font-semibold text-gray-700">Je suis un :</p>
            <div class="flex justify-between items-center mb-4 shadow border rounded w-full py-3 px-2">
                <label for="freelance">Prestataire
                    <input type="radio" value="1" id="freelance" name="role_id">
                    <span class="checkmark"></span>
                </label>
                <label for="client">Client
                    <input type="radio" value="2" id="client" name="role_id">
                    <span class="checkmark"></span>
                </label>
            </div>
            @error('role_id')
            <span class="text-red-400 text-sm block font-semibold">{{ $message }}</span>
            @enderror
        </div> -->
        <div class="mb-4">
            <label for="role_id" class="font-semibold text-gray-700">Je suis un :</label>
            <select name="role_id" id="role_id" class="bg-gray-200 border-2 w-full p-4 rounded-lg @error('role_id') border-red-500 @enderror"  autocomplete="role_id" autofocus>
                <option value="1">Prestataire</option>
                <option value="2">Client</option>
            </select>
            @error('role_id')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-4" style="text-align:center;">
            <a href="{{ route('login') }}" class="text-per hover:text-orange-700 transition ease-in-out duration-500 text-sm">Déjà inscrit !</a>
        </div>

        <button type="submit" class="bg-per text-white hover:bg-orange-700 transition ease-in-out duration-500 rounded-md shadow-md w-full block px-4 py-2 mt-3">Créer mon compte</button>
    </form>
</div>
@endsection
