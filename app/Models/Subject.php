<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subject extends Model
{
    protected $fillable = [
        'code',
        'title',
        'units',
        'is_active',
        'prerequisite_id',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'units' => 'integer',
        ];
    }

    public function prerequisite(): BelongsTo
    {
        return $this->belongsTo(Prerequisite::class);
    }
}
