<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConversionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'from_currency' => ['required', 'string'],
            'to_currency' => ['required', 'string'],
            'amount' => ['required', 'numeric', 'min:1', 'regex:/^\d+(\.\d{1,2})?$/'],
            [
                'amount.min' => 'Currency must be greater than 0.',
            ]
        ];
    }
}
