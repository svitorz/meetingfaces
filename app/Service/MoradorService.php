<?php
namespace App\Service;
use App\Models\Morador;

class MoradorService
{
    /**
     * *
     * @return bool
     * Método responsável por salvar registros.
     */
    public function store(Morador $morador): bool
    {
        return $morador->save();
    }
}