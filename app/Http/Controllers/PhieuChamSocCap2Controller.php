<?php

namespace App\Http\Controllers;

use App\Exceptions\AppException;
use App\Exceptions\ErrorCode;
use App\Http\Controllers\BaseControllers\BaseApiController;
use App\Http\Requests\PhieuChamSocCap2CreationRequest;
use App\Http\Resources\ApiResponseResource;
use App\Http\Resources\PhieuChamSocCap2Resource;
use App\Models\PhieuChamSocCap2;
use Illuminate\Http\Request;

class PhieuChamSocCap2Controller extends BaseApiController
{
    public function __construct(Request $request){
        parent::__construct($request);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!$this->treatmentCode){
            throw new AppException(ErrorCode::UNDEFINED_ERROR);
        }
        
        $data = PhieuChamSocCap2::where('treatment_code',$this->treatmentCode)->with('details');
        foreach ($this->orderBy as $key => $value) {
            $data = $data->orderBy($key, $value);
        }
        $data = $data->get();

        return new ApiResponseResource(PhieuChamSocCap2Resource::collection($data));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PhieuChamSocCap2CreationRequest $request)
    {
        $phieuChamSocCap2 = PhieuChamSocCap2::create([
            'treatment_code' => $request->treatment_code,
            'in_time' => $request->in_time,
            'hospitalization_number' => $request->hospitalization_number,
            'receipt_number' => $request->receipt_number,
            'department' => $request->department,
            'patient_fullname' => $request->patient_fullname,
            'patient_dob' => $request->patient_dob,
            'patient_gender' => $request->patient_gender,
            'bed_number' => $request->bed_number,
            'bed_room' => $request->bed_room,
            'icd_code' => $request->icd_code,
            'icd_name' => $request->icd_name,
            'icd_subCode' => $request->icd_subCode,
            'icd_text' => $request->icd_text,
            'created_by_userName' => $request->created_by_userName,
            'created_by_loginName' => $request->created_by_loginName,
            'signed' => $request->signed,
        ]);
    
        return new ApiResponseResource(new PhieuChamSocCap2Resource($phieuChamSocCap2));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $phieuChamSocCap2 = PhieuChamSocCap2::where('_id', $id)->with('details')->first();

        if(!$phieuChamSocCap2){
            throw new AppException(ErrorCode::PCSC2_NOT_FOUND);
        }
        return new ApiResponseResource(new PhieuChamSocCap2Resource($phieuChamSocCap2));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PhieuChamSocCap2CreationRequest $request, string $id)
    {
        $phieuChamSocCap2 = PhieuChamSocCap2::where('_id', $id)->with('details')->first();

        if(!$phieuChamSocCap2){
            throw new AppException(ErrorCode::PCSC2_NOT_FOUND);
        }

        $phieuChamSocCap2->update([
            'receipt_number'=> $request->input('receipt_number',$phieuChamSocCap2->receipt_number),
            'department'=> $request->input('department',$phieuChamSocCap2->department),
            'bed_number'=> $request->input('bed_number',$phieuChamSocCap2->bed_number),
            'bed_room'=> $request->input('bed_room',$phieuChamSocCap2->bed_room),
            'icd_code'=> $request->input('icd_code',$phieuChamSocCap2->icd_code),
            'icd_name'=> $request->input('icd_name',$phieuChamSocCap2->icd_name),
            'icd_subCode'=> $request->input('icd_subCode',$phieuChamSocCap2->icd_subCode),
            'icd_text'=> $request->input('icd_text',$phieuChamSocCap2->icd_text),
            'signed' => $request->input('signed',$phieuChamSocCap2->signed),
        ]);
        return new ApiResponseResource(new PhieuChamSocCap2Resource($phieuChamSocCap2));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $phieuChamSocCap2 = PhieuChamSocCap2::where('_id', $id)->with('details')->first();

        if(!$phieuChamSocCap2){
            throw new AppException(ErrorCode::PCSC2_NOT_FOUND);
        }
        $phieuChamSocCap2->details()->delete();
        $phieuChamSocCap2->delete();

        return new ApiResponseResource([]);
    }
}
