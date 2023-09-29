@extends('layouts.app')

@section('content')
<div class="auth4">
    <form method="POST" action="{{ route('mesinformations.update', Auth()->user()->id) }}" class="w-full max-w-sm mx-auto rounded-lg border shadow-md p-5 mb-5" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <h1 class="font-semibold text-3xl text-per mb-6 text-center">Mes informations</h1>

        <div class="mb-4">
            <label for="name" class="block text-per text-sm font-bold mb-2">Nom</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}" class="bg-gray-200 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" placeholder="Votre nom" required autocomplete="name" autofocus>
            @error('name')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-per text-sm font-bold mb-2">Email</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}" class="bg-gray-200 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" placeholder="Votre email" required autocomplete="email" autofocus>
            @error('email')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
            @enderror
        </div>
<div class="mb-4">
            <label for="password" class="block text-per text-sm font-bold mb-2">Mot de passe</label>
            <input type="password" name="password" id="password" value="" class="bg-gray-200 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror" placeholder="Votre mot de passe" autocomplete="password" autofocus>
            @error('password')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="profile_picture" class="block text-per text-sm font-bold mb-2">Photo de profil</label>
            <input type="file" name="profile_picture" id="profile_picture" value="{{ $user->profile_picture }}" class="bg-gray-200 border-2 w-full p-4 rounded-lg @error('profile_picture') border-red-500 @enderror" placeholder="Votre photo de profil" autocomplete="profile_picture" autofocus>
            @error('profile_picture')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="role_id" class="block text-disabled  text-sm font-bold ">Je suis un :</label>
            <p class="text-disabled2">Vous ne pouvez modifier cette option pour le moment</p>
            <select name="role_id" id="role_id" class="bg-gray-200 border-2 w-full p-4 rounded-lg @error('role_id') border-red-500 @enderror"  autocomplete="role_id" autofocus>
                <option value="1" {{ $user->role_id == 1 ? 'selected' : '' }}disabled>Prestataire</option>
                <option value="2" {{ $user->role_id == 2 ? 'selected' : '' }}disabled>Client</option>
            </select>
            @error('role_id')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
            @enderror
        </div>






        <button type="submit" class="bg-per text-white hover:bg-orange-700 transition ease-in-out duration-500 rounded-md shadow-md w-full block px-4 py-2 mt-3">Mettre à jour</button>
    </form>
</div>
@endsection
