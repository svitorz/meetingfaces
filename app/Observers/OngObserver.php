<?php

namespace App\Observers;

use App\Models\Ong;
use App\Models\User;

class OngObserver
{
    /**
     * Handle the Ong "created" event.
     */
    public function created(Ong $ong): void
    {
        $user = User::findOrFail($ong->id_usuario);
        $user->permissao = "admin";
        $user->save();
    }
}
