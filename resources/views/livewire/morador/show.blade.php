<div class="container-fluid py-4">
    @if (session()->has('msg'))
        <div class="alert alert-success">
            {{ session('msg')}}
        </div>
    @endif
    <div>
        @if ($this->isAdmin)
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
                        class="flex items-center gap-2 bg-white px-5 py-2.5 rounded-md ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                            <path
                                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                        </svg>
                    </button>
                    <!-- Panel -->
                    <div x-ref="panel" x-show="open" x-transition.origin.top.left
                        x-on:click.outside="close($refs.button)" :id="$id('dropdown-button')" style="display: none;"
                        class="absolute left-0 mt-2 w-40 rounded-md bg-white shadow-md">
                        <a href="{{ route('morador.edit', ['id' => $morador->id]) }}"
                            class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                            Editar morador
                        </a>
                        <a href="{{ route('morador.destroy', ['id' => $morador->id]) }}"
                            class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                            <span class="text-red-600">Deletar morador</span>
                        </a>
                    </div>
                </div>
            </div>
        @endif
        <div class="d-flex justify-content-around" style="width: 100%;">
            <div style="width: 50%; height:auto">
                <h3 class="text-center mb-4">{{$morador->nome_completo}}</h3>
                            <img src="{{ asset('storage/photos/' . $morador->profile_picture)}}" alt="" class="border border-secondary rounded mx-auto d-block"
                        style="width: 350px; height:350px">
            </div>
            <div style="width: 50%;">
                <div style="width: 600px;">
                    <ul class="list-group list-group-flush mb-4" style="width: 600px;">
                        <ol class="list-group-item"><b>Nome:</b> {{$morador->nome_completo}} </ol>
                        <ol class="list-group-item"><b>Cidade natal:</b> {{$morador->cidade_natal}} </ol>
                        <ol class="list-group-item"><b>Cidade atual:</b> {{$morador->cidade_atual}} </ol>
                        <ol class="list-group-item"><b>Data de nascimento:</b> {{$morador->data_nasc}} </ol>
                        <ol class="list-group-item"><b>Nome de um parente e grau de parentesco:</b> {{$morador->nome_familiar_proximo}}, {{$morador->grau_parentesco}} </ol>
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
