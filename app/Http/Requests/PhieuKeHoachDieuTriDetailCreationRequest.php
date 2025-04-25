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
            'issue' => 'nullable|string',
            'clinical_tests' => 'nullable|string',
            'treatment_plan' => 'nullable|string',
            'note' => 'nullable|string',
            'icd_type' => 'required|string',
            'phieu_ke_hoach_dieu_tri_id' => 'required|exists:phieu_ke_hoach_dieu_tris,id',
        ];
    }
}
