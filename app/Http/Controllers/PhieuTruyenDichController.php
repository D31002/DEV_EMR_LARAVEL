<?php

namespace App\Http\Controllers;

use App\Exceptions\AppException;
use App\Exceptions\ErrorCode;
use App\Http\Controllers\BaseControllers\BaseApiController;
use App\Http\Requests\PhieuTruyenDichCreationRequest;
use App\Http\Resources\ApiResponseResource;
use App\Http\Resources\PhieuTruyenDichResource;
use App\Models\PhieuTruyenDich;
use Illuminate\Http\Request;

class PhieuTruyenDichController extends BaseApiController
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
        
        $data = PhieuTruyenDich::where('treatment_code',$this->treatmentCode)->with('details');
        foreach ($this->orderBy as $key => $value) {
            $data = $data->orderBy($key, $value);
        }
        $data = $data->get();

        return new ApiResponseResource(PhieuTruyenDichResource::collection($data));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PhieuTruyenDichCreationRequest $request)
    {
        $phieuTruyenDich = PhieuTruyenDich::create([
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
    
        return new ApiResponseResource(new PhieuTruyenDichResource($phieuTruyenDich));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $phieuTruyenDich = PhieuTruyenDich::where('_id', $id)->with('details')->first();

        if(!$phieuTruyenDich){
            throw new AppException(ErrorCode::PTD_NOT_FOUND);
        }
        return new ApiResponseResource(new PhieuTruyenDichResource($phieuTruyenDich));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PhieuTruyenDichCreationRequest $request, $id)
    {
        $phieuTruyenDich = PhieuTruyenDich::find($id);

        if(!$phieuTruyenDich){
            throw new AppException(ErrorCode::PTD_NOT_FOUND);
        }

        $phieuTruyenDich->update([
            'signed' => $request->input('signed',$phieuTruyenDich->signed),
            'receipt_number'=> $request->input('receipt_number',$phieuTruyenDich->receipt_number),
            'department'=> $request->input('department',$phieuTruyenDich->department),
            'bed_number'=> $request->input('bed_number',$phieuTruyenDich->bed_number),
            'bed_room'=> $request->input('bed_room',$phieuTruyenDich->bed_room),
            'icd_code'=> $request->input('icd_code',$phieuTruyenDich->icd_code),
            'icd_name'=> $request->input('icd_name',$phieuTruyenDich->icd_name),
            'icd_subCode'=> $request->input('icd_subCode',$phieuTruyenDich->icd_subCode),
            'icd_text'=> $request->input('icd_text',$phieuTruyenDich->icd_text),
        ]);

        return new ApiResponseResource(new PhieuTruyenDichResource($phieuTruyenDich));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $phieuTruyenDich = PhieuTruyenDich::find($id);

        if(!$phieuTruyenDich){
            throw new AppException(ErrorCode::PTD_NOT_FOUND);
        }
        $phieuTruyenDich->details()->delete();
        $phieuTruyenDich->delete();
        return new ApiResponseResource([]);
    }
}
