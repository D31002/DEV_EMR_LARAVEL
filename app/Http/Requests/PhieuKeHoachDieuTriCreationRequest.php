<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhieuKeHoachDieuTriCreationRequest extends FormRequest
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
            "treatment_code"=> "required|string",
            'patient_code' => 'required|string',
            'patient_fullname' => 'required|string',
            'patient_dob' => 'required|string',
            'patient_gender' => 'required|string',
            'in_time' => 'required|string',
            'department' => 'required|string',
            'bed_number' => 'required|string',
            'bed_room' => 'required|string',
            'icd_code' => 'required|string',
            'icd_name' => 'required|string',
            'icd_subCode' => 'nullable|string',
            'icd_text' => 'nullable|string',
            'patient_request_first' => 'nullable|string',
            'patient_request_second' => 'nullable|string',
            'patient_request_last' => 'nullable|string',
            'estimated_hospital_days' => 'nullable|string',
            'estimated_total_cost' => 'nullable|string',
            'patient_relative_type' => 'nullable|string',
            'patient_relative_name' => 'nullable|string',
            'treatment_doctor_loginName' => 'required|string',
            'treatment_doctor_userName' => 'required|string',
            'department_head_approved_loginName' => 'required|string',
            'department_head_approved_userName' => 'required|string',
            'created_by_loginName' => 'required|string',
            'created_by_userName' => 'required|string',
            'signed' => 'nullable|boolean',
        ];
    }
}
