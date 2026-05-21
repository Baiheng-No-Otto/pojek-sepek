<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWelcomeInputsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, string>>
     */
    public function rules(): array
    {
        return [
            'alternatives' => ['required', 'array', 'min:0', 'max:20'],
            'alternatives.*.name' => ['nullable', 'string', 'max:100'],
            'alternatives.*.scores' => ['nullable', 'array'],
            'alternatives.*.scores.*' => ['nullable', 'numeric', 'min:0', 'max:100000'],
        ];
    }
}
