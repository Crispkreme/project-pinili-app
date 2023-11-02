<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientBmiRequest extends FormRequest
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
            'patient_id' => 'required',
            'blood_pressure' => 'nullable|string|max:255',
            'heart_rate' => 'nullable|string|max:255',
            'temperature' => 'nullable|string|max:255',
            'weight' => 'nullable|string|max:255',
            'symptoms' => 'nullable|string',
        ];
    }
}
