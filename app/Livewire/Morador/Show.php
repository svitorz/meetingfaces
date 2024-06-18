<?php

namespace App\Livewire\Morador;

use Livewire\Component;
use App\Models\Morador;
use App\Models\Ong;
use Illuminate\Support\Facades\DB;

class Show extends Component
{
    public Morador $morador;
    public string $title = "Show morador";
    public $comentarios;
    public bool $isAdmin;

    public function mount(int $id)
    {
        $this->morador = Morador::find($id);

        $this->comentarios = DB::table('comentarios')
            ->select('comentario')
            ->where('situacao', '=', 'aprovado')
            ->where('id_morador', '=', $this->morador->id)
            ->get();

        $ong = Ong::where('id_usuario', '=', auth()->id())
            ->where('id', '=', $this->morador->id_ong)
            ->exists();

        if ($ong) {
            $this->isAdmin = true;
        } else {
            $this->isAdmin = false;
        }
    }

    public function render()
    {
        return view('livewire.morador.show', ['morador' => $this->morador])->extends('templates.template')->slot('content');
    }
}
