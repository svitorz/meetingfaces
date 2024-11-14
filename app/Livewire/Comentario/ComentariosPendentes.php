<?php

namespace App\Livewire\Comentario;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Comentario;

use function Livewire\Volt\mount;

class ComentariosPendentes extends Component
{
    public $comentarios = [];

    public function mount(): void
    {
        $this->comentarios = (new Comentario)->getComentariosPendentes(Auth::id());
    }
    public function aprovar(int $id_comentario): void

    {
        $comentario = Comentario::findOrFail($id_comentario);
        $comentario->situacao = 'aprovado';
        $comentario->save();
        $this->mount();
    }

    public function excluir(int $id_comentario): void
    {
        $comentario = Comentario::findOrFail($id_comentario);
        $comentario->situacao = 'reprovado';
        $comentario->save();
        $this->mount();
    }
    public function render()
    {
        return view('livewire.comentario.comentarios-pendentes');
    }
}
