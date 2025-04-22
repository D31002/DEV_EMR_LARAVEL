<?php

namespace App\Http\Controllers;

use App\Exceptions\AppException;
use App\Exceptions\ErrorCode;
use App\Http\Requests\MonitoringScheduleCreationRequest;
use App\Http\Resources\ApiResponseResource;
use App\Http\Resources\MonitoringScheduleResource;
use App\Models\MonitoringSchedule;

class MonitoringScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $monitoringSchedules = MonitoringSchedule::all();

        return new ApiResponseResource(MonitoringScheduleResource::collection($monitoringSchedules));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MonitoringScheduleCreationRequest $request)
    {
        $monitoringSchedule = MonitoringSchedule::create([
            'monitoring_dateTime' => $request->monitoring_dateTime,
            'progress_notes' => $request->progress_notes,
            'care_orders' => $request->care_orders,
            'signer' => $request->signer,
            'signer_name' => $request->signer_name,
            'signed' => $request->signed,
            'created_by_userName' => $request->created_by_userName,
            'created_by_loginName' => $request->created_by_loginName,
            'care_id' => $request->care_id
        ]);

        return new ApiResponseResource(new MonitoringScheduleResource($monitoringSchedule));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $monitoringSchedule = MonitoringSchedule::find($id);
        if(!$monitoringSchedule){
            throw new AppException(ErrorCode::PCS_MONITORING_SCHEDULE_NOT_FOUND);
        }
        return new ApiResponseResource(new MonitoringScheduleResource($monitoringSchedule));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MonitoringScheduleCreationRequest $request, $id)
    {
        $monitoringSchedule = MonitoringSchedule::find($id);

        if(!$monitoringSchedule){
            throw new AppException(ErrorCode::PCS_MONITORING_SCHEDULE_NOT_FOUND);
        }
        $monitoringSchedule->update([
            'monitoring_dateTime' => $request->input('monitoring_dateTime',$monitoringSchedule->monitoring_dateTime),
            'progress_notes' => $request->input('progress_notes',$monitoringSchedule->progress_notes),
            'care_orders' => $request->input('care_orders',$monitoringSchedule->care_orders),
            'signer' => $request->input('signer',$monitoringSchedule->signer),
            'signer_name' => $request->input('signer_name',$monitoringSchedule->signer_name),
            'signed' => $request->input('signed',$monitoringSchedule->signed),
        ]);
        return new ApiResponseResource(new MonitoringScheduleResource($monitoringSchedule));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $monitoringSchedule = MonitoringSchedule::find($id);
        
        if(!$monitoringSchedule){
            throw new AppException(ErrorCode::PCS_MONITORING_SCHEDULE_NOT_FOUND);
        }
        $monitoringSchedule->delete();
        return new ApiResponseResource([]);
    }
}
