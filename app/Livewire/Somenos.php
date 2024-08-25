<?php

namespace App\Livewire;

use Livewire\Component;

class Somenos extends Component
{
    public function render()
    {
        //comentario adicionado com neovim
        return view('livewire.somenos')->extends('templates.template')->slot('content');
    }
}
