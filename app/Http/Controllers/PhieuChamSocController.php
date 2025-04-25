<?php

namespace App\Http\Controllers;

use App\Exceptions\AppException;
use App\Exceptions\ErrorCode;
use App\Http\Requests\PhieuChamSocCreationRequest;
use App\Http\Resources\ApiResponseResource;
use App\Http\Resources\PhieuChamSocResource;
use App\Models\PhieuChamSoc;

class PhieuChamSocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $phieuChamSocs = PhieuChamSoc::with('details')->get();
        
        return new ApiResponseResource(PhieuChamSocResource::collection($phieuChamSocs));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(PhieuChamSocCreationRequest $request)
    {
        $phieuChamSoc = PhieuChamSoc::create([
            'treatment_code' => $request->treatment_code,
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
    
        return new ApiResponseResource(new PhieuChamSocResource($phieuChamSoc));
    }   

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $phieuChamSoc = PhieuChamSoc::where('_id', $id)->with('details')->first();

        if(!$phieuChamSoc){
            throw new AppException(ErrorCode::PCS_NOT_FOUND);
        }
        return new ApiResponseResource(new PhieuChamSocResource($phieuChamSoc));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(PhieuChamSocCreationRequest $request,string $id)
    {
        $phieuChamSoc = PhieuChamSoc::find($id);

        if(!$phieuChamSoc){
            throw new AppException(ErrorCode::PCS_NOT_FOUND);
        }

        $phieuChamSoc->update([
            'receipt_number'=> $request->input('receipt_number',$phieuChamSoc->receipt_number),
            'department'=> $request->input('department',$phieuChamSoc->department),
            'bed_number'=> $request->input('bed_number',$phieuChamSoc->bed_number),
            'bed_room'=> $request->input('bed_room',$phieuChamSoc->bed_room),
            'icd_code'=> $request->input('icd_code',$phieuChamSoc->icd_code),
            'icd_name'=> $request->input('icd_name',$phieuChamSoc->icd_name),
            'icd_subCode'=> $request->input('icd_subCode',$phieuChamSoc->icd_subCode),
            'icd_text'=> $request->input('icd_text',$phieuChamSoc->icd_text),
            'signed' => $request->input('signed',$phieuChamSoc->signed),
        ]);
        return new ApiResponseResource(new PhieuChamSocResource($phieuChamSoc));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $phieuChamSoc = PhieuChamSoc::find($id);

        if(!$phieuChamSoc){
            throw new AppException(ErrorCode::PCS_NOT_FOUND);
        }
        $phieuChamSoc->details()->delete();
        $phieuChamSoc->delete();

        return new ApiResponseResource([]);
    }
}
