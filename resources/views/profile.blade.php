<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Profile') }}
    </h2>
</x-slot>
@extends('templates.template')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <livewire:profile.update-profile-information-form />
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <livewire:profile.update-password-form />
            </div>
        </div>
        @if (auth()->user()->permissao == 'comum')
        <div class="tw-p-4 sm:tw-p-8 tw-bg-white tw-shadow sm:tw-rounded-lg">
            <div class="tw-max-w-xl">
                <a href="{{ route('ongs.create') }}">
                    <x-primary-button>
                        Cadastre sua ONG
                    </x-primary-button>
                </a>
            </div>
        </div>
        @else
        @php
             $id_ong = \App\Models\Ong::select('id')->where('id_usuario','=',auth()->user()->id)->first();
        @endphp
        <div class="tw-p-4 sm:tw-p-8 tw-bg-white tw-shadow sm:tw-rounded-lg">
            <div class="tw-max-w-xl">
                <a href="{{ route('ongs.edit',
                        ['id' => $id_ong])}}">
                    <x-primary-button>
                        Edite as informações da sua ONG
                    </x-primary-button>
                </a>
            </div>
        </div>
        @endif
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <livewire:profile.delete-user-form />
            </div>
        </div>
    </div>
</div>
@endsection
