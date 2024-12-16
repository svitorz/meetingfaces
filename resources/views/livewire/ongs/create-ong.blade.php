@extends('templates.template')

@section('content')
<div class="ly d-flex align-items-center py-4 bg-body-white">
    {{-- session messages --}}
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="m-auto">
        <img class="mx-auto d-block mt-5" src="{{ asset('img/logo2.png') }}" alt="dois rostos encostados" />
        @if(session('msg'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{session('msg')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <form class="space-y-2 mx-auto d-block p-5 mt-5 bg-white shadow-lg mb-5 bg-body-tertiary rounded" @if($editing)
            action="{{route('ongs.update',['ong'=>$ong->id])}}" @else action="{{route('ongs.store')}}" method="POST">
            @csrf
            <div class="row">

                <div class=" mb-3 col-lg-3 col-md-12  ">
                    <x-input-label for="nome_completo" :value="__('Nome Fantasia')" />
                    <x-text-input placeholder="Instituição Exemplo" wire:model="nome_completo" id="nome_completo"
                        class="tw-block tw-mt-1 tw-w-full" type="text" name="nome_completo" required />
                    <x-input-error :messages="$errors->get('nome_completo')" class="mt-2" />
                </div>

                <div class=" mb-3 col-lg-3 col-md-12  ">
                    <x-input-label for="sigla" :value="__('Sigla')" />
                    <x-text-input placeholder="IEM" wire:model="sigla" id="sigla" class="tw-block tw-mt-1 tw-w-full"
                        type="text" name="sigla" required />
                    <x-input-error :messages="$errors->get('sigla')" class="mt-2" />
                </div>

                <div class=" mb-3 col-lg-3 col-md-12">
                    <x-input-label for="tipo_organizacao" :value="__('Tipo de organização')" />
                    <select name="tipo_organizacao" id="tipo_organizacao" wire:model="tipo_organizacao">
                        <option selected>Selecione um tipo</option>
                        <option value="ONG">Ong</option>
                        <option value="Instituição">Instituição</option>
                    </select>
                    <x-input-error :messages="$errors->get('tipo_organizacao')" class="mt-2" />
                </div>
                <div class=" mb-3 col-lg-3 col-md-12  ">
                    <x-input-label for="data_fundacao" :value="__('Data de fundação')" />
                    <x-text-input wire:model="data_fundacao" id="data_fundacao" class="tw-block tw-mt-1 tw-w-full"
                        type="date" name="data_fundacao" required />
                    <x-input-error :messages="$errors->get('data_fundacao')" class="mt-2" />
                </div>
                <div class=" mb-3 col-12">
                    <x-input-label for="descricao" :value="__('Descrição')" />
                    <textarea wire:model="descricao" placeholder="Descreva em até 1024 caracteres a sua organização."
                        name="descricao" id="descricao" class="tw-block tw-mt-1 tw-w-full form-control"
                        required></textarea>
                    <x-input-error :messages="$errors->get('descricao')" class="mt-2" />
                </div>
            </div>

            <div class="row">
                <div class=" mb-3 col-lg-4 col-md-12  ">
                    <x-input-label for="telefone" :value="__('Telefone')" />
                    <x-text-input placeholder="(99)99999-9999" wire:model="telefone" id="telefone"
                        class="tw-block tw-mt-1 tw-w-full" type="text" x-mask="(99)99999-9999" name="telefone"
                        required />
                    <x-input-error :messages="$errors->get('telefone')" class="mt-2" />
                </div>

                <div class="col-lg-4 col-md-12">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input placeholder="usuario@gmail.com" wire:model="email" id="email"
                        class="tw-block tw-mt-1 tw-w-full" type="email" name="email" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class=" mb-3 col-lg-4 col-md-12  ">
                    <x-input-label for="url" :value="__('Url do site (se houver)')" />
                    <x-text-input placeholder="organizacao.com.br" wire:model="url" id="url"
                        class="tw-block tw-mt-1 tw-w-full" type="url" name="url" />
                    <x-input-error :messages="$errors->get('url')" class="mt-2" />
                </div>
            </div>
            <div class="row">
                <div class=" col-lg-4 col-md-12  ">
                    <x-input-label for="cnpj" :value="__('Cnpj')" />
                    <x-text-input wire:model="cnpj" id="cnpj" class="tw-block tw-mt-1 tw-w-full" type="text" name="cnpj"
                        placeholder="99.999.999/9999-99" x-mask="99.999.999/9999-99" required />
                    <x-input-error :messages="$errors->get('cnpj')" class="mt-2" />
                </div>
            </div>

            <div class="row">
                <div class=" mb-3 col-lg-2 col-md-12 " x-data="{ cep: '' }">
                    <x-input-label for="cep" :value="__('Cep')" />
                    <div class="input-group mt-1">
                        <x-text-input placeholder="11111-1111" wire:model="cep" id="cep"
                            class="block w-full form-control" type="text" x-mask="99999-999" name="cep"
                            aria-describedby="searchButton" />
                        <button class="btn btn-light border border-l-0" type="button" id="searchButton"
                            wire:click="fetchApi" @click.prevent>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                            </svg>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('cep')" class="mt-2" />
                </div>

                <div class=" mb-3 col-lg-4 col-md-12">
                    <x-input-label for="rua" :value="__('Rua')" />
                    <x-text-input wire:model="rua" id="rua" class="tw-block tw-mt-1 tw-w-full" type="text" name="rua"
                        placeholder="Rua São Paulo" />
                    <x-input-error :messages="$errors->get('rua')" class="mt-2" />
                </div>

                <div class=" mb-3 col-lg-2 col-md-12 ">
                    <x-input-label for="numero" :value="__('Número')" />
                    <x-text-input wire:model="numero" id="numero" class="tw-block tw-mt-1 tw-w-full" type="number"
                        name="numero" placeholder="123" />
                    <x-input-error :messages="$errors->get('numero')" class="mt-2" />
                </div>


                <div class=" mb-3 col-lg-4 col-md-12 ">
                    <x-input-label for="bairro" :value="__('Bairro')" />
                    <x-text-input wire:model="bairro" id="bairro" class="tw-block tw-mt-1 tw-w-full" type="text"
                        name="bairro" placeholder="Centro" />
                    <x-input-error :messages="$errors->get('bairro')" class="mt-2" />
                </div>
            </div>
            <div class="row">
                <div class=" mb-3 col-lg-4 col-md-12 ">
                    <x-input-label for="cidade" :value="__('Cidade')" />
                    <x-text-input wire:model="cidade" id="cidade" class="tw-block tw-mt-1 tw-w-full" type="text"
                        name="cidade" placeholder="Campinas" />
                    <x-input-error :messages="$errors->get('cidade')" class="mt-2" />
                </div>

                <div class=" mb-3 col-lg-4 col-md-12 ">
                    <x-input-label for="estado" :value="__('Estado')" />
                    <x-text-input wire:model="estado" id="estado" class="tw-block tw-mt-1 tw-w-full" type="text"
                        name="estado" placeholder="São Paulo" />
                    <x-input-error :messages="$errors->get('estado')" class="mt-2" />
                </div>

                <div class=" mb-3 col-4  ">
                    <x-input-label for="pais" :value="__('Pais')" />
                    <x-text-input wire:model="pais" id="pais" class="tw-block tw-mt-1 tw-w-full" type="text" name="pais"
                        placeholder="Brasil" />
                    <x-input-error :messages="$errors->get('pais')" class="mt-2" />
                </div>
            </div>

            <div class="col mt-5">

                <button class="btn btn-outline-dark w-20 py-2 col-6 d-grid gap-2 mx-auto" type="submit">
                    @if($editing)
                    Editar
                    @else
                    Cadastrar
                    @endif
                </button>
            </div>

        </form>

    </div>
</div>
@endsection