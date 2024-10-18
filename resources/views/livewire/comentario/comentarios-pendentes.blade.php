<div class="relative overflow-x-auto"> 
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
            <tr>
                <th>Comentario</th>
                <th>Morador</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($comentarios as $comentario)
            <tr class="bg-white border-b">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{$comentario->comentario}}
                </th>
                <th>
                    <a href="{{route('morador.show',['id' => $comentario->id_morador])}}">{{$comentario->nome_completo}}</a>
                </th>
                <th>
                    <button wire:click="aprovar({{$comentario->id_comentario}})" class="p-4 bg-blue-700 hover:bg-blue-400 text-white hover:text-gray-500">
                        Aprovar
                    </button>
                </th>
                <th>
                    <button wire:click="excluir({{$comentario->id_comentario}})" class="p-4 bg-red-700 hover:bg-red-400 text-white hover:text-gray-500">
                        Excluir
                    </button>
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
