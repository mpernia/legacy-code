<?php

namespace Src\BoundedContext\Shared\Infrastructure\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'description' => ['nullable'],
            'user_id' => ['nullable', 'exists:users'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
