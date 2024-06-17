<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.app')] class extends Component {
    public LoginForm $form;
    public string $tipo = 'password';
    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }

    public function mostrarSenha(): void
    {
        if ($this->tipo == 'password') {
            $this->tipo = 'text';
        } else {
            $this->tipo = 'password';
        }
    }
}; ?>
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
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="form-signin w-100 mx-auto ">
        <img class="mx-auto d-block mt-5" src="{{ asset('img/logo2.png') }}" alt="dois rostos encostados" />

        <form wire:submit="login"
            class="p-4 mt-5 col-4 justify-content-center offset-md-4 bg-white shadow-lg p-3 mb-5 bg-body-tertiary rounded"
            style="height:350px"
            >
            <!-- Email Address -->
            <div class="form-floating mb-3 col-7 d-grid gap-2 mx-auto m-2">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full" type="email"
                    name="email" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="form-floating mb-3 col-7 d-grid gap-2 mx-auto">
                <x-input-label for="password" :value="__('Senha')" />

                <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full pr-10"
                    type="{{ $this->tipo }}" name="password" required autocomplete="new-password" />
                <button wire:click="mostrarSenha">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                        <svg class="h-6 w-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.5 12c2.264 4.5 7.736 4.5 10 0a18.222 18.222 0 01-10 0z"></path>
                        </svg>
                    </div>
                </button>

                <x-input-error :messages="$errors->get('senha')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember" class="form-check col-5 mx-auto">
                    <input wire:model="form.remember" id="remember" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Lembrar de mim') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4 d-block">
                @if (Route::has('password.request'))
                    <a class="col-5 d-grid gap-2 mx-auto" href="{{ route('password.request') }}" wire:navigate>
                        {{ __('Esqueceu sua senha?') }}
                    </a>
                @endif
                @if (Route::has('register'))
                    <a class="col-5 d-grid gap-2 mx-auto d-block" href="{{ route('register') }}" wire:navigate>
                        {{ __('Ainda não possui uma conta?') }}
                    </a>
                @endif

                <button type="submit" class="btn btn-outline-dark my-4 py-2 col-6 d-grid gap-2 mx-auto">
                    {{ __('Entrar') }}
                </button>
            </div>
    </div>

    </form>
</div>
