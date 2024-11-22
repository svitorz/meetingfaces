<?php
namespace App\Service;
use App\Models\Morador;

class MoradorService
{
    /**
     * Summary of store
     * @param \App\Models\Morador $morador
     * @return bool
     * Método responsável por salvar registros
     */
    public function store(Morador $morador): bool
    {
        return $morador->save();
    }

    public function search(array $validated)
    {
        $query = Morador::select(['id', 'nome_completo', 'cidade_atual'])->orderBy('nome_completo');

        if (!empty($validated['name'])) {
            $query->where('nome_completo', 'ilike', '%' . $validated['name'] . '%');
        }

        if (!empty($validated['cidade'])) {
            $query->where('cidade_atual', 'ilike', '%' . $validated['cidade'] . '%');
        }

        return $query->paginate(12);
    }
}