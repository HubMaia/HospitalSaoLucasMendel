<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AutorizacaoConvenio extends Model
{
    use HasFactory;

    protected $table = 'autorizacoes_convenio';

    protected $fillable = [
        'consulta_id',
        'convenio_id',
        'numero_carteirinha',
        'status',
        'data_autorizacao'
    ];

    protected $casts = [
        'data_autorizacao' => 'date'
    ];

    public function consulta(): BelongsTo
    {
        return $this->belongsTo(Consulta::class);
    }

    public function convenio(): BelongsTo
    {
        return $this->belongsTo(Convenio::class);
    }
}
