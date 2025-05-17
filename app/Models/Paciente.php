<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Paciente extends Model
{
    use HasFactory;

    protected $table = 'pacientes';

    protected $fillable = [
        'nome',
        'cpf',
        'genero',
        'tipo_sanguineo',
        'telefone',
        'endereco',
        'data_nascimento',
        'status_cadastro'
    ];

    protected $casts = [
        'data_nascimento' => 'date',
        'status_cadastro' => 'boolean'
    ];

    public function consultas(): HasMany
    {
        return $this->hasMany(Consulta::class);
    }
}
