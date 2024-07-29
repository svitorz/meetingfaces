<style>
    .ly{
        font-family: 'Bitter', cursive;
    }
</style>
<div class="container mt-5">
    <h2 class="text-center mb-5 ">Saiba para quem doar!</h2>
    <div class="row g-3">
            @foreach ($ongs as $ong)
                <div class="col-3 mx-1 border border-dark" type="button" style="width: 20rem; height:25rem">
                <h5 class="p-4 text-center">{{$ong->nome_completo}}</h5>
                <p class="p-4">{{$ong->descricao}}</p>
                    <a href="{{route('ongs.show', $ong->id)}}"
                    class="border border-dark text-center btn btn-outline-dark border-dark py-1 p-3 mx-auto d-block "
                    type="button" style="width:50%"> Conheça mais</a>
                </div>
                @endforeach
            </div>
    </div>