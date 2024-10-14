<?php

namespace App\Http\Controllers;

use App\Models\Morador;
use App\Models\Ong;
use Illuminate\Http\Request;

class MoradorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $moradores = Morador::select(['id', 'nome_completo', 'cidade_atual'])
            ->orderBy('nome_completo')
            ->paginate(12);

        return view('dashboard', ['moradores' => $moradores]);
    }

    public function find(Request $request)
    {
        if (empty($request->name) && empty($request->cidade)) {
            return redirect()->to(route('dashboard'));
        }

        if (! empty($request->name) && ! empty($request->cidade)) {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'cidade' => 'required|string|max:255',
            ]);
            $nome = $validated['name'];
            $cidade = $validated['cidade'];

            return view('dashboard', [
                'moradores' => Morador::select(['id', 'nome_completo', 'cidade_atual'])
                    ->where([
                        ['nome_completo', 'ilike', $nome],
                        ['cidade_atual', '=', $cidade],
                    ])
                    ->orderBy('nome_completo')
                    ->paginate(12),
            ]);
        } elseif (! empty($request->name) && empty($request->cidade)) {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
            ]);

            return view('dashboard', [
                'moradores' => Morador::select(['id', 'nome_completo', 'cidade_atual'])
                    ->where('nome_completo', 'ilike', '%'.$validated['name'].'%')
                    ->orderBy('nome_completo')
                    ->paginate(12),
            ]);
        } else {
            $validated = $request->validate(['cidade' => 'required|string|max:255']);

            return view('dashboard', [
                'moradores' => Morador::select(['id', 'nome_completo', 'cidade_atual'])
                    ->where('cidade_atual', 'ilike', $validated['cidade'])
                    ->orderBy('nome_completo')
                    ->paginate(12),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
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
        if (! $ong) {
            abort(401);
        }

        $morador->delete();
        session()->flash('msg', 'Cadastro de morador excluído com sucesso!');

        return redirect()->to(route('dashboard'));
    }
}
