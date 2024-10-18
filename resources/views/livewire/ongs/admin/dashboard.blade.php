
<div>
    <style>
        #link-item:hover{
            text-decoration: underline; 
        }
    </style>
    <div class="col-2 border-end">
        <div class="flex justify-content-center align-items-center">
            <ul>
                <h2 class="text-primary">Menu</h2>
                <div class="ms-4 py-4">
                    <li class="border-bottom py-5">
                        <a href="" class="text-black text-decoration-none" id="link-item">Moradores cadastrados</a>
                    </li>
                    <li class="border-bottom py-5">
                        <a href="" class="text-black text-decoration-none" id="link-item">Comentários</a>
                    </li>
                </div>
                <h2 class="text-primary">Configurações</h2>
                <div class="ms-4">
                    <li class="border-bottom py-5">
                        <a href="{{route('ongs.edit')}}" class="text-black text-decoration-none" id="link-item">Editar ONG</a>
                    </li>
                    <li class="border-bottom py-5">
                        <a href="{{route('ongs.destroy')}}" class="text-danger text-decoration-none" id="link-item">Excluir ONG</a>
                    </li>
                </div>
            </ul>
        </div>
    </div>
    <div class="col-10">

    </div>
</div>