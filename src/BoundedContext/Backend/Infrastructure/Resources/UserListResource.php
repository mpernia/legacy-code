<?php

namespace Src\BoundedContext\Backend\Infrastructure\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserListResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'status' => null,
            'async' => 1,
            'users' => [],
        ];
    }
}
