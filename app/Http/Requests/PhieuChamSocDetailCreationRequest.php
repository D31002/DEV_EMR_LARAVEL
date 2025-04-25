<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhieuChamSocDetailCreationRequest extends FormRequest
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
            'monitoring_dateTime' => 'required|string',
            'progress_notes' => 'nullable|string',
            'care_orders' => 'nullable|string',
            'signer_code' => 'nullable|string',
            'signer_name' => 'nullable|string',
            'created_by_userName' => 'required|string',
            'created_by_loginName' => 'required|string',
            'signed' => 'required|boolean',
            'phieu_cham_soc_id' => 'required|exists:phieu_cham_socs,id'
        ];
    }
}
