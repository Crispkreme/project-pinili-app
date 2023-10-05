<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => [
                'required',
            ],
            'form_id' => [
                'required',
            ],
            'barcode' => [
                'nullable',
                'string',
            ],
            'serial_number' => [
                'nullable',
                'string',
            ],
            'medicine_name' => [
                'required',
                'string',
            ],
            'generic_name' => [
                'required',
                'string',
            ],
            'description' => [
                'nullable',
                'string'
            ],
            'sku' => [
                'nullable',
                'integer'
            ],
            'sold' => [
                'nullable',
                'integer'
            ],
            'available' => [
                'nullable',
                'integer'
            ],
        ];
    }
}
