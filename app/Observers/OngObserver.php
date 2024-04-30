<?php

namespace App\Observers;

use App\Models\Ong;

class OngObserver
{
    /**
     * Handle the Ong "created" event.
     */
    public function created(Ong $ong): void
    {
        if(auth()->check())
        {
            $user = auth()->user();
            $user->permissao = "admin";
        }
    }

    /**
     * Handle the Ong "updated" event.
     */
    public function updated(Ong $ong): void
    {
        //
    }

    /**
     * Handle the Ong "deleted" event.
     */
    public function deleted(Ong $ong): void
    {
        //
    }

    /**
     * Handle the Ong "restored" event.
     */
    public function restored(Ong $ong): void
    {
        //
    }

    /**
     * Handle the Ong "force deleted" event.
     */
    public function forceDeleted(Ong $ong): void
    {
        //
    }
}
