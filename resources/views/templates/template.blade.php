<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title', 'Meeting Faces')
    </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    <!-- Barra de navegação superior -->
    <livewire:layout.navigation/>

    <div class="container-fluid flex">
        <!-- Barra de navegação lateral -->
        <div class="w-1/4 bg-gray-200 h-screen">
            <ul class="space-y-2 text-sm">
                <li><a href="{{route('ongs.dashboard')}}" class="block p-4 text-gray-900">Home</a></li>
                <li><a href="#" class="block p-4 text-gray-900">Listar Moradores</a></li>
                <li><a href="{{route('morador.create')}}" class="block p-4 text-gray-900">Cadastrar novo morador</a></li>
                <li><a href="#" class="block p-4 text-gray-900">Ver comentários</a></li>
            </ul>
        </div>

        <!-- Conteúdo -->
        <div class="w-3/4 bg-white h-screen overflow-auto">
            <!-- Conteúdo da página vai aqui -->
            @yield('content')
        </div>
    </div>
    @livewireScripts
</body>
</html>