<?php

namespace App\Livewire\Ongs\Admin;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.ongs.admin.dashboard')->extends('templates.template')->slot('content');
    }
}
