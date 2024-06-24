<?php

namespace Src\BoundedContext\Shared\Infrastructure\Persistence\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
