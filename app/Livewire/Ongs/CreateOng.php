<?php

namespace App\Livewire\Ongs;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use App\Models\Ong;
use App\Models\User;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;

class CreateOng extends Component
{
    public string $title = 'Cadastrar Ong';

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
    #[Validate('required|unique', message: 'Insira o CNPJ da sua ONG')]
    public string $cnpj;
    #[Validate('required')]
    public string $email;
    #[Validate('required|unique')]
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
            $this->pais = "Brasil";

        } else {
            session()->flash('msg', 'CEP inválido');
        }
    }
    public function render()
    {
        return view('livewire.ongs.create-ong')->extends('templates.template')->slot('content');
    }
}
