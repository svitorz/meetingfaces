<?php

namespace App\Livewire\Morador;

use Livewire\Component;
use App\Models\Morador;
use Illuminate\Support\Facades\DB;

class Show extends Component
{
    public Morador $morador;
    public string $title = "Show morador";
    public $comentarios;

    public function mount(int $id)
    {
        $this->morador = Morador::find($id);
        $this->comentarios = DB::table('comentarios')
        ->select('comentario')
        ->where('situacao','=','aprovado')
        ->where('id_morador','=',$this->morador->id)
        ->get();
    }
    /* TODO: Método para verificar se o usuario é admin e pode ver os botões. */
    public function isAdmin(): bool
    {
        if(auth()->id){
            return true;

        }
    }
    public function render()
    {
        return view('livewire.morador.show',['morador' => $this->morador]);
    }
}
