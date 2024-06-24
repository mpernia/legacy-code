<?php

namespace Src\BoundedContext\Backend\Infrastructure\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Src\BoundedContext\Shared\Infrastructure\Persistence\Models\Product;

/** @mixin Product */
class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'is_active' => $this->is_active,
            'tenant_id' => $this->tenant_id,
            'product_family_id' => $this->product_family_id,
            'user_id' => $this->user_id,
            'tenant' => new tenantResource($this->whenLoaded('tenant')),
            'productFamily' => new productFamilyResource($this->whenLoaded('productFamily')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
