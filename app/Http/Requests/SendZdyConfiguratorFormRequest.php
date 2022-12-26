<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendZdyConfiguratorFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'email' => 'required|string',
            'comment' => 'nullable|string',
            'fio' => 'required|string',
            'phone' => 'required|string',
        ];
    }
}
