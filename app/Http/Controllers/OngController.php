<?php

namespace App\Http\Controllers;

use App\Models\Ong;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

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
        $authUser = Auth::user();
        $ong = Ong::findOrFail($ong->id);

        if ($authUser->id != $ong->id_usuario) {
            return abort(401);
        }

        $ong->delete();
        $user = User::findOrFail($authUser->id);
        $user->permissao = 'comum';
        $user->save();

        session()->flash('msg', 'Ong deletada com sucesso!');
        return redirect()->route('dashboard');
    }
}
