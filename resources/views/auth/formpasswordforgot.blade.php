@extends('layouts.app')

@section('content')
<div class="auth3">

    @if (session('message3'))
    <div class="mb-4 font-medium text-red-600 text-center">
        <p>{{ session('message3') }}</p>
    </div>
    @endif

    

    <form method="POST" action="{{route('password.update')}}" class="w-full max-w-sm mx-auto rounded-lg border shadow-md p-5 mb-5" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <h1 class="font-semibold text-3xl text-per mb-6 text-center">Nouveau mots de passe</h1>

        <div class="mb-4">
            <label for="email" class="block text-per text-sm font-bold mb-2">Email</label>
            <input type="email" name="email" id="email" class="bg-gray-200 border-2 w-full py-1 px-2 rounded-lg @error('email') border-red-500 @enderror" placeholder="Votre email" required autocomplete="email" autofocus>
            @error('email')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
            @enderror
            @if (session('message1'))
            <div class="text-red-500 mt-2 text-sm">
                {{ session('message1') }}
            </div>
            @endif
        </div>
        <div class="mb-4">
            <label for="password" class="block text-per text-sm font-bold mb-2">Mot de passe</label>
            <input type="password" name="password" id="password" value="" class="bg-gray-200 border-2 w-full py-1 px-2 rounded-lg @error('password') border-red-500 @enderror" placeholder="Votre mot de passe" autocomplete="password" autofocus>
            @error('password')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
            @enderror
            @if (session('message2'))
            <div class="text-red-500 mt-2 text-sm">
                {{ session('message2') }}
            </div>
            @endif
        </div>

        <button type="submit" class="bg-per text-white hover:bg-orange-700 transition ease-in-out duration-500 rounded-md shadow-md w-full block px-4 py-2 mt-3">Mettre à jour</button>
    </form>
</div>
@endsection
