<?php

namespace App\Http\Controllers;

use App\Livewire\Ongs\Show;
use App\Models\Ong;
use App\Models\User;
use Illuminate\Http\Request;

class OngController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ongs.OngDashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "nome_completo" => "required|max:255|string",
            "sigla" => "required|max:5|string",
            "email" => "required|email",
            "cnpj" => "required|",
            "parcerias" => "nullable",
            "url" => "required",
            'data_fundacao' => 'required|date',
            "tipo_organizacao" => "required",
            "descricao" => "required|max:1024",
            "cep" => "required|numeric",
            "numero" => "required|numeric",
            "rua" => "required|string",
            "cidade" => "required|string",
            "bairro" => "required|string",
            "estado" => "required|string",
            "pais" => "required|string",
            "telefone" => "required",
        ]);
        $validated['id_usuario'] = auth()->id();
        if ($validated != false) {
            Ong::create($validated);
            User::where('id', '=', auth()->id())->update(['permissao' => 'admin']);
        }
        // add a comment
        return redirect()->route('dashboard');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ong $ong)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ong $ong)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ong $ong)
    {
        //
    }
}
