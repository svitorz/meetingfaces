<?php

namespace App\Livewire\Ongs;

use Livewire\Component;

class Doacao extends Component
{
    public function render()
    {
        return view('livewire.ongs.doacao')
            ->extends('templates.template')
            ->slot('content');
    }
}
