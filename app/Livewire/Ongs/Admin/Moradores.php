<?php

namespace App\Livewire\Ongs\Admin;

use App\Models\Morador;
use App\Models\Ong;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Moradores extends Component
{
    // public $moradores;
    // public function mount()
    // {
    // }
    public function render()
    {
        $authUser = Auth::user()->id;
        $ongId = Ong::where('id_usuario', $authUser)->first()->id;
        $moradores = Morador::where('id_ong', $ongId)->paginate(12);
        return view('livewire.ongs.admin.moradores', compact('moradores'));
    }
}
