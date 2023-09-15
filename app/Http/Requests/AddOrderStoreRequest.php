<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddOrderStoreRequest extends FormRequest
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
            'supplier_id' => 'required',
            'manufacturer_id' => 'required',
            'product_id' => 'required',
            'invoice_number' => 'string',
            'quantity' => 'required',
            'purchase_cost' => 'required',
            'srp' => 'required',
            'remarks' => 'nullable|string',
            'expiry_date' => 'nullable',
            'manufacturing_date' => 'nullable',
        ];
    }
}
