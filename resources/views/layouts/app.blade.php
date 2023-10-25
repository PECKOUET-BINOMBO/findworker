<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Workup</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('pictures/logo2.png')}}" type="image/x-icon">
    <style>
        [x-cloak] {
            display: none;
        }
    </style>
    @livewireStyles
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>


</head>

<body>
    <div class="site">

        @include('partials.navbar')
        <livewire:flash />
        @yield('content')
    </div>
    @livewireScripts

</body>
<script src="{{ asset('js/app.js') }}"></script>

</html>
