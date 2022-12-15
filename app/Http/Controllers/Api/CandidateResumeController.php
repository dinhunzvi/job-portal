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

        $candidate_resume = CandidateResume::where( 'user_id', $request->user_id )
            ->first();

        $resume_path = base_path() . '/storage/app/public/resumes/' . $candidate_resume->document_name;
        if ( file_exists( $resume_path ) ) {
            unlink( $resume_path );

        }

        $candidate_resume->delete();

        return new CandidateResumeResource( CandidateResume::create([
            'document_name' => $filename,
            'user_id'       => $request->user_id
        ]));

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
     * @return void
     */
    public function update(CandidateResumeRequest $request, CandidateResume $candidateResume)
    {


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

    /**
     * get a candidate's resume
     * @param int $id
     * @return CandidateResumeResource
     */
    public function candidate_resume( int $id ): CandidateResumeResource
    {
        $candidate_resume = CandidateResume::where( 'user_id', $id )
            ->first();

        return new CandidateResumeResource( $candidate_resume );

    }

}
