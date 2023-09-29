@extends('layouts.app')

@section('content')

    <div class="card-box2">
        <div class="">
            <a href="{{route('abonnement.abonnement', Auth()->user()->id)}}">
                <img src="{{asset('pictures/1.png')}}" alt="">
            </a>
        </div>
        <div class="">
            <a href="{{route('abonnement.abonnement2', Auth()->user()->id)}}">
                <img src="{{asset('pictures/2.png')}}" alt="">
            </a>
        </div>
        <div class="">
            <a href="{{route('abonnement.abonnement3', Auth()->user()->id)}}">
                <img src="{{asset('pictures/3.png')}}" alt="">
            </a>
        </div class="">
        <div class="">
            <a href="{{route('abonnement.abonnement4', Auth()->user()->id)}}">
                <img src="{{asset('pictures/4.png')}}" alt="">
            </a>
        </div>
    </div>

</div>

@endsection
