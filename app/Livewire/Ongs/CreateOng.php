<?php

namespace App\Livewire\Ongs;

use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use App\Models\Ong;
use App\Models\User;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;

class CreateOng extends Component
{
    public String $title = 'Cadastrar Ong';
    
    #[Validate('required', message:"Insira o nome da sua ONG")]
    public string $nome_completo;
    #[Validate('required|min:3', message:"Insira uma sigla para sua ONG")]
    public string $sigla;
    #[Validate('max:256')]
    public string $parcerias;

    #[Validate('required', message:"Insira a data de fundação da sua ONG")]
    public string $data_fundacao;
    #[Validate('required')]
    public string $tipo_organizacao;
    #[Validate('required', message:"Insira uma descrição sobre sua ONG")]
    public string $descricao;
    #[Validate('required', message:"Insira o CNPJ da sua ONG")]
    public string $cnpj;
    #[Validate('required')]
    public string $email;
    #[Validate('required')]
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
    
    public function boot():void
    {
        $hasIdOnOngs = DB::table('ongs')->where('id_usuario','=',$this->id_usuario)->exists();
        if($hasIdOnOngs){
            abort(401);
        }
    }

    public function create(): Redirector  // não tem erro   
    {
        $validated = $this->validate();
        /* FIXME: Adicionar um método para voltar aos inputs que possuem erros. */
        /* if ($this->getErrorBag()->isNotEmpty()) {
            $this->setErrorBag($this->errors);
            $this->dispatchBrowserEvent('error-scroll');
        } */

        if($validated !== null){
            Ong::create($validated);
            User::where('id','=',auth()->id())->update(['permissao' => 'admin']);
        }
        return redirect()->route('dashboard');
    }
    public function render()
    {
        return view('livewire.ongs.create-ong');
    }
}
