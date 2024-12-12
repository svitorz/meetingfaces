<?php

namespace App\Http\Controllers;

use App\Models\Ong;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\View\View;

class OngController extends Controller
{

    public function show(Ong $ong): View
    {
        return view('livewire.ongs.show', ['ong' => $ong]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ong $ong)
    {
        if (!Gate::allows('manterOng', $ong)) {
            abort(401);
        }

        $ong->user->permissao = "comum";
        $ong->user->save();
        $ong->delete();


        session()->flash('msg', 'Ong deletada com sucesso!');
        return redirect()->to('/');
    }
}
