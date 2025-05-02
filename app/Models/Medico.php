<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Medico extends Model
{
    use HasFactory;

    protected $table = 'medicos';

    protected $fillable = [
        'nome',
        'cpf',
        'genero',
        'idade',
        'data_nascimento',
        'endereco',
        'telefone',
        'matricula',
        'data_admissao',
        'data_demissao',
        'necessidades_especiais',
        'ativo'
    ];

    protected $casts = [
        'data_nascimento' => 'date',
        'data_admissao' => 'date',
        'data_demissao' => 'date',
        'necessidades_especiais' => 'boolean',
        'ativo' => 'boolean'
    ];

    public function especialidades(): BelongsToMany
    {
        return $this->belongsToMany(Especialidade::class, 'medicos_especialidades');
    }

    public function horarios(): HasMany
    {
        return $this->hasMany(HorarioMedico::class);
    }

    public function consultas(): HasMany
    {
        return $this->hasMany(Consulta::class);
    }
}
