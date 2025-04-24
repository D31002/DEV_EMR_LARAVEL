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
            'transmission_name'            => 'required|string',
            'capacity_transmission'        => 'required|string',
            'amount_transmission'          => 'required|string',
            'unit_transmission'            => 'required|string',
            'production_batch_transmission'=> 'required|string',
            'medicine_name'                => 'required|string',
            'amount_medicine'              => 'required|string',
            'production_batch_medicine'    => 'required|string',
            'speed'                        => 'required|string',
            'inTime'                       => 'required|string',
            'endTime'                      => 'required|string',
            'doctor_prescribed_code'       => 'required|string',
            'doctor_prescribed_name'       => 'required|string',
            'nurse_practice_code'          => 'required|string',
            'nurse_practice_name'          => 'required|string',
            'created_by_userName'          => 'required|string',
            'created_by_loginName'         => 'required|string',
            'signed'                       => 'boolean',
            'phieu_truyen_dich_id'         => 'required|exists:phieu_truyen_diches,id',
        ];
    }
}
