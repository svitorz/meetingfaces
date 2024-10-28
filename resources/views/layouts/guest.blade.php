<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ config('app.name', 'Meeting Faces') }}
    </title>
    <link rel="icon" href="{{asset('img/logo1.png')}}" type="image/icon type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Bitter:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/sass/app.scss'])
    @livewireScripts
</head>

<body>
    <livewire:layout.navigation />
    <div class="ly d-flex align-items-center py-4 bg-body-white">
        <div class="form-signin w-100 m-auto ">
            <a href="/" wire:navigate>
                <img class="mx-auto d-block mt-5" src="{{ asset('img/logo2.png') }}" alt="dois rostos encostados" />
            </a>
            {{ $slot }}
        </div>
    </div>
</body>

</html>
