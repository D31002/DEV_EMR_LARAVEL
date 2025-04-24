<?php

namespace App\Http\Controllers;

use App\Exceptions\AppException;
use App\Exceptions\ErrorCode;
use App\Http\Requests\PhieuTruyenDichDetailCreationRequest;
use App\Http\Resources\ApiResponseResource;
use App\Http\Resources\PhieuKeHoachDieuTriDetailResource;
use App\Http\Resources\PhieuTruyenDichDetailResource;
use App\Http\Resources\PhieuTruyenDichResource;
use App\Models\PhieuTruyenDichDetail;

class PhieuTruyenDichDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $details = PhieuTruyenDichDetail::all();
        
        return new ApiResponseResource(PhieuTruyenDichDetailResource::collection($details));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PhieuTruyenDichDetailCreationRequest $request)
    {
        $phieuTruyenDichDetail = PhieuTruyenDichDetail::create([
            'monitoring_dateTime' => $request->monitoring_dateTime,
            'transmission_name' => $request->transmission_name,
            'capacity_transmission' => $request->capacity_transmission,
            'amount_transmission' => $request->amount_transmission,
            'unit_transmission' => $request->unit_transmission,
            'unit_transmission_name' => $request->unit_transmission_name,
            'unit_convert' => $request->unit_convert,
            'production_batch_transmission' => $request->production_batch_transmission,
            'medicine_name' => $request->medicine_name,
            'amount_medicine' => $request->amount_medicine,
            'production_batch_medicine' => $request->production_batch_medicine,
            'speed' => $request->speed,
            'inTime' => $request->inTime,
            'endTime' => $request->endTime,
            'doctor_prescribed_code' => $request->doctor_prescribed_code,
            'doctor_prescribed_name' => $request->doctor_prescribed_name,
            'nurse_practice_code' => $request->nurse_practice_code,
            'nurse_practice_name' => $request->nurse_practice_name,
            'created_by_userName' => $request->created_by_userName,
            'created_by_loginName' => $request->created_by_loginName,
            'signed' => $request->signed,
            'phieu_truyen_dich_id' => $request->phieu_truyen_dich_id
        ]);

        return new ApiResponseResource(new PhieuTruyenDichDetailResource($phieuTruyenDichDetail));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $phieuTruyenDichDetail = PhieuTruyenDichDetail::where('_id', $id)->first();

        if(!$phieuTruyenDichDetail){
            throw new AppException(ErrorCode::PTD_DETAIL_NOT_FOUND);
        }
        return new ApiResponseResource(new PhieuTruyenDichDetailResource($phieuTruyenDichDetail));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PhieuTruyenDichDetailCreationRequest $request, $id)
    {
        $phieuTruyenDichDetail = PhieuTruyenDichDetail::find($id);

        if(!$phieuTruyenDichDetail){
            throw new AppException(ErrorCode::PTD_DETAIL_NOT_FOUND);
        }

        $phieuTruyenDichDetail->update([
            'monitoring_dateTime' => $request->input('monitoring_dateTime',$phieuTruyenDichDetail->monitoring_dateTime),
            'transmission_name'=> $request->input('transmission_name',$phieuTruyenDichDetail->transmission_name),
            'capacity_transmission'=> $request->input('capacity_transmission',$phieuTruyenDichDetail->capacity_transmission),
            'amount_transmission'=> $request->input('amount_transmission',$phieuTruyenDichDetail->amount_transmission),
            'unit_transmission'=> $request->input('unit_transmission',$phieuTruyenDichDetail->unit_transmission),
            'unit_transmission_name'=> $request->input('unit_transmission_name',$phieuTruyenDichDetail->unit_transmission_name),
            'unit_convert'=> $request->input('unit_convert',$phieuTruyenDichDetail->unit_convert),
            'production_batch_transmission'=> $request->input('production_batch_transmission',$phieuTruyenDichDetail->production_batch_transmission),
            'medicine_name'=> $request->input('medicine_name',$phieuTruyenDichDetail->medicine_name),
            'amount_medicine'=> $request->input('amount_medicine',$phieuTruyenDichDetail->amount_medicine),
            'production_batch_medicine'=> $request->input('production_batch_medicine',$phieuTruyenDichDetail->production_batch_medicine),
            'speed'=> $request->input('speed',$phieuTruyenDichDetail->speed),
            'inTime'=> $request->input('inTime',$phieuTruyenDichDetail->inTime),
            'endTime'=> $request->input('endTime',$phieuTruyenDichDetail->endTime),
            'doctor_prescribed_code'=> $request->input('doctor_prescribed_code',$phieuTruyenDichDetail->doctor_prescribed_code),
            'doctor_prescribed_name'=> $request->input('doctor_prescribed_name',$phieuTruyenDichDetail->doctor_prescribed_name),
            'nurse_practice_code'=> $request->input('nurse_practice_code',$phieuTruyenDichDetail->nurse_practice_code),
            'nurse_practice_name'=> $request->input('nurse_practice_name',$phieuTruyenDichDetail->nurse_practice_name),
            'signed'=> $request->input('signed',$phieuTruyenDichDetail->signed),
        ]);

        return new ApiResponseResource(new PhieuTruyenDichDetailResource($phieuTruyenDichDetail));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $phieuTruyenDichDetail = PhieuTruyenDichDetail::find($id);
        
        if(!$phieuTruyenDichDetail){
            throw new AppException(ErrorCode::PTD_DETAIL_NOT_FOUND);
        }
        $phieuTruyenDichDetail->delete();
        return new ApiResponseResource([]);
    }
}
