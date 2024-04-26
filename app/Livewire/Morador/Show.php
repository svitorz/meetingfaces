<?php

namespace App\Livewire\Morador;

use Livewire\Component;
use App\Models\Morador;
class Show extends Component
{
    public Morador $morador;
    public string $title = "Show morador";

    public function mount(int $id)
    {
        $this->morador = Morador::find($id);
    }
    public function render()
    {
        return view('livewire.morador.show',['morador' => $this->morador]);
    }
}
