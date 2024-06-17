<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink($this->only('email'));

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));

            return;
        }

        $this->reset('email');

        session()->flash('status', __($status));
    }
}; ?>


<div class="ly d-flex align-items-center py-4 bg-body-white">

    <div class="form-signin w-100 mx-auto ">
        <img class="mx-auto d-block mt-5" src="{{asset('img/logo2.png')}}" alt="dois rostos encostados">
        <form
            class="p-4 mt-5 col-4 justify-content-center offset-md-4 bg-white shadow-lg p-2 mb-5 bg-body-tertiary rounded"
            style="height:325px;">
            <p class="text-center">Insira o email da conta
                cadastrada e nós enviaremos um email à você com um link para que ao clicar
                você escolha sua nova senha!
            </p>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form wire:submit="sendPasswordResetLink">
                <!-- Email Address -->
                <div class=" mb-3 col-7 d-grid gap-2 mx-auto m-2">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email"
                        name="email" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="submit" class="btn btn-outline-dark py-2 col-6 d-grid gap-2 mx-auto">
                        {{ __('Link para email de redefenir senha') }}
                    </button >
                </div>
            </form>
    </div>
