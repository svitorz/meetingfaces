<?php

namespace App\Livewire\Comentario;

use App\Models\Comentario;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateComentario extends Component
{
    #[Validate('required|max:1024')]
    public String $comentario;
    #[Validate('required')]
    public int $id_morador;
    #[Validate('required')]
    public int $id_usuario;

    public $id;

    public function __construct()
    {
        $this->id_usuario = auth()->id();
    }
    public function mount(int $id)
    {
        $this->id_morador = $id;
         
    }
    public function create()
    {
        Comentario::create([
            'comentario' => $this->comentario,
            'id_usuario' => $this->id_usuario,
            'id_morador' => $this->id_morador,
        ]);
        session()->flash('status', 'Comentario enviado com sucesso.');   
        return redirect()->to(route('morador.show',['id' => $this->id_morador]));
    }

    public function render()
    {
        return view('livewire.comentario.create-comentario',['id' => $this->id_morador]);
    }
}
