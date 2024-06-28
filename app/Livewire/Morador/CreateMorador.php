<?php

namespace App\Livewire\Morador;

use App\Models\Morador;
use Illuminate\Routing\Redirector;
use App\Models\Ong;
use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateMorador extends Component
{
    #[Validate('max:50', message: "Tamanho máximo de 50 caracteres")]
    public $nome_completo;

    #[Validate('max:100', message: "Tamanho máximo de 100 caracteres")]
    public $cidade_atual;

    #[Validate('max:100', message: "Tamanho máximo de 100 caracteres")]
    public $cidade_natal;

    #[Validate('max:50', message: "Tamanho máximo de 50 caracteres")]
    public $nome_familiar_proximo;

    public $grau_parentesco;

    public $data_nasc;

    public $id_ong;

    protected Morador $morador;

    public bool $editing = false;

    public int $id_morador;

    public function __construct()
    {
        $this->morador = new Morador;
    }

    public function mount($id = null): void
    {
        $this->id_ong = Ong::select('id')->where('id_usuario', '=', auth()->id())->value('id');

        if (isset($id) && !empty($id)) {
            $this->morador = Morador::findOrFail($id);
            /**
             * Método para permitir que apenas usuários administradores da ong
             * que o morador pertence possam editar seu registro.
             * */
            $ong = Ong::where('id_usuario', '=', auth()->id())
                ->where('id', '=', $this->morador->id_ong)
                ->exists();

            if (!$ong) {
                abort(401);
            }

            $this->id_morador = $this->morador->id;
            $this->nome_completo = $this->morador->nome_completo;
            $this->cidade_atual = $this->morador->cidade_atual;
            $this->cidade_natal = $this->morador->cidade_natal;
            $this->nome_familiar_proximo = $this->morador->nome_familiar_proximo;
            $this->grau_parentesco = $this->morador->grau_parentesco;
            $this->data_nasc = $this->morador->data_nasc;
            $this->editing = true;
        }
    }

    public function update(): Redirector
    {
        $this->morador::where('id', '=', $this->id_morador)->update([
            'nome_completo' => $this->nome_completo,
            'cidade_atual' => $this->cidade_atual,
            'cidade_natal' => $this->cidade_natal,
            'nome_familiar_proximo' => $this->nome_familiar_proximo,
            'grau_parentesco' => $this->grau_parentesco,
            'data_nasc' => $this->data_nasc
        ]);
        session()->flash('msg', 'Cadastro atualizado com sucesso.');

        return redirect()->to(route('morador.show', ['id' => $this->id_morador]));
    }

    public function create(): Redirector
    {
        $this->validate();

        $id = $this->morador::create([
            'nome_completo' => $this->nome_completo,
            'cidade_atual' => $this->cidade_atual,
            'cidade_natal' => $this->cidade_natal,
            'nome_familiar_proximo' => $this->nome_familiar_proximo,
            'grau_parentesco' => $this->grau_parentesco,
            'data_nasc' => $this->data_nasc,
            'id_ong' => $this->id_ong,
        ]);

        return redirect()->route('morador.show', ['id' => $id]);
    }
    public function render()
    {
        $user = User::find(auth()->id());
        if ($user->permissao != "admin") {
            return abort(401);
        }

        return view('livewire.morador.create')
            ->extends('templates.template')
            ->slot('content');
    }
}