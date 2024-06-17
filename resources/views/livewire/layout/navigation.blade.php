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

<header class="py-3 text-bg-white" style="width: auto;height: 9.375em;">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-around ">
            <a href="{{ route('welcome') }}" class=" align-items-center mb-2  text-white ">
                <img style="width: 9.375em; height: 8.125em;" src="{{asset('img/logo1.png')}}" alt="Meeting Faces">
            </a>

            <ul class="nav col-12 col-lg-auto  mb-2 ps-5">
                <li class="nav-item"><a href="{{ route('welcome') }}"
                        class="nav-link link-body-emphasis px-2 active text-dark" aria-current="page">Início</a></li>
                <li class="nav-item"><a href="{{ route('dashboard') }}"
                        class="nav-link link-body-emphasis px-2 text-dark">Encontros</a>
                </li>
                <li class="nav-item"><a href="{{route('ongs.doacao')}}" class="nav-link link-body-emphasis px-2 text-dark">Doações</a>
                </li>
                <li class="nav-item">
                    <a href="fale-conosco.php" class="nav-link link-body-emphasis px-2 text-dark">
                        Fale conosco
                    </a>
                </li>
                <li class="nav-item"><a href="sobre-nos.php" class="nav-link link-body-emphasis px-2 text-dark">Sobre
                        nós</a>
                </li>
                <li class="nav-item"><a href="some-nos.php" class="nav-link link-body-emphasis px-2 text-dark">
                    Some a nós
                </a>
                </li>
                <li class="d-flex justify-content-center align-items-center">
                    <a class="link-secondary" href="encontros.php" aria-label="Search">
                        <svg xmlns="http://www.w3.org/2000/svg" style="width: 1.25em; height: 1.25em;" fill="none"
                            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            class="mx-3" role="img" viewBox="0 0 24 24">
                            <title>Search</title>
                            <circle cx="10.5" cy="10.5" r="7.5" />
                            <path d="M21 21l-5.2-5.2" />
                        </svg>
                    </a>
                </li>
            </ul>

            <div class="justify-content-end">
                @guest
                    <a href="{{route('login')}}" type="button" class="btn btn-outline-dark me-2">Login</a>
                    <a href="{{route('register')}}" type="button" class="btn btn-outline-dark px-2 ms-1">Cadastrar-se</a>
                @endguest
                
                @auth
                <x-dropdown align="right" width="24">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div x-data="{{ json_encode(['name' => auth()->user()->nome]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>

                            <div class="ms-1">
                                <svg class="fill-current h-2 w-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
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
                        <button wire:click="logout" class="w-full text-start">
                            <x-dropdown-link>
                                {{ __('Sair') }}
                            </x-dropdown-link>
                        </button>
                    </x-slot>
                </x-dropdown>
            @endauth
            </div>
        </div>
</header>
