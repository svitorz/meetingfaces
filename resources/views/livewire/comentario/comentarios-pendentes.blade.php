<div class="tw-relative tw-overflow-x-auto tw-max-w-1/2">
    <table class="tw-text-sm tw-text-left rtl:tw-text-right tw-text-gray-500 ">
        <thead class="tw-text-xs tw-text-gray-700 tw-uppercase tw-bg-gray-50 ">
            <tr>
                <th></th>
                <th></th>
                <th>Morador</th>
                <th>Comentario</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comentarios as $comentario)
            <tr class="tw-bg-white tw-border-b">
                <th>
                    <button wire:click="aprovar({{$comentario->id_comentario}})"
                        class="tw-p-4 tw-bg-blue-700 hover:tw-bg-blue-400 tw-text-white hover:tw-text-gray-500">
                        Aprovar
                    </button>
                </th>
                <th>
                    <button wire:click="excluir({{$comentario->id_comentario}})"
                        class="tw-p-4 tw-bg-red-700 hover:tw-bg-red-400 tw-text-white hover:tw-text-gray-500">
                        Excluir
                    </button>
                </th>
                <th>
                    <a
                        href="{{route('morador.show',['morador' => $comentario->id_morador])}}">{{$comentario->nome_completo}}</a>
                </th>
                <th scope="row"
                    class="tw-px-6 tw-py-4 tw-font-medium tw-text-gray-900 tw-whitespace-nowrap tw-break-all">
                    {{$comentario->comentario}}
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>