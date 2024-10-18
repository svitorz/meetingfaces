<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
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

        public function mostrarSenha(): void
        {
            if ($this->tipo == 'password') {
                $this->tipo = 'text';
            } else {
                $this->tipo = 'password';
            }
        }
}; ?>

<div>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
    </head>
    <form wire:submit="register">
        <div class="mt-5 col-lg-4 col-sm-12 col-md-6 offset-md-4 bg-white shadow-lg p-3 mb-5 bg-body-tertiary rounded"
            style="height:650px">

            <!-- Name -->
            <div>
                <x-input-label for="nome" :value="__('Nome')" />
                <x-text-input wire:model="nome" id="nome" class="block mt-1 w-full" type="text" name="nome" required
                    autofocus autocomplete="nome" />
                <x-input-error :messages="$errors->get('nome')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required
                    autocomplete="username" />
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
                    x-mask="(99) 99999-9999" x-data name="telefone" required />
                <x-input-error :messages="$errors->get('telefone')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4 relative">
                <x-input-label for="password" :value="__('Senha')" />

                <x-text-input wire:model="password" id="password" class="block mt-1 w-full pr-10"
                    type="{{ $this->tipo }}" name="password" required autocomplete="new-password" />

                <button wire:click="mostrarSenha" x-data type="button">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                        @if ($this->tipo == 'password')
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                            <path
                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                        </svg>
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
                            <path
                                d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7 7 0 0 0 2.79-.588M5.21 3.088A7 7 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474z" />
                            <path
                                d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12z" />
                        </svg>
                        @endif
                    </div>
                </button>

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm password -->
            <div class="mt-4 relative">
                <x-input-label for="password_confirmation" :value="__('Confirmar senha')" />

                <x-text-input wire:model="password_confirmation" id="password_confirmation"
                    class="block mt-1 w-full pr-10" type="{{ $this->tipo }}" name="password_confirmation" required
                    autocomplete="new-password" />

                <button wire:click="mostrarSenha" x-data type="button">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                        @if ($this->tipo == 'password')
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                            <path
                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                        </svg>
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
                            <path
                                d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7 7 0 0 0 2.79-.588M5.21 3.088A7 7 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474z" />
                            <path
                                d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12z" />
                        </svg>
                        @endif
                    </div>
                </button>

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="col-5 d-grid gap-2 mx-auto " href="{{ route('login') }}">
                    {{ __('Já possui uma conta?') }}
                </a>

                <button type="submit" class="btn btn-outline-dark py-2 col-6 d-grid gap-2 mx-auto">
                    {{ __('Registrar') }}
                </button>
            </div>
        </div>
    </form>
</div>