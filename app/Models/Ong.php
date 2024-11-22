<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ong extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'nome_completo',
            'sigla',
            'parcerias',
            'data_fundacao',
            'tipo_organizacao',
            'descricao',
            'cnpj',
            'email',
            'telefone',
            'url',
            'cep',
            'numero',
            'rua',
            'cidade',
            'bairro',
            'estado',
            'pais',
            'id_usuario',
        ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function morador(): HasMany
    {
        return $this->hasMany(Morador::class, 'id_ong');
    }
}
