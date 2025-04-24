<?php

namespace App\Http\Controllers;

use App\Exceptions\AppException;
use App\Exceptions\ErrorCode;
use App\Http\Requests\PhieuChamSocDetailCreationRequest;
use App\Http\Resources\ApiResponseResource;
use App\Http\Resources\PhieuChamSocDetailResource;
use App\Models\PhieuChamSocDetail;

class PhieuChamSocDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $phieuChamSocDetails = PhieuChamSocDetail::all();

        return new ApiResponseResource(PhieuChamSocDetailResource::collection($phieuChamSocDetails));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PhieuChamSocDetailCreationRequest $request)
    {
        $phieuChamSocDetail = PhieuChamSocDetail::create([
            'monitoring_dateTime' => $request->monitoring_dateTime,
            'progress_notes' => $request->progress_notes,
            'care_orders' => $request->care_orders,
            'signer_code' => $request->signer_code,
            'signer_name' => $request->signer_name,
            'signed' => $request->signed,
            'created_by_userName' => $request->created_by_userName,
            'created_by_loginName' => $request->created_by_loginName,
            'phieu_cham_soc_id' => $request->phieu_cham_soc_id
        ]);

        return new ApiResponseResource(new PhieuChamSocDetailResource($phieuChamSocDetail));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $phieuChamSocDetail = PhieuChamSocDetail::find($id);
        if(!$phieuChamSocDetail){
            throw new AppException(ErrorCode::PCS_MONITORING_SCHEDULE_NOT_FOUND);
        }
        return new ApiResponseResource(new PhieuChamSocDetailResource($phieuChamSocDetail));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PhieuChamSocDetailCreationRequest $request, $id)
    {
        $phieuChamSocDetail = PhieuChamSocDetail::find($id);

        if(!$phieuChamSocDetail){
            throw new AppException(ErrorCode::PCS_MONITORING_SCHEDULE_NOT_FOUND);
        }
        $phieuChamSocDetail->update([
            'monitoring_dateTime' => $request->input('monitoring_dateTime',$phieuChamSocDetail->monitoring_dateTime),
            'progress_notes' => $request->input('progress_notes',$phieuChamSocDetail->progress_notes),
            'care_orders' => $request->input('care_orders',$phieuChamSocDetail->care_orders),
            'signer_code' => $request->input('signer_code',$phieuChamSocDetail->signer_code),
            'signer_name' => $request->input('signer_name',$phieuChamSocDetail->signer_name),
            'signed' => $request->input('signed',$phieuChamSocDetail->signed),
        ]);
        return new ApiResponseResource(new PhieuChamSocDetailResource($phieuChamSocDetail));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $phieuChamSocDetail = PhieuChamSocDetail::find($id);
        
        if(!$phieuChamSocDetail){
            throw new AppException(ErrorCode::PCS_MONITORING_SCHEDULE_NOT_FOUND);
        }
        $phieuChamSocDetail->delete();
        return new ApiResponseResource([]);
    }
}
