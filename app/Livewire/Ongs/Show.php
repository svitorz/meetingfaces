<?php

namespace App\Livewire\Ongs;

use Livewire\Component;

class Show extends Component
{
    public $ong;
    public function mount($id): void
    {
        $this->ong = \App\Models\Ong::findOrFail($id);
    }
    public function render()
    {
        return view('livewire.ongs.show')->extends('templates.template')->slot('content');
    }
}
