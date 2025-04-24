<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhieuKhaiThacTienSuDiUngDetailCreationRequest extends FormRequest
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
            'stt' => 'required|integer',
            'content' => 'required|string',
            'allergen_name' => 'nullable|string',
            'occur_times' => 'nullable|string',
            'no_reaction' => 'boolean',
            'reaction_handling' => 'required|string',
            'phieu_khai_thac_tien_su_di_ung_id' => 'required|string',
        ];
    }
}
