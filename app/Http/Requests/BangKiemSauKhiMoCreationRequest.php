<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BangKiemSauKhiMoCreationRequest extends FormRequest
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
            'treatment_code' => 'required|string',
            'patient_fullname' => 'required|string',
            'patient_dob' => 'required|string',
            'patient_gender' => 'required|string',
            'dateTime_surgery' => 'required|string',
            'dateTime_end' => 'required|string',
            'diagnosis_after' => 'nullable|string',
            'type_surgery' => 'nullable|string',
            'created_by_userName' => 'required|string',
            'created_by_loginName' => 'required|string',
            'signed' => 'required|boolean',
            'branch_name' => 'required|string',
            'parent_organization_name' => 'required|string',
        ];
    }
}
