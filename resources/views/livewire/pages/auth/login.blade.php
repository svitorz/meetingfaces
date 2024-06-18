<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
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

    public function mostrarSenha()
    {
        if ($this->tipo != 'password') {
            $this->tipo = 'password';
        } else {
            $this->tipo = 'text';
        }
    }
}; ?>
<div>
    <div class="p-4 mt-5 col-4 justify-content-center offset-md-4 bg-white shadow-lg p-3 mb-5 bg-body-tertiary rounded"
        style="height:350px">
        <form wire:submit="login">
            <!-- Email Address -->
            <div class="form-floating col-7 d-grid gap-2 mx-auto">
                <x-text-input wire:model="form.email" id="email" class="form-control block mt-1 w-full" type="email"
                    name="email" required autofocus autocomplete="Email" placeholder="Email" />
                <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
                <x-input-label for="email" :value="__('Email')" />
            </div>

            <!-- Password -->
            <div class="form-floating mb-3 col-7 d-grid gap-2 mx-auto">
                <x-text-input wire:model="form.password" id="password" class="form-control block mt-1 w-full pr-10"
                    type="{{ $this->tipo }}" name="password" required autocomplete="password" placeholder="Senha" />
                <x-input-label for="password" :value="__('Senha')" />
                <x-input-error :messages="$errors->get('senha')" class="mt-2" />


                <button wire:click="mostrarSenha" type="button">
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
</div>
