<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CandidateResumeRequest;
use App\Http\Resources\CandidateResumeResource;
use App\Models\CandidateResume;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class CandidateResumeController extends Controller
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
     * @param CandidateResumeRequest $request
     * @return CandidateResumeResource
     */
    public function store(CandidateResumeRequest $request): CandidateResumeResource
    {


    }

    /**
     * Display the specified resource.
     *
     * @param CandidateResume $candidateResume
     * @return Response
     */
    public function show(CandidateResume $candidateResume)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CandidateResumeRequest $request
     * @param CandidateResume $candidateResume
     * @return CandidateResumeResource
     */
    public function update(CandidateResumeRequest $request, CandidateResume $candidateResume): CandidateResumeResource
    {
        $extension = $request->file( 'document_name' )->getClientOriginalExtension();

        switch ( $extension ) {
            case ( $extension === 'pdf' || $extension === 'doc' ) :

                $filename = Str::random( 56 ) . ".{$extension}";
                break;

            case ( $extension === 'docx' ) :
                $filename = Str::random( 55 ) . ".{$extension}";
                break;

        }

        $request->file( 'document_name' )->storeAs( 'resumes/', $filename, 'public' );

        return new CandidateResumeResource( CandidateResume::update([
            'user_id'       => $request->user_id,
            'document_name' => $filename
        ]));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CandidateResume $candidateResume
     * @return Response
     */
    public function destroy(CandidateResume $candidateResume): Response
    {
        $candidateResume->delete();

        return response()->noContent();

    }

}
