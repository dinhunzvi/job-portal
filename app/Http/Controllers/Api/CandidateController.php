<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CandidateRequest;
use App\Http\Resources\CandidateResumeResource;
use App\Http\Resources\UserResource;
use App\Mail\CandidateRegistration;
use App\Models\CandidateResume;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return UserResource::collection( User::where( 'user_type', 'Candidate' )
            ->orderBy( 'first_name', 'asc' )
            ->orderBy( 'last_name', 'asc' )
            ->get() );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CandidateRequest $request
     * @return JsonResponse
     */
    public function store(CandidateRequest $request): JsonResponse
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

        $candidate = User::create([
            'first_name'    => ucwords( $request->first_name ),
            'last_name'     => ucwords( $request->last_name ),
            'email'         => strtolower( $request->email ),
            'user_type'     => 'Candidate',
            'id_number'     => strtoupper( $request->id_number ),
            'dob'           => $request->dob,
            'gender'        => $request->gender,
            'password'      => Hash::make( trim( $request->password ) ),
        ]);

        CandidateResume::create([
            'user_id'       => $candidate->id,
            'document_name' => $filename
        ]);

        $token = $candidate->createToken( 'web interface' );

        $token_response = explode( '|', $token->plainTextToken );

        $name = ucwords( implode( ' ', [ $candidate->first_name, $candidate->last_name ] ) );

        Mail::to( 'dougiedj@gmail.com' )->send( new CandidateRegistration( $name, $candidate,
            base_path() . '/storage/app/public/resumes/' . $filename ) );

        return response()->json([
            'token'     => $token_response[1],
            'id'        => $candidate->id
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return UserResource
     */
    public function show(int $id): UserResource
    {
        $user = User::find( $id );

        if ( !$user ) {
            abort( 404, 'Candidate not found' );
        }

        return new UserResource( $user );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param CandidateRequest $request
     * @param User $user
     * @return UserResource
     */
    public function update(CandidateRequest $request, User $user): UserResource
    {
        $user->update( $request->validated() );

        return new UserResource( $user );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return Response
     */
    public function destroy(User $user): Response
    {
        $user->delete();

        return response()->noContent();

    }

}
