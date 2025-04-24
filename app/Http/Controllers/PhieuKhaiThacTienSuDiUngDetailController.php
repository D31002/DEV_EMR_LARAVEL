<?php

namespace App\Http\Controllers;

use App\Exceptions\AppException;
use App\Exceptions\ErrorCode;
use App\Http\Requests\PhieuKhaiThacTienSuDiUngDetailCreationRequest;
use App\Http\Resources\ApiResponseResource;
use App\Http\Resources\PhieuKhaiThacTienSuDiUngDetailResource;
use App\Models\PhieuKhaiThacTienSuDiUngDetail;
use Illuminate\Http\Request;

class PhieuKhaiThacTienSuDiUngDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $details = PhieuKhaiThacTienSuDiUngDetail::all();
        
        return new ApiResponseResource(PhieuKhaiThacTienSuDiUngDetailResource::collection($details));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PhieuKhaiThacTienSuDiUngDetailCreationRequest $request)
    {
        $phieuKhaiThacTienSuDiUngDetail = PhieuKhaiThacTienSuDiUngDetail::create([
            'stt' => $request->stt,
            'content' => $request->content,
            'allergen_name' => $request->allergen_name,
            'occur_times' => $request->occur_times,
            'no_reaction' => $request->no_reaction,
            'reaction_handling' => $request->reaction_handling,
            'phieu_khai_thac_tien_su_di_ung_id' => $request->phieu_khai_thac_tien_su_di_ung_id,
        ]);

        return new ApiResponseResource(new PhieuKhaiThacTienSuDiUngDetailResource($phieuKhaiThacTienSuDiUngDetail));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $phieuKhaiThacTienSuDiUngDetail = PhieuKhaiThacTienSuDiUngDetail::where('_id', $id)->first();

        if(!$phieuKhaiThacTienSuDiUngDetail){
            throw new AppException(ErrorCode::PKTTSDU_DETAIL_NOT_FOUND);
        }
        return new ApiResponseResource(new PhieuKhaiThacTienSuDiUngDetailResource($phieuKhaiThacTienSuDiUngDetail));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PhieuKhaiThacTienSuDiUngDetailCreationRequest $request, $id)
    {
        $phieuKhaiThacTienSuDiUngDetail = PhieuKhaiThacTienSuDiUngDetail::where('_id', $id)->first();

        if(!$phieuKhaiThacTienSuDiUngDetail){
            throw new AppException(ErrorCode::PKTTSDU_DETAIL_NOT_FOUND);
        }

        $phieuKhaiThacTienSuDiUngDetail->update([
            'allergen_name' => $request->input('allergen_name',$phieuKhaiThacTienSuDiUngDetail->allergen_name),
            'occur_times'=> $request->input('occur_times',$phieuKhaiThacTienSuDiUngDetail->occur_times),
            'no_reaction'=> $request->input('no_reaction',$phieuKhaiThacTienSuDiUngDetail->no_reaction),
            'reaction_handling'=> $request->input('reaction_handling',$phieuKhaiThacTienSuDiUngDetail->reaction_handling),
        ]);

        return new ApiResponseResource(new PhieuKhaiThacTienSuDiUngDetailResource($phieuKhaiThacTienSuDiUngDetail));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $phieuKhaiThacTienSuDiUngDetail = PhieuKhaiThacTienSuDiUngDetail::where('_id', $id)->first();

        if(!$phieuKhaiThacTienSuDiUngDetail){
            throw new AppException(ErrorCode::PKTTSDU_DETAIL_NOT_FOUND);
        }

        $phieuKhaiThacTienSuDiUngDetail->delete();
        return new ApiResponseResource([]);
    }
}
