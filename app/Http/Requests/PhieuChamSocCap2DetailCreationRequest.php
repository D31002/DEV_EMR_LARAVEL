<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhieuChamSocCap2DetailCreationRequest extends FormRequest
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
            "dateTime_care"=> "required|string",
            "patient_condition"=> "nullable|string",
            'care_goals' => 'nullable|string',
            'nursing_actions' => 'nullable|string',
            'evaluation_notes' => 'nullable|string',
            'nurse_practice_code' => 'nullable|string',
            'nurse_practice_name' => 'nullable|string',
            'created_by_userName' => 'required|string',
            'created_by_loginName' => 'required|string',
            'signed' => 'required|boolean',
            'phieu_cham_soc_cap2_id' => 'required|exists:phieu_cham_soc_cap2s,id'
        ];
    }
}
