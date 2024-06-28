<?php

namespace App\Livewire;

use Livewire\Component;

class SobreNos extends Component
{
    public function render()
    {
        return view('livewire.sobre-nos')->extends('templates.template')->slot('content');
    }
}
