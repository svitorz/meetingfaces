<?php

namespace App\Livewire\Ongs\Admin;

use App\Models\Ong;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $component = true;
    public function getComponent(bool $componente)
    {
        if ($this->component !== $componente) {
            $this->component = $componente;
        }
    }
    public function render()
    {
        $ong = Ong::where('id_usuario', '=', Auth::user()->id)->first();

        return view('livewire.ongs.admin.dashboard', ['ong' => $ong])->extends('templates.template')->slot('content');
    }
}
