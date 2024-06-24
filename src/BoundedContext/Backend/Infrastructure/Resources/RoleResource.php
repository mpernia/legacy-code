<?php

namespace Src\BoundedContext\Backend\Infrastructure\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Src\BoundedContext\Shared\Infrastructure\Persistence\Models\Role;

/** @mixin Role */
class RoleResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,

            'user_id' => $this->user_id,
        ];
    }
}
