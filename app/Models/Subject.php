<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['code', 'title', 'units', 'is_active', 'prerequisite'];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',   // your boolean column
            'units'     => 'integer',   // your integer column
        ];
    }
}