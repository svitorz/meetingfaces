<?php

namespace App\Models;

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

    public function morador(): BelongsTo
    {
        return $this->belongsTo(Morador::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
