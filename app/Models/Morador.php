<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];
}
