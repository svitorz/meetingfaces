<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        {{ $title ?? 'Meeting Faces' }}
    </title>
     <link rel="icon" href="{{asset('img/logo1.png')}}" type="image/icon type="image/x-icon">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/sass/app.scss'])
</head>

<body>
    <livewire:layout.navigation />
    {{ $slot }}
</body>

</html>
