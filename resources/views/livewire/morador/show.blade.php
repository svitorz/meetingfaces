<body class="bg-gray-100">
  <div class="max-w-lg mx-auto my-10 bg-white rounded-lg shadow-md p-5">
    @if($this->isAdmin)
  <div class="flex justify-end">
    <div
        x-data="{
            open: false,
            toggle() {
                if (this.open) {
                    return this.close()
                }

                this.$refs.button.focus()

                this.open = true
            },
            close(focusAfter) {
                if (! this.open) return

                this.open = false

                focusAfter && focusAfter.focus()
            }
        }"
        x-on:keydown.escape.prevent.stop="close($refs.button)"
        x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
        x-id="['dropdown-button']"
        class="relative"
    >
        <!-- Button -->
        <button
            x-ref="button"
            x-on:click="toggle()"
            :aria-expanded="open"
            :aria-controls="$id('dropdown-button')"
            type="button"
            class="flex items-center gap-2 bg-white px-5 py-2.5 rounded-md shadow"
        >
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
          <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
        </svg>
        </button>
        <!-- Panel -->
        <div
            x-ref="panel"
            x-show="open"
            x-transition.origin.top.left
            x-on:click.outside="close($refs.button)"
            :id="$id('dropdown-button')"
            style="display: none;"
            class="absolute left-0 mt-2 w-40 rounded-md bg-white shadow-md"
        >
            <a href="{{route('morador.edit',['id' => $morador->id])}}" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                Editar morador
            </a>
            <a href="{{route('morador.destroy',['id' => $morador->id])}}" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                <span class="text-red-600">Deletar morador</span>
            </a>
        </div>
    </div>
  </div>
  @endif
    <img class="w-32 h-32 rounded-full mx-auto" src="" alt="Profile picture" />
    <h2 class="text-center font-semibold my-4">
      {{$morador->nome_completo}}
    </h2>
    <p class="text-center text-gray-600 mt-1"></p>
    <div class="flex justify-center mt-5">
      <p class="text-gray-500 hover:text-gray-700 mx-3">Cidade atual: {{$morador->cidade_atual}}</a>
      <p class="text-gray-500 hover:text-gray-700 mx-3">Cidade natal: {{$morador->cidade_natal}}</a>
      <p class="text-gray-500 hover:text-gray-700 mx-3">Nome de um familiar e grau de parentesco: {{$morador->nome_familiar_proximo}}, {{$morador->grau_parentesco}}</p>
    </div>
    <div class="mt-5">
      @if (isset($comentarios))
        @foreach($comentarios as $comentario)
          <h3 class="text-xl font-semibold"></h3>
            <p class="text-gray-600 mt-2">{{$comentario->comentario}}</p>
        @endforeach
      @endif
      @if(session('msg'))
      <div class="p-4 mb-4 text-blue-800 rounded-lg bg-blue-50" role="alert">
        <span class="">
          {{session('msg')}}
        </span> 
      </div>
      @endif
    </div>
  </div>
</body>