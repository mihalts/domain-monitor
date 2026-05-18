<?php

namespace App\Domain\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DomainCheckLog extends Model
{
    protected $fillable = [
        'domain_id',
        'success',
        'status_code',
        'response_time_ms',
        'error_message',
    ];

    protected $casts = [
        'success' => 'boolean',
        'status_code' => 'integer',
        'response_time_ms' => 'integer',
    ];

    public function domain(): BelongsTo
    {
        return $this->belongsTo(Domain::class);
    }
}
