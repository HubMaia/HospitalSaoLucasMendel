<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Consulta extends Model
{
    use HasFactory;

    protected $table = 'consultas';

    protected $fillable = [
        'paciente_id',
        'especialidade_id',
        'medico_id',
        'data',
        'hora',
        'status'
    ];

    protected $casts = [
        'data' => 'date',
        'hora' => 'datetime'
    ];

    public function paciente(): BelongsTo
    {
        return $this->belongsTo(Paciente::class);
    }

    public function especialidade(): BelongsTo
    {
        return $this->belongsTo(Especialidade::class);
    }

    public function medico(): BelongsTo
    {
        return $this->belongsTo(Medico::class);
    }

    public function autorizacaoConvenio(): HasOne
    {
        return $this->hasOne(AutorizacaoConvenio::class);
    }

    public function pagamento(): HasOne
    {
        return $this->hasOne(Pagamento::class);
    }
}
