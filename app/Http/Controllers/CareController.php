<?php

namespace App\Http\Controllers;

use App\Exceptions\AppException;
use App\Exceptions\ErrorCode;
use App\Http\Requests\CareCreationRequest;
use App\Http\Resources\ApiResponseResource;
use App\Http\Resources\CareResource;
use App\Models\Care;

class CareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cares = Care::with('monitoringSchedules')->get();
        
        return new ApiResponseResource(CareResource::collection($cares));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(CareCreationRequest $request)
    {
        $care = Care::create([
            'created_by_userName' => $request->created_by_userName,
            'created_by_loginName' => $request->created_by_loginName,
            'signed' => $request->signed,
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
            'icd_text' => $request->icd_text
        ]);
    
        return new ApiResponseResource(new CareResource($care));
    }   

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $care = Care::where('_id', $id)->with('monitoringSchedules')->first();

        if(!$care){
            throw new AppException(ErrorCode::PCS_NOT_FOUND);
        }
        return new ApiResponseResource(new CareResource($care));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(CareCreationRequest $request, $id)
    {
        $care = Care::find($id);

        if(!$care){
            throw new AppException(ErrorCode::PCS_NOT_FOUND);
        }

        $care->update([
            'signed' => $request->input('signed',$care->signed),
            'receipt_number'=> $request->input('receipt_number',$care->receipt_number),
            'department'=> $request->input('department',$care->department),
            'bed_number'=> $request->input('bed_number',$care->bed_number),
            'bed_room'=> $request->input('bed_room',$care->bed_room),
            'icd_code'=> $request->input('icd_code',$care->icd_code),
            'icd_name'=> $request->input('icd_name',$care->icd_name),
            'icd_subCode'=> $request->input('icd_subCode',$care->icd_subCode),
            'icd_text'=> $request->input('icd_text',$care->icd_text),
        ]);
        return new ApiResponseResource(new CareResource($care));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $care = Care::find($id);

        if(!$care){
            throw new AppException(ErrorCode::PCS_NOT_FOUND);
        }
        $care->monitoringSchedules()->delete();
        $care->delete();

        return new ApiResponseResource([]);
    }
}
