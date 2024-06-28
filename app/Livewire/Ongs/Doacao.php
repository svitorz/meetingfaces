<?php

namespace App\Livewire\Ongs;

use App\Models\Ong;
use Livewire\Component;

class Doacao extends Component
{
    public $ongs;
    public function mount(): void
    {
        $this->ongs = Ong::all();
    }
    public function render()
    {
        return view('livewire.ongs.doacao')
            ->extends('templates.template')
            ->slot('content');
    }
}
