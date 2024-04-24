<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
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
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'data_nasc' => ['required'],
            'telefone' => ['required'],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }

    public function mostrarpassword()
    {
        if($this->tipo == "password")
        {
            $this->tipo = "text";
        }else{
            $this->tipo = "password";
        }
    }
}; ?>

<div>
    <form wire:submit="register">
        <!-- Name -->
        <div>
            <x-input-label for="nome" :value="__('Nome')" />
            <x-text-input wire:model="nome" id="nome" class="block mt-1 w-full" type="text" name="nome" required autofocus autocomplete="nome" />
            <x-input-error :messages="$errors->get('nome')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!-- Data de nascimento -->
        <div class="mt-4">
            <x-input-label for="data_nasc" :value="__('Data de nascimento')"/>
            <x-text-input wire:model="data_nasc" id="data_nasc" class="block mt-1 w-full" type="date" name="data_nasc" required />
            <x-input-error :messages="$errors->get('data_nasc')" class="mt-2" />
        </div>

        
        <!-- telefone -->
        <div class="mt-4">
            <x-input-label for="telefone" :value="__('Telefone')"/>
            <x-text-input wire:model="telefone" id="telefone" class="block mt-1 w-full" type="text" x-mask="(99) 99999-9999" name="telefone" required />
            <x-input-error :messages="$errors->get('telefone')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 relative">
            <x-input-label for="password" :value="__('Senha')" />

            <x-text-input wire:model="password" id="password" class="block mt-1 w-full pr-10"
                            type="{{$this->tipo}}"
                            name="password"
                            required autocomplete="new-password" />
            <button wire:click="mostrarpassword">
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                    <svg class="h-6 w-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.5 12c2.264 4.5 7.736 4.5 10 0a18.222 18.222 0 01-10 0z"></path>
                    </svg>
                </div>
            </button>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm password -->
        <div class="mt-4 relative">
            <x-input-label for="password_confirmation" :value="__('Confirmar senha')" />

            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full pr-10"
                            type="{{$this->tipo}}"
                            name="password_confirmation" required autocomplete="new-password" />
            <button wire:click="mostrarpassword">
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                    <svg class="h-6 w-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.5 12c2.264 4.5 7.736 4.5 10 0a18.222 18.222 0 01-10 0z"></path>
                    </svg>
                </div>
            </button wire:click>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</div>
