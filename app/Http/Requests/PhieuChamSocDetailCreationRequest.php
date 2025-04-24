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
            'progress_notes' => 'required|string',
            'care_orders' => 'required|string',
            'signer_code' => 'required|string',
            'signer_name' => 'required|string',
            'created_by_userName' => 'required|string',
            'created_by_loginName' => 'required|string',
            'phieu_cham_soc_id' => 'required|string'
        ];
    }
}
