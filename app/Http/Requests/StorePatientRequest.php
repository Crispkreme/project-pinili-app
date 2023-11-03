<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientRequest extends FormRequest
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
            'gender_id' => 'required',
            'id_number' => 'nullable|string|max:255',
            'firstname' => 'required|string|max:225',
            'lastname' => 'required|string|max:225',
            'mi' => 'nullable|string|max:20',
            'age' => 'numeric',
            'contact_number' => 'nullable|string',
            'address' => 'nullable|string',
        ];
    }
}
