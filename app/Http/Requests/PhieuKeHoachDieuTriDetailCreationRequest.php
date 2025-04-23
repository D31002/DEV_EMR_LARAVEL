<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhieuKeHoachDieuTriDetailCreationRequest extends FormRequest
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
            'issue' => 'required|string',
            'clinical_tests' => 'required|string',
            'treatment_plan' => 'required|string',
            'note' => 'required|string',
            'icd_type' => 'required|string',
            'phieu_ke_hoach_dieu_tri_id' => 'required|exists:phieu_ke_hoach_dieu_tris,id',
        ];
    }
}
