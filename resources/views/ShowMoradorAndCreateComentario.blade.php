<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title', 'Meeting Faces')
    </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <livewire:layout.navigation/>
    <div class="container mx-auto flex justify-center">
        <div class="w-1/2">
            <livewire:morador.show :id="$id" />
        </div>
        <div class="w-1/2">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
            <livewire:comentario.CreateComentario :id="$id" />
        </div>
    </div>
</body>
</html>