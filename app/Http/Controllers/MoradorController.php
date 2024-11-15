<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMoradorRequest;
use App\Models\Morador;
use App\Models\Ong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Service\MoradorService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class MoradorController extends Controller
{
    /**
     * *
     * Método para cadastrar um morador de rua.
     * @param \App\Http\Requests\StoreMoradorRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(StoreMoradorRequest $request)
    {
        $service = new MoradorService; // nova instância do service.
        $validated = $request->validated(); // valida a requisição

        if ($request->hasFile('profile_picture')) {
            // Gera um nome único para o arquivo

            $name = Str::uuid() . '.' . $request->profile_picture->extension();
            // Salva a imagem no disco 'public' dentro da pasta 'photos'
            $request->profile_picture->storeAs('photos', $name, 'public');
        } else {
            // Nome padrão caso nenhuma imagem seja enviada
            $name = 'user.png';
        }

        // Adiciona o nome da imagem ao array validado
        $validated['profile_picture'] = $name;

        $validated['id_ong'] = auth()->user()->ong->id;

        $morador = new Morador($validated);

        $service->store($morador);

        return to_route('morador.create')->with('msg', 'Morador cadastrado com sucesso!');
    }

    /**
     * *
     * @param \App\Http\Requests\StoreMoradorRequest $request
     * @param \App\Models\Morador $morador
     * @return RedirectResponse
     */
    public function update(StoreMoradorRequest $request, Morador $morador): RedirectResponse
    {
        $service = new MoradorService;

        $validated = $request->validated();

        if ($request->hasFile('profile_picture')) {
            // Gera um nome único para o arquivo

            $name = Str::uuid() . '.' . $request->profile_picture->extension();
            // Salva a imagem no disco 'public' dentro da pasta 'photos'
            $request->profile_picture->storeAs('photos', $name, 'public');
        } else {
            // Nome padrão caso nenhuma imagem seja enviada
            $name = 'user.png';
        }
        $validated['profile_picture'] = $name;

        $morador->fill($validated);

        $service->store($morador);

        return to_route('morador.create')->with('msg', 'Morador cadastrado com sucesso!');
    }

    public function edit(Morador $morador)
    {

    }
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

        if (!empty($request->name) && !empty($request->cidade)) {
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
        } elseif (!empty($request->name) && empty($request->cidade)) {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
            ]);

            return view('dashboard', [
                'moradores' => Morador::select(['id', 'nome_completo', 'cidade_atual'])
                    ->where('nome_completo', 'ilike', '%' . $validated['name'] . '%')
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
        $ong = Ong::where('id_usuario', '=', Auth::id())
            ->where('id', '=', $morador->id_ong)
            ->exists();
        if (!$ong) {
            abort(401);
        }

        $morador->delete();
        session()->flash('msg', 'Cadastro de morador excluído com sucesso!');

        return redirect()->to(route('ongs.dashboard'));
    }
}
