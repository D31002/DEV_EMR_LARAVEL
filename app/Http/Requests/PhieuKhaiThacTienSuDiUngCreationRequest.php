<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhieuKhaiThacTienSuDiUngCreationRequest extends FormRequest
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
            'patient_code' => 'required|string',
            'patient_fullname' => 'required|string',
            'patient_dob' => 'required|date',
            'patient_gender' => 'required|string',
            'in_time' => 'required|string',
            'department' => 'required|string',
            'bed_number' => 'required|string',
            'bed_room' => 'required|string',
            'icd_code' => 'required|string',
            'icd_name' => 'required|string',
            'icd_subCode' => 'required|string',
            'icd_text' => 'required|string',
            'allergy_history' => 'nullable|string',
            'collection_date' => 'required|date',
            'treatment_doctor_loginName' => 'nullable|string',
            'treatment_doctor_userName' => 'nullable|string',
            'information_collector_loginName' => 'nullable|string',
            'information_collector_userName' => 'nullable|string',
            'created_by_loginName' => 'required|string',
            'created_by_userName' => 'required|string',
            'signed' => 'required|boolean',
        ];
    }
}
