<div class="relative overflow-x-auto max-w-1/2">
    <table class="text-sm text-left rtl:text-right text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
            <tr>
                <th></th>
                <th></th>
                <th>Comentario</th>
                <th>Morador</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comentarios as $comentario)
            <tr class="bg-white border-b">
                <th>
                    <button wire:click="aprovar({{$comentario->id_comentario}})"
                        class="p-4 bg-blue-700 hover:bg-blue-400 text-white hover:text-gray-500">
                        Aprovar
                    </button>
                </th>
                <th>
                    <button wire:click="excluir({{$comentario->id_comentario}})"
                        class="p-4 bg-red-700 hover:bg-red-400 text-white hover:text-gray-500">
                        Excluir
                    </button>
                </th>
                <th>
                    <a
                        href="{{route('morador.show',['id' => $comentario->id_morador])}}">{{$comentario->nome_completo}}</a>
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap break-all">
                    {{$comentario->comentario}}
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>