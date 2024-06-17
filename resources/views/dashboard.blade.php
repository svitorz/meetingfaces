@extends('templates.template')
<style>
    .ly {
        font-family: 'Bitter', cursive;
        font-size: large;
    }
</style>

<div class="ly">
    @section('content')
        <div class=" d-flex justify-content-center p-2">
            <form class="col-6 mb-3 mb-2 me-3 ms-3" role="search" width="100px">
                <input type="search" class="form-control form-control-dark text-bg-light" placeholder="Pesquise..."
                    aria-label="Search">
            </form>
        </div>
        <div class="container-fluid">
            <div class="mx-auto d-block">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 radius ">
                    @foreach ($moradores as $morador)
                        <div class="col">
                            <div>
                                <a href="morador.php"
                                    class="shadow-sm link-underline link-underline-opacity-0 border border-tertiary radius btn btn-outline-dark p-3 "
                                    style="height:95px; width:360px;" type="button">
                                    <h4 class="card-text">{{ $morador->nome_completo }}</h4>
                                    <p class="card-text">{{ $morador->cidade_atual }}</p>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection
</div>
