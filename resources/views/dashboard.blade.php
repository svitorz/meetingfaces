@extends('templates.template')
<style>
    .ly {
        font-family: 'Bitter', cursive;
        font-size: large;
    }
</style>

<div class="ly">
    @section('content')
        <div class="d-flex justify-content-center p-2">
            <form class="col-6 mb-3 mb-2 me-3 ms-3" role="search" width="100px" action="{{ route('morador.find') }}"
                method="POST">
                @csrf
                <div class="input-group">
                    <input type="search" class="form-control input-group form-control-dark text-bg-light"
                        placeholder="Pesquise..." aria-label="Search" name="name">
                    <button type="submit" class="input-group-text">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                        </svg> 
                    </button>
                </div>
            </form>
        </div>
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
                </div>
            </div>
        </div>
    @endsection
</div>
