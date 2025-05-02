<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HorarioMedico extends Model
{
    use HasFactory;

    protected $table = 'horarios_medicos';

    protected $fillable = [
        'medico_id',
        'especialidade_id',
        'dia_semana',
        'hora_inicio',
        'hora_fim',
        'ativo'
    ];

    protected $casts = [
        'hora_inicio' => 'datetime',
        'hora_fim' => 'datetime',
        'ativo' => 'boolean'
    ];

    public function medico(): BelongsTo
    {
        return $this->belongsTo(Medico::class);
    }

    public function especialidade(): BelongsTo
    {
        return $this->belongsTo(Especialidade::class);
    }
}
