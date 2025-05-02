<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pagamento extends Model
{
    use HasFactory;

    protected $table = 'pagamentos';

    protected $fillable = [
        'consulta_id',
        'valor',
        'metodo_pagamento',
        'data_pagamento'
    ];

    protected $casts = [
        'valor' => 'decimal:2',
        'data_pagamento' => 'date'
    ];

    public function consulta(): BelongsTo
    {
        return $this->belongsTo(Consulta::class);
    }
}
