<?php

namespace Src\BoundedContext\Shared\Infrastructure\Persistence\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'is_active',
        'tenant_id',
        'product_family_id',
        'user_id',
    ];

    public function tenants(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    public function productFamilies(): BelongsTo
    {
        return $this->belongsTo(ProductFamily::class);
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
