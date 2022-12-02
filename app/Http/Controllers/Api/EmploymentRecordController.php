<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmploymentRecordRequest;
use App\Http\Resources\EmploymentRecordResource;
use App\Models\EmploymentRecord;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class EmploymentRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EmploymentRecordRequest $request
     * @return EmploymentRecordResource
     */
    public function store(EmploymentRecordRequest $request): EmploymentRecordResource
    {
        return new EmploymentRecordResource( EmploymentRecord::create([
            'user_id'       => ( int )$request->user_id,
            'company_name'  => trim( $request->company_name ),
            'start_date'    => trim( $request->start_date ),
            'end_date'      => trim( $request->end_date ),
            'position'      => trim( $request->position ),
            'description'   => trim( $request->description )
        ]));

    }

    /**
     * Display the specified resource.
     *
     * @param EmploymentRecord $employmentRecord
     * @return Response
     */
    public function show(EmploymentRecord $employmentRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EmploymentRecordRequest $request
     * @param EmploymentRecord $employmentRecord
     * @return EmploymentRecordResource
     */
    public function update(EmploymentRecordRequest $request, EmploymentRecord $employmentRecord): EmploymentRecordResource
    {
        $employmentRecord->update( $request->validated() );

        return new EmploymentRecordResource( $employmentRecord );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param EmploymentRecord $employmentRecord
     * @return Response
     */
    public function destroy(EmploymentRecord $employmentRecord): Response
    {
        $employmentRecord->delete();

        return response()->noContent();

    }

    /**
     * get a candidate's employment records
     * @param int $user_id
     * @return AnonymousResourceCollection
     */
    public function employee_records( int $user_id ): AnonymousResourceCollection
    {
        return EmploymentRecordResource::collection( EmploymentRecord::where( 'user_id', $user_id )->get() );

    }

}
