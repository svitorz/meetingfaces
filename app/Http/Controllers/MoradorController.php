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
        $moradores = Morador::select(['id', 'nome_completo', 'cidade_atual'])->paginate(12);
        return view('dashboard', ['moradores' => $moradores]);
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
        //
    }

    public function find(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $name = $validated['name'];

        $moradores = Morador::where('nome_completo', 'ilike', "%$name%")->paginate(12);
        return view('dashboard', ['moradores' => $moradores]);
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
        $morador = Morador::findOrFail($id);
        /**
         * Método para permitir que apenas usuários administradores da ong 
         * que o morador pertence possam editar seu registro. 
         * */
        $ong = Ong::where('id_usuario', '=', auth()->id())
            ->where('id', '=', $morador->id_ong)
            ->exists();
        if (!$ong) {
            abort(401);
        }

        $morador->delete();
        session()->flash('msg', 'Cadastro de morador excluído com sucesso!');
        return redirect()->to(route('dashboard'));
    }
}
