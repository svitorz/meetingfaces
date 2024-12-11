@extends('templates.template')
<style>
    .ly {
        font-family: 'Bitter', cursive;
        font-size: large;
    }
</style>

<div class="ly">
    @section('content')
    @if (session()->has('msg'))
    @php
    $isDanger = false;
    if(str_contains(session('msg'),'excluído')){
    $isDanger = true;
    }
    @endphp
    <div @class([ 'alert' , 'alert-danger'=> $isDanger,
        'alert','alert-success' => ! $isDanger,
        ])>
        {{ session('msg')}}
    </div>
    @endif
    <livewire:morador.search-box />
    <div class="container w-full h-full">
        <div class="mx-auto d-block">
            <div class="row">
                <div class="lg:col-4 md:col-3 sm:col-2">
                    @foreach ($moradores as $morador)
                    <a href="{{ route('morador.show', ['morador' => $morador->id]) }}"
                        class="shadow-sm link-underline m-3 link-underline-opacity-0 border border-tertiary radius btn btn-outline-dark"
                        style="height:95px; width:360px;" type="button">
                        <h4 class="card-text">{{ $morador->nome_completo }}</h4>
                        <p class="card-text">{{ $morador->cidade_atual }}</p>
                    </a>
                    @endforeach
                </div>
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