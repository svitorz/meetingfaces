<style>
    .ly {
        font-family: 'Bitter', cursive;
    }

    a:hover {
        color: black;
    }

    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
    }

    .bi {
        vertical-align: -.125em;
        fill: currentColor;
    }

    .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
    }

    .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
    }

    .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
    }

    .bd-mode-toggle {
        z-index: 1500;
    }

    .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
    }
</style>
<div class="ly d-flex align-items-center py-4 bg-body-white">
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="m-auto" wire:ignore>
        <img class="mx-auto d-block mt-5" src="{{ asset('img/logo2.png') }}" alt="dois rostos encostados" />
        <form class=" mx-auto d-block p-5 mt-5 bg-white shadow-lg mb-5 bg-body-tertiary rounded"
            style="height:auto;width:1000px" x-data="{ formStep: 1 }" class="space-y-2" wire:submit="create">
            <div x-cloak x-show="formStep === 1">
                <div class="row">
                    <div class=" mb-3 col-3  ">
                        <x-input-label for="nome_completo" :value="__('Nome Fantasia')" />
                        <x-text-input placeholder="Instituição Exemplo" wire:model="nome_completo" id="nome_completo"
                            class="block mt-1 w-full" type="text" name="nome_completo" required />
                        <x-input-error :messages="$errors->get('nome_completo')" class="mt-2" />
                    </div>

                    <div class=" mb-3 col-3  ">
                        <x-input-label for="sigla" :value="__('Sigla')" />
                        <x-text-input placeholder="IEM" wire:model="sigla" id="sigla" class="block mt-1 w-full"
                            type="text" name="sigla" required />
                        <x-input-error :messages="$errors->get('sigla')" class="mt-2" />
                    </div>

                    <div class=" mb-3 col-3">
                        <x-input-label for="tipo_organizacao" :value="__('Tipo de organização')" />
                        <select name="tipo_organizacao" id="tipo_organizacao" wire:model="tipo_organizacao">
                            <option selected>Selecione um tipo</option>
                            <option value="ONG">Ong</option>
                            <option value="Instituição">Instituição</option>
                        </select>
                        <x-input-error :messages="$errors->get('tipo_organizacao')" class="mt-2" />
                    </div>
                    <div class=" mb-3 col-3  ">
                        <x-input-label for="data_fundacao" :value="__('Data de fundação')" />
                        <x-text-input wire:model="data_fundacao" id="data_fundacao" class="block mt-1 w-full"
                            type="date" name="data_fundacao" required />
                        <x-input-error :messages="$errors->get('data_fundacao')" class="mt-2" />
                    </div>
                    <div class=" mb-3 col-12">
                        <x-input-label for="descricao" :value="__('Descrição')" />
                        <textarea wire:model="descricao" placeholder="Descreva em até 1024 caracteres a sua organização." name="descricao"
                            id="descricao" class="block mt-1 w-full form-control" required></textarea>
                        <x-input-error :messages="$errors->get('descricao')" class="mt-2" />
                    </div>
                </div>
            </div>
            <div x-cloak x-show="formStep === 2">
                <div class="row">
                    <div class=" mb-3 col-4  ">
                        <x-input-label for="telefone" :value="__('Telefone')" />
                        <x-text-input placeholder="(99)99999-9999" wire:model="telefone" id="telefone"
                            class="block mt-1 w-full" type="text" x-mask="(99)99999-9999" name="telefone" required />
                        <x-input-error :messages="$errors->get('telefone')" class="mt-2" />
                    </div>

                    <div class="col-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input placeholder="usuario@gmail.com" wire:model="email" id="email"
                            class="block mt-1 w-full" type="email" name="email" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class=" mb-3 col-4  ">
                        <x-input-label for="url" :value="__('Url do site (se houver)')" />
                        <x-text-input placeholder="organizacao.com.br" wire:model="url" id="url"
                            class="block mt-1 w-full" type="url" name="url" />
                        <x-input-error :messages="$errors->get('url')" class="mt-2" />
                    </div>
                </div>
                <div class="row">
                    <div class=" col-4  ">
                        <x-input-label for="cnpj" :value="__('Cnpj')" />
                        <x-text-input wire:model="cnpj" id="cnpj" class="block mt-1 w-full" type="text"
                            name="cnpj" x-mask="99.999.999/9999-99" placeholder="99.999.999/9999-99"
                            pattern="([0-9]{2})[0-9]{5}-[0-9]{4}" required />
                        <x-input-error :messages="$errors->get('cnpj')" class="mt-2" />
                    </div>
                </div>
            </div>
            <div x-cloak x-show="formStep === 3">

                <div class="row">
                    <div class=" mb-3 col-2  ">
                        <x-input-label for="cep" :value="__('Cep')" />
                        <div class="input-group">
                            <x-text-input placeholder="11111-1111" wire:model="cep" id="cep"
                                class="block mt-1 w-full form-control" type="text" x-mask="99999-999"
                                name="cep" aria-describedby="searchButton" />
                            <button class="btn btn-light border" x-on:click="$wire.getCep" type="button" id="searchButton">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                </svg>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('cep')" class="mt-2" />
                    </div>

                    <div class=" mb-3 col-4  ">
                        <x-input-label for="rua" :value="__('Rua')" />
                        <x-text-input wire:model="rua" id="rua" class="block mt-1 w-full" type="text"
                            name="rua" />
                        <x-input-error :messages="$errors->get('rua')" class="mt-2" />
                    </div>

                    <div class=" mb-3 col-2  ">
                        <x-input-label for="numero" :value="__('Número')" />
                        <x-text-input wire:model="numero" id="numero" class="block mt-1 w-full" type="text"
                            name="numero" />
                        <x-input-error :messages="$errors->get('numero')" class="mt-2" />
                    </div>


                    <div class=" mb-3 col-4  ">
                        <x-input-label for="bairro" :value="__('Bairro')" />
                        <x-text-input wire:model="bairro" id="bairro" class="block mt-1 w-full" type="text"
                            name="bairro" />
                        <x-input-error :messages="$errors->get('bairro')" class="mt-2" />
                    </div>
                </div>
                <div class="row">
                    <div class=" mb-3 col-4  ">
                        <x-input-label for="cidade" :value="__('Cidade')" />
                        <x-text-input wire:model="cidade" id="cidade" class="block mt-1 w-full" type="text"
                            name="cidade" />
                        <x-input-error :messages="$errors->get('cidade')" class="mt-2" />
                    </div>

                    <div class=" mb-3 col-4  ">
                        <x-input-label for="estado" :value="__('Estado')" />
                        <x-text-input wire:model="estado" id="estado" class="block mt-1 w-full" type="text"
                            name="estado" />
                        <x-input-error :messages="$errors->get('estado')" class="mt-2" />
                    </div>

                    <div class=" mb-3 col-4  ">
                        <x-input-label for="pais" :value="__('Pais')" />
                        <x-text-input wire:model="pais" id="pais" class="block mt-1 w-full" type="text"
                            name="pais" />
                        <x-input-error :messages="$errors->get('pais')" class="mt-2" />
                    </div>
                </div>

            </div>
            <div class="col mt-5">
                <button class="btn btn-light" x-cloak x-show="formStep > 1" @click="formStep -= 1" type="button">
                    Voltar
                </button>
                <button class="btn btn-dark" x-cloak x-show="formStep < 3" @click="formStep += 1" type="button">
                    Próximo passo
                </button>
                <button class="btn btn-outline-dark w-20 py-2 col-6 d-grid gap-2 mx-auto" type="submit">
                    Cadastrar
                </button>
            </div>

        </form>

    </div>
</div>
