<?php

namespace App\Livewire\Morador;

use App\Models\Morador;
use Livewire\Component;

class SearchBox extends Component
{
    public $name = '';
    public $cidades = [];

    public function mount(): void
    {
        $this->cidades[0] = "Cidades";
        $this->cidades = Morador::select('cidade_atual')->distinct()->get();
    }

    public function render()
    {
        return view('livewire.morador.search-box')->extends('templates.template')->slot('content');
    }
}
