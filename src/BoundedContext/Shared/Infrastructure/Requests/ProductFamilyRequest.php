<?php

namespace Src\BoundedContext\Shared\Infrastructure\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFamilyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email', 'max:254'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
