<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CandidateDocumentRequest;
use App\Http\Resources\CandidateDocumentResource;
use App\Models\CandidateDocument;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\StreamedResponse;

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

        return new CandidateDocumentResource( CandidateDocument::create([
            'user_id'       => $request->user_id,
            'document_name' => $filename,
            'document_type' => trim( $request->document_type )
        ]));

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
        $filePath = base_path() . '/storage/app/public/documents/' . $candidateDocument->document_name;
        if ( file_exists( $filePath ) ) {
            unlink( $filePath );
        }

        $candidateDocument->delete();

        return response()->noContent();

    }

    /**
     * get a candidate's documents
     * @param int $id
     * @return AnonymousResourceCollection
     */
    public function candidate_documents( int $id ): AnonymousResourceCollection
    {
        return CandidateDocumentResource::collection( CandidateDocument::where( 'user_id', $id )
            ->orderBy( 'created_at', 'desc' )
            ->get() );

    }

}
