<?php

namespace App\Models;

use Definition as DefinitionDefinition;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Term;

class Definition extends Model
{
    /** @use HasFactory<\Database\Factories\DefinitionFactory> */
    use HasFactory;
    protected $fillable = [
        'user_id',
        'term_id',
        'definition',
        'example',
        'is_approved'
    ];

    public $with = ['term', 'user'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function term(): BelongsTo
    {
        return $this->belongsTo(Term::class);
    }

    public function votes(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_vote')->withPivot('vote')->withTimestamps();
    }
}
