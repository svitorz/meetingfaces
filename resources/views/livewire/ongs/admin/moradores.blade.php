<div class="container-fluid">
            <style>
                .ly {
                    font-family: 'Bitter', cursive;
                    font-size: large;
                }
            </style>
                @if (session()->has('msg'))
                    @php
                        $isDanger = false;
                        if(str_contains(session('msg'),'excluído')){
                            $isDanger = true;
                        }
                    @endphp
                    <div @class([
                            'alert',
                            'alert-danger' => $isDanger,
                                'alert-success' => ! $isDanger,
                            ])>
                            {{ session('msg')}}
                    </div>
                @endif
            <div class="mx-auto d-block">
                <div class="row">
                    @foreach ($moradores as $morador)
                        <div class="col-3">
                            <img src="{{ asset('storage/photos/' . $morador->profile_picture)}}" alt="Imagem de {{$morador->nome_completo}}" style="width: 360px;">
                            <a href="{{ route('morador.show', ['id' => $morador->id]) }}"
                                class="shadow-sm link-underline m-3 link-underline-opacity-0 border border-tertiary radius btn btn-outline-dark"
                                style="height:95px; width:360px;" type="button">
                                <h4 class="card-text">{{ $morador->nome_completo }}</h4>
                                <p class="card-text">{{ $morador->cidade_atual }}</p>
                            </a>
                        </div>
                    @endforeach
                    @empty($morador)
                        <p class="text-center">Não há registros em nossa base de dados.</p>
                    @endempty
                </div>
            </div>
            <div class="d-flex justify-content-center">
                {{ $moradores->links() }}
            </div>
        </div>
    </div>
