<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInventoryDetailRequest extends FormRequest
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
            'inventory_sheet_id' => 'string',
            'product_id' => 'string',
            'status_id' => 'string',
            'selling_qty' => 'string',
            'unit_price' => 'string',
            'selling_price' => 'string',
        ];
    }
}
