<?php

namespace App\Livewire\Morador;

use App\Models\Morador;
use Illuminate\Routing\Redirector;
use App\Models\Ong;
use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{
    #[Validate('max:50', message:"Tamanho máximo de 50 caracteres")]
    public string $nome_completo;
    #[Validate('max:100', message:"Tamanho máximo de 100 caracteres")]
    public string $cidade_atual;
    #[Validate('max:100', message:"Tamanho máximo de 100 caracteres")]
    public string $cidade_natal;
    #[Validate('max:50', message:"Tamanho máximo de 50 caracteres")]
    public string $nome_familiar_proximo;
    
    public string $grau_parentesco;
    public string $data_nasc;
    public int $id_ong;
    public function __construct()
    {
        $this->id_ong = Ong::select('id')->where('id_usuario','=',auth()->id())->first()->id;
    } 


    public function create(): Redirector
    {   
        $user = User::find(auth()->id());
        
        if($user->permissao != "admin"){
            return abort(401);
        }

        $id_morador = Morador::create([
            'nome_completo' => $this->nome_completo,
            'cidade_atual' => $this->cidade_atual,
            'cidade_natal' => $this->cidade_natal,
            'nome_familiar_proximo' => $this->nome_familiar_proximo,
            'grau_parentesco' => $this->grau_parentesco,
            'data_nasc' => $this->data_nasc,
            'id_ong' => $this->id_ong,
        ]);

        return redirect()->route('morador.show', ['id' => $id_morador]);
    }
    public function render()
    {
        return view('livewire.morador.create')
        ->extends('templates.template')
        ->slot('content');
    }
}
