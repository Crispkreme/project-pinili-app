<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInventorySheetRequest extends FormRequest
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
            'status_id' => 'string',
            'distributor_id' => 'string',
            'invoice_number' => 'string',
            'po_number' => 'string',
            'delivery_number' => 'string',
            'delivery_date' => 'string',
            'previous_delivery' => 'string',
            'present_delivery' => 'string',
            'or_number' => 'string',
            'or_date' => 'date',
            'description' => 'nullable|string',
        ];
    }
}
