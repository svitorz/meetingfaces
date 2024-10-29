<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<header>
    <div class="navbar navbar-expand-lg">
        <div class="container-fluid d-flex align-items-center justify-content-around">
            <div>
                <div class="d-flex justify-content-center align-items-center">
                    <a href="{{ route('welcome') }}" class="navbar-brand">
                        <img style="width: 9.375em; height: 8.125em;" src="{{asset('img/logo1.png')}}"
                            alt="Meeting Faces">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#itensColapsaveis" aria-controls="itensColapsaveis" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
            <div>
                <div class="collapse navbar-collapse" id="itensColapsaveis">
                    <ul class="nav mb-2 ps-5">
                        <li class="nav-item"><a href="{{ route('welcome') }}"
                                class="nav-link link-body-emphasis px-2 active text-dark" aria-current="page">Início</a>
                        </li>
                        <li class="nav-item"><a href="{{ route('dashboard') }}"
                                class="nav-link link-body-emphasis px-2 text-dark">Encontros</a>
                        </li>
                        <li class="nav-item"><a href="{{route('ongs.doacao')}}"
                                class="nav-link link-body-emphasis px-2 text-dark">Doações</a>
                        </li>
                        <li class="nav-item"><a href="{{route('sobre_nos')}}"
                                class="nav-link link-body-emphasis px-2 text-dark">Sobre
                                nós</a>
                        </li>
                        <li class="nav-item"><a href="{{route('some_nos')}}"
                                class="nav-link link-body-emphasis px-2 text-dark">
                                Some a nós
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div>
                <div class="collapse navbar-collapse" id="itensColapsaveis">
                    @guest
                    <a href="{{route('login')}}" type="button" class="btn btn-outline-dark me-2">Login</a>
                    <a href="{{route('register')}}" type="button"
                        class="btn btn-outline-dark px-2 ms-1">Cadastrar-se</a>
                    @endguest
                    @auth
                    <x-dropdown align="right" width="24">
                        <x-slot name="trigger">
                            <button
                                class="tw-inline-flex tw-items-center tw-px-3 tw-py-2 tw-border tw-border-transparent tw-text-sm tw-leading-4 tw-font-medium tw-rounded-md tw-text-gray-500 tw-bg-white tw-hover:text-gray-700 tw-focus:outline-none tw-transition tw-ease-in-out tw-duration-150">
                                <div x-data="{{ json_encode(['name' => auth()->user()->nome]) }}" x-text="name"
                                    x-on:profile-updated.window="name = $event.detail.name"></div>

                                <div class="tw-ms-1">
                                    <svg class="tw-fill-current tw-h-2 tw-w-2" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile')" wire:navigate>
                                {{ __('Perfil') }}
                            </x-dropdown-link>

                            @if(auth()->user()->permissao === "admin")
                            <x-dropdown-link :href="route('ongs.dashboard')" wire:navigate>
                                {{__('Painel')}}
                            </x-dropdown-link>
                            @endif

                            <!-- Authentication -->
                            <button wire:click="logout();" type="button" class="tw-w-full tw-text-start">
                                <x-dropdown-link>
                                    {{ __('Sair') }}
                                </x-dropdown-link>
                            </button>
                        </x-slot>
                    </x-dropdown>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</header>
