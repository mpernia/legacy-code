<?php

namespace Src\BoundedContext\Shared\Infrastructure\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class UserListRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'message' => ['string', 'required', 'min:3'],
            'async_mode' => ['boolean', 'required'],
            'user_ids' => ['array', 'required'],
            'user_ids.*' => ['integer', 'min:1'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
