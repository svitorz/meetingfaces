<?php

namespace App\Livewire\Morador;

use App\Models\Morador;
use App\Models\Ong;
use App\Models\User;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateMorador extends Component
{
    public function render()
    {
        $user = User::find(Auth::id());
        if ($user->permissao != 'admin') {
            return abort(401);
        }

        return view('livewire.morador.create')
            ->extends('templates.template')
            ->slot('content');
    }
}
