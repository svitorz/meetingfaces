@extends('templates.template')
@section('content')
<div class="container-fluid py-4">
    @if (session()->has('msg'))
    <div class="alert alert-success">
        {{ session('msg')}}
    </div>
    @endif
    <div>
        @if ($isAdmin)
        <div class="flex justify-end">
            <div x-data="{
                    open: false,
                    toggle() {
                        if (this.open) {
                            return this.close()
                        }

                        this.$refs.button.focus()

                        this.open = true
                    },
                    close(focusAfter) {
                        if (!this.open) return

                        this.open = false

                        focusAfter && focusAfter.focus()
                    }
                }" x-on:keydown.escape.prevent.stop="close($refs.button)"
                x-on:focusin.window="! $refs.panel.contains($event.target) && close()" x-id="['dropdown-button']"
                class="relative">
                <!-- Button -->
                <button x-ref="button" x-on:click="toggle()" :aria-expanded="open"
                    :aria-controls="$id('dropdown-button')" type="button"
                    class="tw-flex tw-items-center tw-gap-2 tw-bg-white tw-px-5 tw-py-2.5 tw-rounded-md ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                        <path
                            d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                    </svg>
                </button>
                <!-- Panel -->
                <div x-ref="panel" x-show="open" x-transition.origin.top.left x-on:click.outside="close($refs.button)"
                    :id="$id('dropdown-button')" style="display: none;"
                    class="tw-absolute tw-left-0 tw-mt-2 tw-w-40 tw-rounded-md tw-bg-white tw-shadow-md py-4">
                    <a href="{{ route('morador.edit', ['morador' => $morador->id]) }}"
                        class="tw-flex tw-items-center tw-gap-2 tw-w-full tw-first-of-type:rounded-t-md tw-last-of-type:rounded-b-md tw-px-4 tw-py-2.5 tw-text-left tw-text-sm tw-hover:bg-gray-50 tw-disabled:text-gray-500">
                        Editar morador
                    </a>
                    <a href="{{ route('morador.destroy', ['morador' => $morador->id]) }}"
                        class="tw-flex tw-items-center tw-gap-2 tw-w-full tw-first-of-type:rounded-t-md tw-last-of-type:rounded-b-md tw-px-4 tw-py-2.5 tw-text-left tw-text-sm tw-hover:bg-gray-50 tw-disabled:text-gray-500 text-danger">
                        Deletar morador
                    </a>
                </div>
            </div>
        </div>
        @endif
        <div class="d-flex justify-content-around" style="width: 100%;">
            <div style="width: 50%; height:auto">
                <h3 class="text-center mb-4">{{$morador->nome_completo}}</h3>
                @if (Storage::disk('public')->exists('photos/' . $morador->profile_picture))
                <img src="{{ asset('storage/photos/' . $morador->profile_picture) }}"
                    alt="Imagem de {{$morador->nome_completo}}" class="border border-secondary rounded mx-auto d-block"
                    style="width: 350px; height:350px">
                @else
                <p>Imagem não encontrada.</p>
                @endif
            </div>
            <div style="width: 50%;">
                <div style="width: 600px;">
                    <ul class="list-group list-group-flush mb-4" style="width: 600px;">
                        <ol class="list-group-item"><b>Nome:</b> {{$morador->nome_completo}} </ol>
                        <ol class="list-group-item"><b>Cidade natal:</b> {{$morador->cidade_natal}} </ol>
                        <ol class="list-group-item"><b>Cidade atual:</b> {{$morador->cidade_atual}} </ol>
                        <ol class="list-group-item"><b>Data de nascimento:</b> {{$morador->data_nasc}} </ol>
                        <ol class="list-group-item"><b>Nome de um parente e grau de parentesco:</b>
                            {{$morador->nome_familiar_proximo}}, {{$morador->grau_parentesco}} </ol>
                    </ul>
                    @livewire('comentario.CreateComentario', ['id' => $morador->id])
                </div>
            </div>
        </div>
        <div class="py-4">
            @if (isset($comentarios))
            @foreach ($comentarios as $comentario)
            <h3 class="text-xl font-semibold"></h3>
            <p class="text-gray-600 mt-2">{{ $comentario->comentario }}</p>
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection