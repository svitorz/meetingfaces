<?php

namespace App\Http\Controllers;

use App\Models\Morador;
use App\Models\Ong;
use Illuminate\Http\Request;
use Illuminate\Support\ViewErrorBag;

class MoradorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard', ['moradores' => Morador::simplePaginate(12)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return view('ShowMoradorAndCreateComentario',['id'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Morador $morador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Morador $morador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * FIXME: Adicionar verificações antes de excluir um morador.
     */
    public function destroy(int $id)
    { 
        if(auth()->check()){
            $ong = Ong::where('id_usuario','=',auth()->id())->first();
            if($ong);{
                $morador = Morador::findOrFail($id);
                $ong->get();
                if($morador->id_ong == $ong->id){
                    $morador->delete();
                    session()->flash('msg','Cadastro de morador excluído com sucesso!');
                    return redirect()->to(route('dashboard'));
                }
            } 
        }
        return abort(401);
    }
}
