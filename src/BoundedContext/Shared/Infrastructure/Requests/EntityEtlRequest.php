<?php

namespace Src\BoundedContext\Shared\Infrastructure\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntityEtlRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'promt' => ['required'],
            'tenant_id' => ['required', 'exists:tenants'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
