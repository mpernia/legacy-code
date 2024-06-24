<?php

namespace Src\BoundedContext\Shared\Infrastructure\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetProductByProductFamilyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'product_family_id' => ['required', 'exists:product_families'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
