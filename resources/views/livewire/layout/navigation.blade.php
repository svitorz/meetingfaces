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
                <img style="width: 9.375em; height: 8.125em;" src="logo1.png" alt="Meeting Faces">
            </a>

            <ul class="nav col-12 col-lg-auto  mb-2 ps-5">
                <li class="nav-item"><a href="{{ route('welcome') }}"
                        class="nav-link link-body-emphasis px-2 active text-dark" aria-current="page">Início</a></li>
                <li class="nav-item"><a href="{{ route('dashboard') }}"
                        class="nav-link link-body-emphasis px-2 text-dark">Encontros</a>
                </li>
                <li class="nav-item"><a href="doacao.php" class="nav-link link-body-emphasis px-2 text-dark">Doações</a>
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
                <a href="{{route('profile')}}" type="button" class="btn btn-outline-dark px-2 ms-1">{{__(Auth()->user()->nome)}}</a>
                <button wire:click="logout" type="submit" class="btn btn-outline-dark px-2 ms-1">{{__('Sair')}}</button>
                @endauth
            </div>
        </div>
</header>
