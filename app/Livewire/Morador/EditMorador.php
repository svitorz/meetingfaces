<?php

namespace App\Livewire\Morador;

use Livewire\Component;

class EditMorador extends Component
{
    public function render()
    {
        return view('livewire.morador.edit-morador')
            ->extends('templates.template')
            ->slot('content');
    }
}
