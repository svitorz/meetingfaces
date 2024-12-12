<?php

namespace App\Livewire\Ongs;

use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        return view('livewire.ongs.show')->extends('templates.template')->slot('content');
    }
}
