<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Language extends Model
{
    /** @use HasFactory<\Database\Factories\LanguageFactory> */
    use HasFactory;

    public function words(): HasMany
    {
        return $this->hasMany(Word::class);
    }
    public function dialects(): HasMany
    {
        return $this->hasMany(Dialect::class);
    }
}
