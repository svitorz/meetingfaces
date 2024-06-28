<?php

namespace App\Livewire;

use Livewire\Component;

class Somenos extends Component
{
    public function render()
    {
        return view('livewire.somenos')->extends('templates.template')->slot('content');
    }
}
