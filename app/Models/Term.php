<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Term extends Model
{
    /** @use HasFactory<\Database\Factories\TermFactory> */
    use HasFactory;

    public $with = ['language'];
    protected $fillable = [
        'term',
    ];
    /**
     * @return BelongsToMany<User,Term>
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
    /**
     * @return HasMany<Definition,Term>
     */
    public function definitions(): HasMany
    {
        return $this->hasMany(Definition::class);
    }
    /**
     * @return BelongsTo<Language,Term>
     */
    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }
}
