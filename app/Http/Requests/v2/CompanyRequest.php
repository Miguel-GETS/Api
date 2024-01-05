<?php

namespace App\Http\Requests\v2;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
        // dd("hello world");
        return [
            'companyName' => 'required|string|max:255',
            'parValue' => 'nullable|integer',
            'AuthorizedShares' => 'nullable|numeric',
            'businessAbout' => 'required|string',
            'fullName' => 'required|string|max:255',
            'countryCode' => 'required|string|max:255',
            'phoneNumber' => 'required|string|max:255',
            'emailAddress' => 'required|email|max:255',
            'termination_id' => 'nullable|exists:terminations,id',
            'field_id' => 'nullable|integer|exists:fields,id',
            'businessArea' => 'nullable|integer|exists:fields,id',

        ];
    }
}
