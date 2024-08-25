<?php

namespace App\Livewire\Morador;

use App\Models\Morador;
use App\Models\Ong;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ListarTodos extends Component
{
    public $moradores;
    public function mount()
    {
        $id_ong = Ong::select('id')->where('id_usuario','=',auth()->id());
        $this->moradores = Morador::where('id_ong','=',$id_ong)->get();
    }

    public function render()
    {
        return view('livewire.morador.listar-todos')
        ->extends('templates.template')
        ->slot('content');
    }
}
