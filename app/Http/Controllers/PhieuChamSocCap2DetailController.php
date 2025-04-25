<?php

namespace App\Http\Controllers;

use App\Exceptions\AppException;
use App\Exceptions\ErrorCode;
use App\Http\Requests\PhieuChamSocCap2DetailCreationRequest;
use App\Http\Resources\ApiResponseResource;
use App\Http\Resources\PhieuChamSocCap2DetailResource;
use App\Models\PhieuChamSocCap2Detail;
use Illuminate\Http\Request;

class PhieuChamSocCap2DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $phieuChamSocCap2Details = PhieuChamSocCap2Detail::all();

        return new ApiResponseResource(PhieuChamSocCap2DetailResource::collection($phieuChamSocCap2Details));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PhieuChamSocCap2DetailCreationRequest $request)
    {
        $phieuChamSocCap2Detail = PhieuChamSocCap2Detail::create([
            'dateTime_care' => $request->dateTime_care,
            'patient_condition' => $request->patient_condition,
            'care_goals' => $request->care_goals,
            'nursing_actions' => $request->nursing_actions,
            'evaluation_notes' => $request->evaluation_notes,
            'nurse_practice_code' => $request->nurse_practice_code,
            'nurse_practice_name' => $request->nurse_practice_name,
            'created_by_userName' => $request->created_by_userName,
            'created_by_loginName' => $request->created_by_loginName,
            'signed' => $request->signed,
            'phieu_cham_soc_cap2_id' => $request->phieu_cham_soc_cap2_id,
        ]);

        return new ApiResponseResource(new PhieuChamSocCap2DetailResource($phieuChamSocCap2Detail));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $phieuChamSocCap2Detail = PhieuChamSocCap2Detail::find($id);
        if(!$phieuChamSocCap2Detail){
            throw new AppException(ErrorCode::PCSC2_DETAIL_NOT_FOUND);
        }
        return new ApiResponseResource(new PhieuChamSocCap2DetailResource($phieuChamSocCap2Detail));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $phieuChamSocCap2Detail = PhieuChamSocCap2Detail::find($id);
        if(!$phieuChamSocCap2Detail){
            throw new AppException(ErrorCode::PCSC2_DETAIL_NOT_FOUND);
        }

        $phieuChamSocCap2Detail->update([
            'dateTime_care' => $request->input('dateTime_care',$phieuChamSocCap2Detail->dateTime_care),
            'patient_condition' => $request->input('patient_condition',$phieuChamSocCap2Detail->patient_condition),
            'care_goals' => $request->input('care_goals',$phieuChamSocCap2Detail->care_goals),
            'nursing_actions' => $request->input('nursing_actions',$phieuChamSocCap2Detail->nursing_actions),
            'evaluation_notes' => $request->input('evaluation_notes',$phieuChamSocCap2Detail->evaluation_notes),
            'nurse_practice_code' => $request->input('nurse_practice_code',$phieuChamSocCap2Detail->nurse_practice_code),
            'nurse_practice_name' => $request->input('nurse_practice_name',$phieuChamSocCap2Detail->nurse_practice_name),
            'signed' => $request->input('signed',$phieuChamSocCap2Detail->signed),
        ]);
        return new ApiResponseResource(new PhieuChamSocCap2DetailResource($phieuChamSocCap2Detail));
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $phieuChamSocCap2Detail = PhieuChamSocCap2Detail::find($id);

        if(!$phieuChamSocCap2Detail){
            throw new AppException(ErrorCode::PCSC2_DETAIL_NOT_FOUND);
        }
        $phieuChamSocCap2Detail->delete();
        return new ApiResponseResource([]);
    }
}
