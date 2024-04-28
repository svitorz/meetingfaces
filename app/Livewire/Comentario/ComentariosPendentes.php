<?php

namespace App\Livewire\Comentario;

use Livewire\Component;
use App\Models\Comentario;

class ComentariosPendentes extends Component
{
    public $comentarios = '';
    public String $id_usuario;
    
    public function __construct()
    {
        $this->id_usuario = auth()->id();
    }

    public function mount()
    {
        $this->comentarios = Comentario::
        select('moradores.nome_completo','moradores.id as id_morador','comentarios.comentario','comentarios.id as id_comentario')
        ->join('moradores','moradores.id','=','comentarios.id_morador')
        ->join('ongs','ongs.id','=','moradores.id_ong')
        ->where('comentarios.situacao','=','pendente')
        ->where('ongs.id_usuario','=',$this->id_usuario)
        ->get();
    }
    public function render()
    {
        return view('livewire.comentario.comentarios-pendentes')
        ->extends('templates.template')
        ->slot('content');
    }

    public function aprovar(int $id_comentario)
    {
        $comentario = Comentario::find($id_comentario);
        $comentario->situacao =  'aprovado';
        $comentario->save();
        return redirect()->to(route('comentarios.pendentes'));
    }

    public function excluir(int $id_comentario)
    {
        $comentario = Comentario::find($id_comentario);
        $comentario->situacao =  'reprovado';
        $comentario->save();
        return redirect()->to(route('comentarios.pendentes'));
    }
}
