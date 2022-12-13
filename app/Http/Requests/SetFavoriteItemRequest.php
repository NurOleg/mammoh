<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SetFavoriteItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'required|int',
            'title' => 'required|string',
            'picture_url' => 'required|string',
            'type' => 'required|string',
        ];
    }
}
