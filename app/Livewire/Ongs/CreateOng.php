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
    public function render()
    {
        return view('livewire.ongs.create-ong');
    }
}
