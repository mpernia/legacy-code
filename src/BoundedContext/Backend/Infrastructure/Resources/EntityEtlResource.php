<?php

namespace Src\BoundedContext\Backend\Infrastructure\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Src\BoundedContext\Backend\Infrastructure\Resources\TenantResource;
use Src\BoundedContext\Shared\Infrastructure\Persistence\Models\EntityEtl;

/** @mixin EntityEtl */
class EntityEtlResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'promt' => $this->promt,
            'tenant_id' => $this->tenant_id,
            'tenant' => new tenantResource($this->whenLoaded('tenant')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
