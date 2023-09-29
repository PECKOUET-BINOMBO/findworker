@extends('layouts.app')

@section('content')


@if(session('successupdate'))
<p class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-3" role="alert">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
        <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
    </svg> {{ session('successupdate') }}
</p>
@endif

<div class="rm flex mt-10">
    @include('partials.pub2')
    <div class="flex flex-col px-2" style="
    width: 70%;">
        <div class="px-3 py-5 mb-3 shadow-sm hover:shadow-md rounded border-2 border-gray-300">

            <h1 class="text-xl  text-per mb-3 font-semibold">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                    <path fill-rule="evenodd" d="M12 6.75a5.25 5.25 0 016.775-5.025.75.75 0 01.313 1.248l-3.32 3.319c.063.475.276.934.641 1.299.365.365.824.578 1.3.64l3.318-3.319a.75.75 0 011.248.313 5.25 5.25 0 01-5.472 6.756c-1.018-.086-1.87.1-2.309.634L7.344 21.3A3.298 3.298 0 112.7 16.657l8.684-7.151c.533-.44.72-1.291.634-2.309A5.342 5.342 0 0112 6.75zM4.117 19.125a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75h-.008a.75.75 0 01-.75-.75v-.008z" clip-rule="evenodd" />
                    <path d="M10.076 8.64l-2.201-2.2V4.874a.75.75 0 00-.364-.643l-3.75-2.25a.75.75 0 00-.916.113l-.75.75a.75.75 0 00-.113.916l2.25 3.75a.75.75 0 00.643.364h1.564l2.062 2.062 1.575-1.297z" />
                    <path fill-rule="evenodd" d="M12.556 17.329l4.183 4.182a3.375 3.375 0 004.773-4.773l-3.306-3.305a6.803 6.803 0 01-1.53.043c-.394-.034-.682-.006-.867.042a.589.589 0 00-.167.063l-3.086 3.748zm3.414-1.36a.75.75 0 011.06 0l1.875 1.876a.75.75 0 11-1.06 1.06L15.97 17.03a.75.75 0 010-1.06z" clip-rule="evenodd" />
                </svg>
                {{$client->service}}
            </h1>
            <p class="text-md text-per2 font-semibold">{{$client->description}}</p>

            <span class="text-per3 text-sm font-normal">
                {{ $client->created_at->diffForHumans() }}

            </span>
        </div>


        @if (Auth::check() && Auth::user()->id != $client->user_id)
        @if ($client->user->is_active && $client->user->date_inactive > now())
        <section x-data="{ open: false }">
            <a href="#" class="text-per font-medium" @click="open = !open">Contacter le prestataire
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                    <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                    <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                </svg>
            </a>
            <div x-show="open" x-cloak class="ctt">
                <a href="tel:{{$client->tel}}" class="font-medium ico">
                    <img src="{{asset('pictures/tel.png')}}" alt="">
                    {{$client->tel}}
                </a>
                <a href="https://wa.me/{{$client->tel2}}" target="_blank" class="font-medium ico">
                    <img src="{{asset('pictures/whatsapp.png')}}" alt="">
                    {{$client->tel2}}
                </a>
            </div>
        </section>
        @elseif ($client->user->is_active && $client->user->date_inactive < now())

        

        <h2 class="text-per font-medium">Ce prestataire ne peut être contacté pour le moment.</h2>
            @elseif($client->user->is_active == false && $client->user->date_inactive == null && $client->user->date_active == null)
            <h2 class="text-per font-medium">Ce prestataire ne peut être contacté pour le moment.</h2>
            @else
            <h2 class="text-per font-medium">Ce prestataire ne peut être contacté pour le moment.</h2>
            @endif

            @elseif (Auth::check() && Auth::user()->id == $client->user_id)
            <h2 class=" font-medium text-per">Ceci est une de vos annonces.</h2>
            <p class="text-per font-medium for-me mt-4">
                <a href="{{Route('client.editservice', $client->id)}}" class="rounded border border-orange-500 px-2 py-1 text-per font-bold action2">Modifier</a> <a href="{{Route('client.destroyservice', $client->id)}}" class="rounded border border-orange-500 px-2 py-1 text-per font-bold action2">Supprimer</a>
            </p>
            @elseif (!Auth::check())
            <h2 class="text-per font-medium">Connectez-vous pour accéder aux contacts de ce prestataire.</h2>
            <p class="font-medium"><a href="{{route('register')}}">Inscrivez-vous</a> ou <a href="{{route('login')}}">Connectez-vous</a></p>
            @endif




    </div>

</div>


@endsection
