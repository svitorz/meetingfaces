<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.app')] class extends Component {
    public string $nome = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public string $data_nasc = '';
    public string $telefone = '';
    public string $tipo = 'password';
    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'data_nasc' => ['required'],
            'telefone' => ['required'],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }

    public function mostrarpassword()
    {
        if ($this->tipo == 'password') {
            $this->tipo = 'text';
        } else {
            $this->tipo = 'password';
        }
    }
}; 
?>
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
    <div class="form-signin w-100 m-auto ">
        <a href="/">
            <img class="mx-auto d-block mt-5" src="{{asset('img/logo2.png')}}" alt="dois rostos encostados">
        </a>
        <form wire:submit="register" class="p-4 mt-5 col-4 offset-md-4 bg-white shadow-lg p-3 mb-5 bg-body-tertiary rounded" style="height:650px">
        <!-- Name -->
        <div >
            <x-input-label for="nome" :value="__('Nome')" />
            <x-text-input wire:model="nome" id="nome" class="block mt-1 w-full" type="text" name="nome" required
                autofocus autocomplete="nome" />
            <x-input-error :messages="$errors->get('nome')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!-- Data de nascimento -->
        <div class="mt-4">
            <x-input-label for="data_nasc" :value="__('Data de nascimento')" />
            <x-text-input wire:model="data_nasc" id="data_nasc" class="block mt-1 w-full" type="date"
                name="data_nasc" required />
            <x-input-error :messages="$errors->get('data_nasc')" class="mt-2" />
        </div>


        <!-- telefone -->
        <div class="mt-4">
            <x-input-label for="telefone" :value="__('Telefone')" />
            <x-text-input wire:model="telefone" id="telefone" class="block mt-1 w-full" type="text"
                x-mask="(99) 99999-9999" name="telefone" required />
            <x-input-error :messages="$errors->get('telefone')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 relative">
            <x-input-label for="password" :value="__('Senha')" />

            <x-text-input wire:model="password" id="password" class="block mt-1 w-full pr-10"
                type="{{ $this->tipo }}" name="password" required autocomplete="new-password" />
            <button wire:click="mostrarpassword">
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

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm password -->
        <div class="mt-4 relative">
            <x-input-label for="password_confirmation" :value="__('Confirmar senha')" />

            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full pr-10"
                type="{{ $this->tipo }}" name="password_confirmation" required autocomplete="new-password" />
            <button wire:click="mostrarpassword">
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                    <svg class="h-6 w-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.5 12c2.264 4.5 7.736 4.5 10 0a18.222 18.222 0 01-10 0z"></path>
                    </svg>
                </div>
            </button wire:click>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="col-5 d-grid gap-2 mx-auto "
                href="{{ route('login') }}" wire:navigate>
                {{ __('Já possui uma conta?') }}
            </a>

            <button type="submit" class="btn btn-outline-dark  py-2 col-6 d-grid gap-2 mx-auto">
                {{ __('Registrar') }}
            </button type="submit">
        </div>
    </form>
</div>
