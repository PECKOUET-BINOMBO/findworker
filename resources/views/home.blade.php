@extends('layouts.app')

@section('content')
<h1 class="text-2xl text-white font-semibold bg-per">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
    </svg>
    Tableau de bord
</h1>
<div class="box-info-pro">
    <div class="mt-2 div1">
        <a href="{{route('mesinformations.edit', Auth()->user()->id)}}" class="text-per font-semibold">Modifier mes informations</a>
    </div>
    @if(auth()->user()->date_inactive < now() && auth()->user()->role_id == 1)
    <div class="mt-2 div2">
        <a href="{{route('abonnement.show', ['id' => auth()->user()->id])}}">Passer Pro</a>
    </div>
    @endif
    @if(auth()->user()->date_inactive > now() && auth()->user()->role_id == 1)
    <div class="mt-2 div3">
        <span>Pro</span>
    </div>
    @endif
    @if(auth()->user()->role_id == 2)
    <div class="mt-2 div3">
        <span>Client</span>
    </div>
    @endif
</div>
@if(auth()->user()->is_active == false && auth()->user()->role_id == 1)
<p class="font-semibold text-gray-600" style="font-size:12px;">Passez Pro pour postuler à des annonces clients et vous rendre joignable.</p>
@endif
@if(session('successabonnement'))
<p class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-2 mb-3" role="alert">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
            <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
        </svg> {{ session('successabonnement') }}
</p>
@endif
@if(session('errorabonnement'))
<p class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-2 mb-3" role="alert">
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0-10.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.249-8.25-3.286zm0 13.036h.008v.008H12v-.008z" />
</svg>
 {{ session('errorabonnement') }}
</p>
@endif
<div class="flex flex-col md:flex-row mt-5">
    @if(auth()->user()->role_id == 1)
    <section class="text-gray-700 w-full w-1/3 mr-5">

        <h2 class="text-xl my-2"><svg class="w-6 h-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
                <path fill="#fff" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
            </svg> Mes candidatures en cours ({{ auth()->user()->proposals->count() }})</h2>
        @if(session('success'))
        <span class="bg-green-400 text-white text-center my-2 message-span px-3 py-2 rounded mb-3">
            {{ session('success') }}
        </span>
        @endif

        @foreach(auth()->user()->proposals as $proposal)
        <div class="mb-3 {{ $proposal->validated ? 'bg-green-400 shadow-sm hover:shadow-md rounded border-2 border-green-300' : 'bg-per3 shadow-sm hover:shadow-md rounded border-2 border-gray-300' }}  px-3 py-5  mb-5 ">
            <span class="block font-bold items-center text-center">
                {{ $proposal->job->title }}
            </span>
            <div class="divv">
                <span class="font-semibold">Lettre de motivation :</span> <span>{{ optional($proposal->coverLetter)->content }}</span>
            </div>
            <div class="mt-4">
                <span class="span-action2">
                    <form action="{{ route('home.destroy', $proposal->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="rounded border border-orange-500 px-2 py-1 text-per font-bold action2">Abandonner</button>
                    </form>
                    <!-- <a href="{{route('home.destroy', $proposal->id)}}" class="rounded border border-orange-500 px-2 py-1 text-per font-bold action2">Abandonner</a> -->
                </span>

            </div>
        </div>
        @endforeach
    </section>
    <section class="text-sm text-gray-700 w-full">
        <h2 class="text-xl my-2">
            <svg class="w-6 h-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
            </svg>
            Mes offres de prestations ({{ auth()->user()->clients()->count() }})
        </h2>
        @if(session('success2'))
        <span class="bg-green-400 text-white text-center my-2 message-span px-3 py-2 rounded mb-3">
            {{ session('success2') }}
        </span>
        @endif
        @foreach(auth()->user()->clients as $client)
        <div class="mb-3 bg-per3 shadow-sm hover:shadow-md rounded border-2 border-gray-300  px-3 py-5  mb-5 ">

            <span class="block font-bold text-center">
                {{ $client->service }}
            </span>

            </span>
            <div class=" ml-4">
                <div class="divv">
                    <p class="mt-2">{{ $client->description }}</p>
                </div>
                <div class="mt-4">
                    <span class="span-action2">
                        <p class="rounded border border-orange-500 px-2 py-1 text-per font-bold action2">
                            <a href="{{Route('client.editservice', $client->id)}}" class="">Modifier</a>
                        </p>
                    </span>
                    <span class="span-action2">
                        <p class="rounded border border-orange-500 px-2 py-1 text-per font-bold action2">
                            <a href="{{Route('client.destroyservice', $client->id)}}" class="">Supprimer</a>
                        </p>
                    </span>

                </div>
            </div>
        </div>
        @endforeach
    </section>
    @else
    <section class="text-sm text-gray-700 w-1/2">
        <h2 class="text-xl my-2">
            <svg class="w-6 h-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
            </svg>
            Demandes faites ({{ auth()->user()->jobs()->count() }})
        </h2>
        @if(session('success2'))
        <span class="bg-green-400 text-white text-center my-2 message-span px-3 py-2 rounded mb-3">
            {{ session('success2') }}
        </span>
        @endif
        @foreach(auth()->user()->jobs as $job)
        <div class="mb-3 bg-per3 shadow-sm hover:shadow-md rounded border-2 border-gray-300  px-3 py-5  mb-5 ">

            <span class="block font-semibold text-center">
                {{ $job->title }} ({{ $job->proposals->count() }} @choice('proposition|propositions', $job->proposals)) :

                <span class="span-action2">
                    <a href="{{Route('Jobs.edit2', $job->id)}}" class="  py-1 text-per font-bold "><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                    </a>
                </span>
                <span class="span-action2">
                    <form action="{{ route('Jobs.destroy', $job->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class=" px-2 py-1 text-per font-bold "><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </button>
                    </form>
                </span>
            </span>

            </span>
            <div class=" ml-4">
                @foreach($job->proposals as $proposal)
                <div class="divv">
                    @if ($proposal && $proposal->coverLetter)
                    <p class="mt-2">• "{{ $proposal->coverLetter->content }}"</p>
                    @endif

                    </p>
                    <p class="mt-3"><span class="font-semibold">

                            Postulant(e) : </span>{{$proposal->user->name }}</p>

                    <div class="mt-4">
                        <span>
                            <a href="tel:+221{{ optional($proposal->coverLetter)->tel }}" class="rounded border border-orange-500 px-2 py-1 text-per font-bold action">
                                Appeler
                            </a>
                        </span>
                        <span class="mx-2">
                            <a href="https://wa.me/{{ optional($proposal->coverLetter)->tel2}}" class="rounded border border-orange-500 px-2 py-1 text-per font-bold action" target="_blank">
                                Whatsapp
                            </a>
                        </span>
                        <span class="mx-2">
                            <a href="mailto:{{ optional($proposal->coverLetter)->email }}" class="rounded border border-orange-500 px-2 py-1 text-per font-bold action" target="_blank">
                                E-mail
                            </a>
                        </span>
                        <span class="span-action2 mt-4">
                            <form action="{{ route('home.destroy', $proposal->id) }}" method="post">
                                <form action="" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded border border-orange-500 px-2 py-1 text-per font-bold action2">Pas intéressé</button>
                                </form>


                        </span>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
        @endforeach
    </section>
</div>

@endif
@endsection
