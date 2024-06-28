<style>
    .ly{
        font-family: 'Bitter', cursive;
    }
</style>
<div class="container mt-5">
    <h2 class="text-center mb-5 ">Saiba para quem doar!</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 radius ">
        <div class="col">
            @foreach ($ongs as $ong)
                <div class="border border-dark" type="button" style="width: 360px; height:400px">
                <h5 class="p-4 text-center">{{$ong->nome_completo}}</h5>
                <p class="p-4">{{$ong->descricao}}</p>
                    <a href="{{route('ongs.show', $ong->id)}}"
                    class="border border-dark text-center btn btn-outline-dark border border-dark py-1 p-3 mx-auto d-block "
                    type="button" style="width:50%"> Conheça mais</a>
                </div>
                @endforeach
            </div>
    </div>