<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Dialect extends Model
{
    /** @use HasFactory<\Database\Factories\DialectFactory> */
    use HasFactory;

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    public function definitions(): BelongsToMany
    {
        return $this->belongsToMany(Definition::class);
    }
}
