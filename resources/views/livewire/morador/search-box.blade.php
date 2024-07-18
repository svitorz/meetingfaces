<div class="d-flex justify-content-center p-2">
    <form class="col-6 mb-3 mb-2 me-3 ms-3" role="search" width="100px" action="{{ route('morador.find') }}"
        method="GET">
        <div class="input-group">
            <input type="search" class="form-control input-group form-control-dark text-bg-light border-end-0"
                placeholder="Pesquise..." aria-label="Search" name="name" wire:model="name">
                <button class="input-group-text border-0 border-top border-bottom" type="button" x-on:click="$wire.removeInputText()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                      </svg>
                </button>
                <select name="cidade" id="cidade" class="border">
                    <option value="" selecetd>Cidades</option>
                    @foreach ($cidades as $cidade)
                        <option value="{{ $cidade->cidade_atual }}">{{ $cidade->cidade_atual }}</option>
                    @endforeach
                </select>
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