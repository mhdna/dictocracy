<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    /**
     * @return BelongsToMany<Permission,Role>
     */
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }
    /**
     * @return BelongsToMany<User,Role>
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
