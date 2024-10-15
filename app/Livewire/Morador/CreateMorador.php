<?php

namespace App\Livewire\Morador;

use App\Models\Morador;
use App\Models\Ong;
use App\Models\User;
use Illuminate\Routing\Redirector;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateMorador extends Component
{
    use WithFileUploads;

    #[Validate('max:50', message: 'Tamanho máximo de 50 caracteres')]
    public $nome_completo;

    #[Validate('max:100', message: 'Tamanho máximo de 100 caracteres')]
    public $cidade_atual;

    #[Validate('max:100', message: 'Tamanho máximo de 100 caracteres')]
    public $cidade_natal;

    #[Validate('max:50', message: 'Tamanho máximo de 50 caracteres')]
    public $nome_familiar_proximo;

    public $grau_parentesco;

    public $data_nasc;

    public $id_ong;

    protected Morador $morador;

    public bool $editing = false;

    public int $id_morador;

    #[Validate('image|max:1024', 'A imagem deve conter até 1mb')]
    public $profile_picture;

    public function __construct()
    {
        $this->id_ong = Ong::select('id')->where('id_usuario', '=', auth()->id())->value('id');
        $this->morador = new Morador;
    }

    public function mount($id = null): void
    {

        if (isset($id) && ! empty($id)) {
            $this->morador = Morador::findOrFail($id);
            /**
             * Método para permitir que apenas usuários administradores da ong
             * que o morador pertence possam editar seu registro.
             * */
            $ong = Ong::where('id_usuario', '=', auth()->id())
                ->where('id', '=', $this->morador->id_ong)
                ->exists();

            if (! $ong) {
                abort(401);
            }

            $this->id_morador = $this->morador->id;
            $this->nome_completo = $this->morador->nome_completo;
            $this->cidade_atual = $this->morador->cidade_atual;
            $this->cidade_natal = $this->morador->cidade_natal;
            $this->nome_familiar_proximo = $this->morador->nome_familiar_proximo;
            $this->grau_parentesco = $this->morador->grau_parentesco;
            $this->data_nasc = $this->morador->data_nasc;
            $this->profile_picture = $this->morador->profile_picture;
            $this->editing = true;
        }
    }

    public function update(): Redirector
    {
        if (empty($this->profile_picture)) {
            $name = md5($this->profile_picture.microtime()).'.'.$this->profile_picture->extension();
            $this->profile_picture->storeAs('photos', $name);
        } else {
            $name = 'user.png';
        }
        $this->morador::where('id', '=', $this->id_morador)->update([
            'nome_completo' => $this->nome_completo,
            'cidade_atual' => $this->cidade_atual,
            'cidade_natal' => $this->cidade_natal,
            'nome_familiar_proximo' => $this->nome_familiar_proximo,
            'grau_parentesco' => $this->grau_parentesco,
            'data_nasc' => $this->data_nasc,
            'profile_picture' => $name,
        ]);
        session()->flash('msg', 'Cadastro atualizado com sucesso.');

        return redirect()->to(route('morador.show', ['id' => $this->id_morador]));
    }

    public function create(): Redirector
    {
        $this->validate();
        if (empty($this->profile_picture)) {
            $name = md5($this->profile_picture.microtime()).'.'.$this->profile_picture->extension();
            $this->profile_picture->storeAs('photos', $name);
        } else {
            $name = 'user.png';
        }
        $id = $this->morador::create([
            'nome_completo' => $this->nome_completo,
            'cidade_atual' => $this->cidade_atual,
            'cidade_natal' => $this->cidade_natal,
            'nome_familiar_proximo' => $this->nome_familiar_proximo,
            'grau_parentesco' => $this->grau_parentesco,
            'data_nasc' => $this->data_nasc,
            'id_ong' => $this->id_ong,
            'profile_picture' => $name,
        ]);

        return redirect()->route('morador.show', ['id' => $id])->with(session()->flash('msg', 'Morador cadastrado com sucesso!'));
    }

    public function render()
    {
        $user = User::find(auth()->id());
        if ($user->permissao != 'admin') {
            return abort(401);
        }

        return view('livewire.morador.create')
            ->extends('templates.template')
            ->slot('content');
    }
}
