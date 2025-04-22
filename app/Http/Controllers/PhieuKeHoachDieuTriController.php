<?php

namespace App\Http\Controllers;

use App\Exceptions\AppException;
use App\Exceptions\ErrorCode;
use App\Http\Requests\PhieuKeHoachDieuTriCreationRequest;
use App\Http\Resources\ApiResponseResource;
use App\Http\Resources\PhieuKeHoachDieuTriResource;
use App\Models\PhieuKeHoachDieuTri;

class PhieuKeHoachDieuTriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
        $phieuKeHoachDieuTris = PhieuKeHoachDieuTri::with("details")->get();
        
        return new ApiResponseResource(PhieuKeHoachDieuTriResource::collection($phieuKeHoachDieuTris));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PhieuKeHoachDieuTriCreationRequest $request)
    {
        $phieuKeHoachDieuTri = PhieuKeHoachDieuTri::create([
            'patient_code' => $request->patient_code,
            'patient_fullname' => $request->patient_fullname,
            'patient_dob' => $request->patient_dob,
            'patient_gender' => $request->patient_gender,
            'in_time' => $request->in_time,
            'department' => $request->department,
            'bed_number' => $request->bed_number,
            'bed_room' => $request->bed_room,
            'icd_code' => $request->icd_code,
            'icd_name' => $request->icd_name,
            'icd_subCode' => $request->icd_subCode,
            'icd_text' => $request->icd_text,
            'patient_request_first' => $request->patient_request_first,
            'patient_request_second' => $request->patient_request_second,
            'patient_request_last' => $request->patient_request_last,
            'estimated_hospital_days' => $request->estimated_hospital_days,
            'estimated_total_cost' => $request->estimated_total_cost,
            'patient_relative_type' => $request->patient_relative_type,
            'patient_relative_name' => $request->patient_relative_name,
            'treatment_doctor_loginName' => $request->treatment_doctor_loginName,
            'treatment_doctor_userName' => $request->treatment_doctor_userName,
            'department_head_approved_loginName' => $request->department_head_approved_loginName,
            'department_head_approved_userName' => $request->department_head_approved_userName,
            'created_by_loginName' => $request->created_by_loginName,
            'created_by_userName' => $request->created_by_userName,
            'signed' => $request->signed,
        ]);
    
        return new ApiResponseResource(new PhieuKeHoachDieuTriResource($phieuKeHoachDieuTri));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $phieuKeHoachDieuTri = PhieuKeHoachDieuTri::where('_id', $id)->with('details')->first();

        if(!$phieuKeHoachDieuTri){
            throw new AppException(ErrorCode::PKHDT_NOT_FOUND);
        }
        return new ApiResponseResource(new PhieuKeHoachDieuTriResource($phieuKeHoachDieuTri));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PhieuKeHoachDieuTri $request, $id)
    {
        $phieuKeHoachDieuTri = PhieuKeHoachDieuTri::where('_id', $id)->with('details')->first();

        if(!$phieuKeHoachDieuTri){
            throw new AppException(ErrorCode::PKHDT_NOT_FOUND);
        }
        $phieuKeHoachDieuTri->update([
            'department'=> $request->input('department',$phieuKeHoachDieuTri->department),
            'bed_number'=> $request->input('bed_number',$phieuKeHoachDieuTri->bed_number),
            'bed_room'=> $request->input('bed_room',$phieuKeHoachDieuTri->bed_room),
            'icd_code'=> $request->input('icd_code',$phieuKeHoachDieuTri->icd_code),
            'icd_name'=> $request->input('icd_name',$phieuKeHoachDieuTri->icd_name),
            'icd_subCode'=> $request->input('icd_subCode',$phieuKeHoachDieuTri->icd_subCode),
            'icd_text'=> $request->input('icd_text',$phieuKeHoachDieuTri->icd_text),
            'patient_request_first'=> $request->input('patient_request_first',$phieuKeHoachDieuTri->patient_request_first),
            'patient_request_second'=> $request->input('patient_request_second',$phieuKeHoachDieuTri->patient_request_second),
            'patient_request_last'=> $request->input('patient_request_last',$phieuKeHoachDieuTri->patient_request_last),
            'estimated_hospital_days'=> $request->input('estimated_hospital_days',$phieuKeHoachDieuTri->estimated_hospital_days),
            'estimated_total_cost'=> $request->input('estimated_total_cost',$phieuKeHoachDieuTri->estimated_total_cost),
            'treatment_doctor_loginName'=> $request->input('treatment_doctor_loginName',$phieuKeHoachDieuTri->treatment_doctor_loginName),
            'treatment_doctor_userName'=> $request->input('treatment_doctor_userName',$phieuKeHoachDieuTri->treatment_doctor_userName),
            'department_head_approved_loginName'=> $request->input('department_head_approved_loginName',$phieuKeHoachDieuTri->department_head_approved_loginName),
            'department_head_approved_userName'=> $request->input('department_head_approved_userName',$phieuKeHoachDieuTri->department_head_approved_userName),
            'signed' => $request->input('signed',$phieuKeHoachDieuTri->signed),
        ]);

        return new ApiResponseResource(new PhieuKeHoachDieuTriResource($phieuKeHoachDieuTri));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $phieuKeHoachDieuTri = PhieuKeHoachDieuTri::find($id);

        if(!$phieuKeHoachDieuTri){
            throw new AppException(ErrorCode::PKHDT_NOT_FOUND);
        }
        // $phieuKeHoachDieuTri->details()->delete();
        $phieuKeHoachDieuTri->delete();
        return new ApiResponseResource([]);
    }
}
