<?php

namespace App\Http\Requests\v2;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
            'total' => 'required|numeric',
            'holderName' => 'required|string|max:255',
            'holderLastName' => 'required|string|max:255',
            'holderEmail' => 'required|email|max:255',
            'holderDocument' => 'required|string|max:255',
            'document_type_id' => 'required|exists:document_types,id',
            'company_id' => 'required|exists:companies,id',
            'plan_id' => 'required|exists:plans,id',
            'state_fee_id' => 'required|exists:state_fees,id',
            'bonus_id' => 'nullable|exists:bonuses,id',
            'payment_id' => 'nullable|integer',
            'plan_start_date' => 'nullable|date',
            'plan_end_date' => 'nullable|date',
        ];
    }

    
}
