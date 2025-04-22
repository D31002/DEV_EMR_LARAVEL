<?php

namespace App\Http\Controllers;

use App\Exceptions\AppException;
use App\Exceptions\ErrorCode;
use App\Http\Requests\PhieuKeHoachDieuTriDetailCreationRequest;
use App\Http\Resources\ApiResponseResource;
use App\Http\Resources\PhieuKeHoachDieuTriDetailResource;
use App\Models\PhieuKeHoachDieuTriDetail;
use Illuminate\Http\Request;

class PhieuKeHoachDieuTriDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $details = PhieuKeHoachDieuTriDetail::all();
        
        return new ApiResponseResource(PhieuKeHoachDieuTriDetailResource::collection($details));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PhieuKeHoachDieuTriDetailCreationRequest $request)
    {
        $phieuKeHoachDieuTriDetail = PhieuKeHoachDieuTriDetail::create([
            'issue' => $request->issue,
            'clinical_tests' => $request->clinical_tests,
            'treatment_plan' => $request->treatment_plan,
            'note' => $request->note,
            'phieu_ke_hoach_dieu_tri_id' => $request->phieu_ke_hoach_dieu_tri_id
        ]);

        return new ApiResponseResource(new PhieuKeHoachDieuTriDetailResource($phieuKeHoachDieuTriDetail));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $phieuKeHoachDieuTriDetail = PhieuKeHoachDieuTriDetail::where('_id', $id)->first();

        if(!$phieuKeHoachDieuTriDetail){
            throw new AppException(ErrorCode::PKHDT_DETAIL_NOT_FOUND);
        }
        return new ApiResponseResource(new PhieuKeHoachDieuTriDetailResource($phieuKeHoachDieuTriDetail));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $phieuKeHoachDieuTriDetail = PhieuKeHoachDieuTriDetail::find($id);

        if(!$phieuKeHoachDieuTriDetail){
            throw new AppException(ErrorCode::PKHDT_DETAIL_NOT_FOUND);
        }

        $phieuKeHoachDieuTriDetail->update([
            'issue' => $request->input('issue',$phieuKeHoachDieuTriDetail->issue),
            'clinical_tests'=> $request->input('clinical_tests',$phieuKeHoachDieuTriDetail->clinical_tests),
            'treatment_plan'=> $request->input('treatment_plan',$phieuKeHoachDieuTriDetail->treatment_plan),
            'note'=> $request->input('note',$phieuKeHoachDieuTriDetail->note),
        ]);

        return new ApiResponseResource(new PhieuKeHoachDieuTriDetailResource($phieuKeHoachDieuTriDetail));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $phieuKeHoachDieuTriDetail = PhieuKeHoachDieuTriDetail::find($id);
        
        if(!$phieuKeHoachDieuTriDetail){
            throw new AppException(ErrorCode::PKHDT_DETAIL_NOT_FOUND);
        }
        $phieuKeHoachDieuTriDetail->delete();
        return new ApiResponseResource([]);
    }
}
