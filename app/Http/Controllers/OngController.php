<?php

namespace App\Http\Controllers;

use App\Models\Morador;
use App\Models\Ong;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OngController extends Controller
{
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
