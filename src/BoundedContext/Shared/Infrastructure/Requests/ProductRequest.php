<?php

namespace Src\BoundedContext\Shared\Infrastructure\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'description' => ['required'],
            'price' => ['required', 'numeric'],
            'is_active' => ['boolean'],
            'tenant_id' => ['required', 'exists:tenants'],
            'product_family_id' => ['required', 'exists:product_families'],
            'user_id' => ['required', 'exists:users'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
