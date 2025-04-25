<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhieuTruyenDichDetailCreationRequest extends FormRequest
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
            'monitoring_dateTime'          => 'required|string',
            'transmission_name'            => 'nullable|string',
            'capacity_transmission'        => 'nullable|string',
            'amount_transmission'          => 'nullable|string',
            'unit_transmission'            => 'nullable|string',
            'production_batch_transmission'=> 'nullable|string',
            'medicine_name'                => 'nullable|string',
            'amount_medicine'              => 'nullable|string',
            'production_batch_medicine'    => 'nullable|string',
            'speed'                        => 'nullable|string',
            'inTime'                       => 'nullable|string',
            'endTime'                      => 'nullable|string',
            'doctor_prescribed_code'       => 'nullable|string',
            'doctor_prescribed_name'       => 'nullable|string',
            'nurse_practice_code'          => 'nullable|string',
            'nurse_practice_name'          => 'nullable|string',
            'created_by_userName'          => 'required|string',
            'created_by_loginName'         => 'required|string',
            'signed'                       => 'required|boolean',
            'phieu_truyen_dich_id'         => 'required|exists:phieu_truyen_diches,id',
        ];
    }
}
