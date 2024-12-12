<div class="row">
    <style>
        #link-item:hover {
            text-decoration: underline;
        }
    </style>
    <div class="col-lg-2 col-md-4 col-sm-6 border-end">
        <div class="flex justify-content-center align-items-center">
            <ul>
                <h2 class="text-primary">Menu</h2>
                <div class="ms-4 py-4">
                    <li class="border-bottom py-5">
                        <button wire:click="getComponent(true)" @class(['text-decoration-none flex
                            align-items-center', 'text-primary'=> $this->component]) {{$this->component ? 'disabled' :
                            ''}} id="link-item">
                            <x-heroicon-s-users style="width: 20px; height: 20px;" />
                            Moradores cadastrados
                        </button>
                    </li>
                    <li class="border-bottom py-5">
                        <button wire:click="getComponent(false)" @class(['text-decoration-none flex
                            align-items-center', 'text-primary'=> !$this->component]) {{!$this->component ? 'disabled' :
                            ''}} id="link-item">
                            <x-fas-comment-dots style="width: 20px; height: 20px;" />

                            Comentários
                        </button>
                    </li>
                    <li class="border-bottom py-5">
                        <a href="{{ route('morador.create') }}"
                            class="text-black text-decoration-none flex align-items-center">
                            <x-heroicon-o-plus style="width: 20px; height: 20px;" />
                            Inserir morador
                        </a>
                    </li>
                </div>
                <h2 class="text-primary">Configurações</h2>
                <div class="ms-4">
                    <li class="border-bottom py-5">
                        <a href="{{route('ongs.show',['ong'=>$ong->id])}}"
                            class="text-black text-decoration-none flex align-items-center">
                            <x-bxs-show style="width: 20px; height: 20px;" />
                            Vizualizar sua ONG
                        </a>
                    </li>
                    <li class="border-bottom py-5">
                        <a href="{{route('ongs.edit',['ong' => $ong->id])}}"
                            class="text-black text-decoration-none flex" id="link-item">
                            <x-feathericon-edit style="width: 20px; height: 20px;" />
                            Editar ONG
                        </a>
                    </li>
                    <li class="border-bottom py-5 flex">
                        <form action="{{ route('ongs.destroy', ['ong'=>$ong->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="flex text-danger text-decoration-none" id="link-item">
                                <x-heroicon-s-trash style="width: 20px; height: 20px;" />
                                Excluir ONG
                            </button>
                        </form>
                    </li>
                </div>
            </ul>
        </div>
    </div>
    <div class="col-lg-10 col-md-8 col-sm-6">
        @if($this->component)
        @livewire("ongs.admin.moradores")
        @else
        @livewire("comentario.comentarios-pendentes")
        @endif
    </div>
</div>