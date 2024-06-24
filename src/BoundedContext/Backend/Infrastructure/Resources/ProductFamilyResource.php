<?php

namespace Src\BoundedContext\Backend\Infrastructure\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Src\BoundedContext\Shared\Infrastructure\Persistence\Models\ProductFamily;

/** @mixin ProductFamily */
class ProductFamilyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
