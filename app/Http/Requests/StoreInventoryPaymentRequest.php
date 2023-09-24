<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInventoryPaymentRequest extends FormRequest
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
            'customer_id' => 'string',
            'paid_status_id' => 'string',
            'due_amount' => 'string',
            'paid_amount' => 'string',
            'total_amount' => 'string',
            'discount_amount' => 'string',
        ];
    }
}
