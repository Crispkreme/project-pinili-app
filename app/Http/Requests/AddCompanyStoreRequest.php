<?php

namespace App\Http\Requests;

use App\Models\Company;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AddCompanyStoreRequest extends FormRequest
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
            'id_number' => [
                'string',
                'max:255'
            ],
            'company_name' => [
                'required',
                'string'
            ],
            'contact_number' => [
                'required',
                'numeric',
            ],
            'landline' => [
                'nullable',
                'numeric',
            ],
            'address' => [
                'nullable',
                'string'
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique(Company::class)->ignore($this->user()->id)
            ],
        ];
    }
}
