@extends('templates.template')
<style>
    .ly {
        font-family: 'Bitter', cursive;
        font-size: large;
    }
</style>

<div class="ly">
    @section('content')
        <livewire:morador.search-box />
        @isset($link_morador)
        <div class="d-flex justify-content-center align-items-center">
            <a href="{{ route('morador.create') }}" class="btn btn-dark">Inserir morador</a>
        </div>
        @endisset
        <div class="container-fluid">
            <div class="mx-auto d-block">
                <div class="row">
                    @foreach ($moradores as $morador)
                        <div class="col-3">
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
    @endsection
</div>
