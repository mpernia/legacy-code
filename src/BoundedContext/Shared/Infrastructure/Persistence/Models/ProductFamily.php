<?php

namespace Src\BoundedContext\Shared\Infrastructure\Persistence\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductFamily extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'email',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'product_family_id', 'id');
    }
}
