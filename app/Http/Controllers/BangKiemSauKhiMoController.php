<?php

namespace App\Http\Controllers;

use App\Exceptions\AppException;
use App\Exceptions\ErrorCode;
use App\Http\Controllers\BaseControllers\BaseApiController;
use App\Http\Requests\BangKiemSauKhiMoCreationRequest;
use App\Http\Resources\ApiResponseResource;
use App\Http\Resources\BangKiemSauKhiMoResource;
use App\Models\BangKiemSauKhiMo;
use Illuminate\Http\Request;

class BangKiemSauKhiMoController extends BaseApiController
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
        
        $data = BangKiemSauKhiMo::where('treatment_code',$this->treatmentCode)->with('details');
        foreach ($this->orderBy as $key => $value) {
            $data = $data->orderBy($key, $value);
        }
        $data = $data->get();

        return new ApiResponseResource(BangKiemSauKhiMoResource::collection($data));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BangKiemSauKhiMoCreationRequest $request)
    {
        $bangKiem = BangKiemSauKhiMo::create([
            'treatment_code' => $request->treatment_code,
            'patient_fullname' => $request->patient_fullname,
            'patient_dob' => $request->patient_dob,
            'patient_gender' => $request->patient_gender,
            'dateTime_surgery' => $request->dateTime_surgery,
            'dateTime_end' => $request->dateTime_end,
            'diagnosis_after' => $request->diagnosis_after,
            'type_surgery' => $request->type_surgery,
            'created_by_userName' => $request->created_by_userName,
            'created_by_loginName' => $request->created_by_loginName,
            'signed' => $request->signed,
            'branch_name' => $request->branch_name,
            'parent_organization_name' => $request->parent_organization_name,
        ]);

        return new ApiResponseResource(new BangKiemSauKhiMoResource($bangKiem));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bangKiem = BangKiemSauKhiMo::where('_id', $id)->with('details')->first();

        if(!$bangKiem){
            throw new AppException(ErrorCode::BKSKM_NOT_FOUND);
        }
        return new ApiResponseResource(new BangKiemSauKhiMoResource($bangKiem));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BangKiemSauKhiMoCreationRequest $request, string $id)
    {
        $bangKiem = BangKiemSauKhiMo::find($id);

        if(!$bangKiem){
            throw new AppException(ErrorCode::BKSKM_NOT_FOUND);
        }
        $bangKiem->update([
            'dateTime_surgery' => $request->dateTime_surgery,
            'dateTime_end' => $request->dateTime_end,
            'diagnosis_after' => $request->diagnosis_after,
            'type_surgery' => $request->type_surgery,
            'signed' => $request->signed,
        ]);

        return new ApiResponseResource(new BangKiemSauKhiMoResource($bangKiem));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bangKiem = BangKiemSauKhiMo::find($id);

        if(!$bangKiem){
            throw new AppException(ErrorCode::BKSKM_NOT_FOUND);
        }
        $bangKiem->details()->delete();
        $bangKiem->delete();

        return new ApiResponseResource([]);
    }
}
