<div class="container-fluid">
    <div class="flex justify-center mt-10 pt-10">
        <form wire:submit="create" method="post">
            <div>
                <x-input-label for="comentario" :value="__('Comentário')" />
                <textarea wire:model="comentario" type="text" name="comentario" id="comentario"
                    class="w-full border shadow-sm bg-body-light rounded mb-4" style="width: 600px;height:50px" required>
                </textarea>
            </div>
            <button type="submit" class="btn btn-outline-dark mx-auto d-block" style="width:200px;">
                Enviar
            </button>
        </form>
    </div>
</div>
