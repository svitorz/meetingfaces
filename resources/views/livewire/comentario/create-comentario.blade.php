<div class="container-fluid">
    <div class="flex justify-center mt-10 pt-10">
        <form wire:submit="create" method="post">
            <div>
                <x-input-label for="comentario" :value="__('Comentario')"/>
                <x-text-input 
                wire:model="comentario" type="text" name="comentario"
                id="comentario" class="w-full"  required
                />
            </div>
            <button type="submit" class="mt-4 rounded p-4 bg-blue-900 hover:bg-blue-400 text-white hover:text-gray-500">
                Enviar
            </button>
        </form>
    </div>
</div>