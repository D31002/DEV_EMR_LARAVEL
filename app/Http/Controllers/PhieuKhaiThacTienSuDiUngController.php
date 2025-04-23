<?php

namespace App\Http\Controllers;

use App\Exceptions\AppException;
use App\Exceptions\ErrorCode;
use App\Http\Requests\PhieuKhaiThacTienSuDiUngCreationRequest;
use App\Http\Resources\ApiResponseResource;
use App\Http\Resources\PhieuKhaiThacTienSuDiUngResource;
use App\Models\PhieuKhaiThacTienSuDiUng;
use Illuminate\Http\Request;

class PhieuKhaiThacTienSuDiUngController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $phieuKhaiThacTienSuDiUngs = PhieuKhaiThacTienSuDiUng::all();
        
        return new ApiResponseResource(PhieuKhaiThacTienSuDiUngResource::collection($phieuKhaiThacTienSuDiUngs));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PhieuKhaiThacTienSuDiUngCreationRequest $request)
    {
        $phieuKhaiThacTienSuDiUng = PhieuKhaiThacTienSuDiUng::create([
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
            'allergy_history' => $request->allergy_history,
            'collection_date' => $request->collection_date,
            'treatment_doctor_loginName' => $request->treatment_doctor_loginName,
            'treatment_doctor_userName' => $request->treatment_doctor_userName,
            'information_collector_loginName' => $request->information_collector_loginName,
            'information_collector_userName' => $request->information_collector_userName,
            'created_by_loginName' => $request->created_by_loginName,
            'created_by_userName' => $request->created_by_userName,
            'signed' => $request->signed,
        ]);

        return new ApiResponseResource(new PhieuKhaiThacTienSuDiUngResource($phieuKhaiThacTienSuDiUng));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $phieuKhaiThacTienSuDiUng = PhieuKhaiThacTienSuDiUng::where('_id', $id)->first();

        if(!$phieuKhaiThacTienSuDiUng){
            throw new AppException(ErrorCode::PKTTSDU_NOT_FOUND);
        }
        return new ApiResponseResource(new PhieuKhaiThacTienSuDiUngResource($phieuKhaiThacTienSuDiUng));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PhieuKhaiThacTienSuDiUngCreationRequest $request,$id)
    {
        $phieuKhaiThacTienSuDiUng = PhieuKhaiThacTienSuDiUng::where('_id', $id)->first();

        if(!$phieuKhaiThacTienSuDiUng){
            throw new AppException(ErrorCode::PKTTSDU_NOT_FOUND);
        }

        $phieuKhaiThacTienSuDiUng->update([
            'department'=> $request->input('department',$phieuKhaiThacTienSuDiUng->department),
            'bed_number'=> $request->input('bed_number',$phieuKhaiThacTienSuDiUng->bed_number),
            'bed_room'=> $request->input('bed_room',$phieuKhaiThacTienSuDiUng->bed_room),
            'icd_code'=> $request->input('icd_code',$phieuKhaiThacTienSuDiUng->icd_code),
            'icd_name'=> $request->input('icd_name',$phieuKhaiThacTienSuDiUng->icd_name),
            'icd_subCode'=> $request->input('icd_subCode',$phieuKhaiThacTienSuDiUng->icd_subCode),
            'icd_text'=> $request->input('icd_text',$phieuKhaiThacTienSuDiUng->icd_text),
            'allergy_history'=> $request->input('allergy_history',$phieuKhaiThacTienSuDiUng->allergy_history),
            'collection_date'=> $request->input('collection_date',$phieuKhaiThacTienSuDiUng->collection_date),
            'treatment_doctor_loginName'=> $request->input('treatment_doctor_loginName',$phieuKhaiThacTienSuDiUng->treatment_doctor_loginName),
            'treatment_doctor_userName'=> $request->input('treatment_doctor_userName',$phieuKhaiThacTienSuDiUng->treatment_doctor_userName),
            'information_collector_loginName'=> $request->input('information_collector_loginName',$phieuKhaiThacTienSuDiUng->information_collector_loginName),
            'information_collector_userName'=> $request->input('information_collector_userName',$phieuKhaiThacTienSuDiUng->information_collector_userName),
            'signed' => $request->input('signed',$phieuKhaiThacTienSuDiUng->signed),
        ]);

        return new ApiResponseResource(new PhieuKhaiThacTienSuDiUngResource($phieuKhaiThacTienSuDiUng));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $phieuKhaiThacTienSuDiUng = PhieuKhaiThacTienSuDiUng::where('_id', $id)->first();

        if(!$phieuKhaiThacTienSuDiUng){
            throw new AppException(ErrorCode::PKTTSDU_NOT_FOUND);
        }

        // $phieuKhaiThacTienSuDiUng->details()->delete();
        $phieuKhaiThacTienSuDiUng->delete();
        return new ApiResponseResource([]);
    }
}
