<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comentario extends Model
{
    use HasFactory;
    protected $fillable = [
        'comentario',
        'id_usuario',
        'id_morador',
    ];

    public function getComentariosPendentes($id_usuario): Collection
    {
        return Comentario::select('moradores.nome_completo', 'moradores.id as id_morador', 'comentarios.comentario', 'comentarios.id as id_comentario')
            ->join('moradores', 'moradores.id', '=', 'comentarios.id_morador')
            ->join('ongs', 'ongs.id', '=', 'moradores.id_ong')
            ->where('comentarios.situacao', '=', 'pendente')
            ->where('ongs.id_usuario', '=', $id_usuario)
            ->get();
    }

    public function morador(): BelongsTo
    {
        return $this->belongsTo(Morador::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
