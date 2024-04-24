<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title', 'Meeting Faces')
    </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<nav class="bg-gray-800 p-2 mt-0 w-full h-10">
    <div class="container mx-auto flex flex-wrap items-center">
        <div class="flex w-full md:w-1/2 text-white font-extrabold">
            <a class="text-white no-underline hover:text-white hover:no-underline" href="/">
                <span class="text-2xl pl-2">
                    <i class="em em-grinning"></i> 
                    Meeting Faces
                </span>
            </a>
        </div>
        <div class=" justify-end">
            <ul class="list-reset flex flex-1 md:flex-none">
                <li class="mr-3">
                    <a class="inline-block text-white no-underline hover:text-gray-200 hover:text-underline py-2 px-4" href="{{route('profile')}}">
                        {{auth()->user()->nome}}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <div class="container-fluid flex">
    <!-- Menu de navegação -->
    <div class="w-1/4 bg-gray-200 h-screen border-solid">
        <ul class="space-y-2 text-sm">
        <li><a href="#" class="block p-4 text-gray-900 text-2xl font-bold text-center">Sigla</a></li>
            <li><a href="#" class="block p-4 text-gray-900">Listar Moradores</a></li>
            <li><a href="#" class="block p-4 text-gray-900">Cadastrar novo morador</a></li>
            <li><a href="#" class="block p-4 text-gray-900">Ver comentários</a></li>
        </ul>
    </div>
    <!-- Conteúdo -->
    <div class="w-3/4 bg-white h-screen overflow-auto">
        <!-- Conteúdo da página vai aqui -->
        @yield('content')
    </div>
</div>
</body>
</html>