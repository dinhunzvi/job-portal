<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CandidateDocumentRequest;
use App\Http\Resources\CandidateDocumentResource;
use App\Models\CandidateDocument;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class CandidateDocumentController extends Controller
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
     * @param CandidateDocumentRequest $request
     * @return CandidateDocumentResource
     */
    public function store(CandidateDocumentRequest $request): CandidateDocumentResource
    {
        $extension = $request->file( 'document_name' )->getClientOriginalExtension();

        switch ( $extension ) {
            case ( $extension === 'docx' ) :

                $filename = strtolower( Str::random( 55 ) ) . ".{$extension}";

                break;

            case ( $extension === 'doc' || $extension === 'pdf' ) :

                $filename = strtolower( Str::random( 56 ) ) . ".{$extension}";

                break;

        }

        $request->file( 'document_name' )->storeAs( 'documents/', $filename, 'public' );

        return new CandidateDocumentResource([
            'user_id'       => $request->user_id,
            'document_name' => $filename,
            'document_type' => trim( $request->document_type )
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param CandidateDocument $candidateDocument
     * @return Response
     */
    public function show(CandidateDocument $candidateDocument)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param CandidateDocument $candidateDocument
     * @return Response
     */
    public function update(Request $request, CandidateDocument $candidateDocument)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CandidateDocument $candidateDocument
     * @return Response
     */
    public function destroy(CandidateDocument $candidateDocument): Response
    {
        $candidateDocument->delete();

        return response()->noContent();

    }

}
