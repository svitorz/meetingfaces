<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Morador extends Model
{
    use HasFactory;

    public $table = 'moradores';

    protected $fillable = [
        'nome_completo',
        'cidade_atual',
        'cidade_natal',
        'nome_familiar_proximo',
        'grau_parentesco',
        'data_nasc',
        'id_ong',
        'profile_picture',
    ];

    public function ong(): BelongsTo
    {
        return $this->belongsTo(Ong::class, 'id_ong');
    }

    public function comentarios(): HasMany
    {
        return $this->hasMany(Comentario::class, 'id_morador');
    }
}
