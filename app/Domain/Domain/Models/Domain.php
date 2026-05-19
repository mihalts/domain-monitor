<?php

namespace App\Domain\Domain\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Domain extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'url',
        'check_interval',
        'timeout',
        'method',
        'is_active',
    ];

    protected $casts = [
        'check_interval' => 'integer',
        'timeout' => 'integer',
        'is_active' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function logs(): HasMany
    {
        return $this->hasMany(DomainCheckLog::class, 'domain_id');
    }
}
