<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchMoradorRequest;
use App\Http\Requests\StoreMoradorRequest;
use App\Models\Morador;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Service\MoradorService;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;

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

        return to_route('morador.show', ['morador' => $morador->id])->with('msg', 'Morador cadastrado com sucesso!');
    }

    /**
     * Summary of show
     * @param \App\Models\Morador $morador
     * @return mixed
     */
    public function show(Morador $morador): mixed
    {
        $morador::whereRelation('comentarios', 'situacao', 'aprovado')->get();
        // Obtenha o usuário autenticado
        $user = Auth::user();

        // Verifique se o usuário autenticado é o administrador da ONG
        $isAdmin = optional($user->ong)->id === $morador->id_ong;

        // Retorne a view com as variáveis
        return view('livewire.morador.show', [
            'morador' => $morador,
            'isAdmin' => $isAdmin,
        ]);
    }

    public function find(SearchMoradorRequest $request)
    {
        if (empty($request->name) && empty($request->cidade)) {
            return redirect()->to(route('dashboard'));
        }

        $service = new MoradorService;
        $moradores = $service->search($request->validated());
        return view('dashboard', ['moradores' => $moradores]);
    }

    /**
     * *
     * @param \App\Http\Requests\StoreMoradorRequest $request
     * @param \App\Models\Morador $morador
     * @return RedirectResponse
     */
    public function update(StoreMoradorRequest $request, Morador $morador): RedirectResponse
    {
        if (!Gate::allows('manterMorador', $morador)) {
            abort(403);
        }

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

        return to_route('morador.show', ['morador' => $morador])->with('msg', 'Cadastro de morador alterado com sucesso!');
    }

    public function edit(Morador $morador)
    {
        if (!Gate::allows('manterMorador', $morador)) {
            abort(403);
        }
        return view('livewire.morador.edit-morador', ['morador' => $morador]);
    }


    /**
     * Summary of destroy
     * @param \App\Models\Morador $morador
     * @return mixed
     * delete a morador from database
     */
    public function destroy(Morador $morador): mixed
    {
        if (!Gate::allows('manterMorador', $morador)) {
            abort(403);
        }
        $morador->delete();
        session()->flash('msg', 'Cadastro de morador excluído com sucesso!');

        return redirect()->to(route('ongs.dashboard'));
    }
}
