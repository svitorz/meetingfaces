<?php

namespace App\Livewire\Ongs;

use App\Models\Ong;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateOng extends Component
{
    public string $title = 'Cadastrar Ong';

    public int $id_ong;

    #[Validate('required', message: 'Insira o nome da sua ONG')]
    public string $nome_completo;

    #[Validate('required|min:3', message: 'Insira uma sigla para sua ONG')]
    public string $sigla;

    #[Validate('max:256')]
    public string $parcerias;

    #[Validate('required', message: 'Insira a data de fundação da sua ONG')]
    public string $data_fundacao;

    #[Validate('required')]
    public string $tipo_organizacao;

    #[Validate('required', message: 'Insira uma descrição sobre sua ONG')]
    public string $descricao;

    #[Validate('required|unique:ongs,cnpj', message: 'Insira o CNPJ da sua ONG')]
    public string $cnpj;

    #[Validate('required')]
    public string $email;

    #[Validate('required|unique:ongs,telefone')]
    public string $telefone;

    #[Validate('required')]
    public string $url;

    #[Validate('required')]
    public string $cep;

    #[Validate('required')]
    public string $numero;

    #[Validate('required')]
    public string $rua;

    #[Validate('required')]
    public string $cidade;

    #[Validate('required')]
    public string $bairro;

    #[Validate('required')]
    public string $estado;

    #[Validate('required')]
    public string $pais;

    #[Validate('max:1')]
    public int $id_usuario;

    public bool $editing = false;

    public function __construct()
    {
        $this->id_usuario = Auth::id();
    }

    public function boot(): void
    {
        $hasIdOnOngs = DB::table('ongs')
            ->where('id_usuario', '=', $this->id_usuario)
            ->exists();
        if ($hasIdOnOngs) {
            abort(401);
        }
    }

    public function fetchApi()
    {
        $cep = $this->cep;
        if (strlen($cep) == 9) {
            $url = "https://brasilapi.com.br/api/cep/v1/$cep";
            $response = Http::get($url);
            $data = $response->json();
            $this->rua = $data['street'];
            $this->bairro = $data['neighborhood'];
            $this->cidade = $data['city'];
            $this->estado = $data['state'];
            $this->pais = 'Brasil';

        } else {
            session()->flash('msg', 'CEP inválido');
        }
    }

    public function mount(?int $id = null)
    {
        $ong = [];
        if (! isset($id) && empty($id)) {
            return back();
        }
        $ong = Ong::findOrFail($id);
        if ($ong->id_usuario != Auth::id()) {
            return abort(401);
        }

        $this->nome_completo = $ong->nome_completo;
        $this->sigla = $ong->sigla;
        $this->parcerias = $ong->parcerias;
        $this->data_fundacao = $ong->data_fundacao;
        $this->tipo_organizacao = $ong->tipo_organizacao;
        $this->descricao = $ong->descricao;
        $this->cnpj = $ong->cnpj;
        $this->email = $ong->email;
        $this->telefone = $ong->telefone;
        $this->url = $ong->url;
        $this->cep = $ong->cep;
        $this->numero = $ong->numero;
        $this->rua = $ong->rua;
        $this->cidade = $ong->cidade;
        $this->bairro = $ong->bairro;
        $this->estado = $ong->estado;
        $this->pais = $ong->pais;
        $this->id_ong = $ong->id;
        $this->editing = true;
    }

    public function update()
    {

        $this->validate();

        Ong::where('id', '=', $this->id_ong)->update();
        session()->flash('msg', 'Ong atualizada com sucesso!');

        return $this->redirect('/ongs/dashboard');
    }

    public function store()
    {
        $this->validate();
        Ong::create($this->all());
        $user = User::findOrFail($this->id_usuario);
        $user->permissao = 'admin';
        $user->save();
        session()->flash('msg', 'Ong cadastrada com sucesso!');

        return $this->redirect('/ongs/dashboard');

    }

    public function render()
    {
        return view('livewire.ongs.create-ong')->extends('templates.template')->slot('content');
    }
}
