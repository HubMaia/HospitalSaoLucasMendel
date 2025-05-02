<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Especialidade extends Model
{
    use HasFactory;

    protected $table = 'especialidades';

    protected $fillable = [
        'nome',
        'descricao'
    ];

    public function medicos(): BelongsToMany
    {
        return $this->belongsToMany(Medico::class, 'medicos_especialidades');
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
