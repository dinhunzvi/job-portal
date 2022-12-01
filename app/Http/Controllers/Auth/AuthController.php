<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    /**
     * login a user
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login( LoginRequest $request): JsonResponse
    {
        $user = User::where( 'email', trim( strtolower( $request->email ) ) )->first() ;

        if ( !$user || !Hash::check( trim( $request->password ), $user->password ) ) {
            return response()->json([
                'errors'    => [
                    'database'  => 'Email address and password combination not found'
                ]
            ], 422 );
        }

        $token = $user->createToken( 'candidate login' );

        $token_response = explode( '|', $token->plainTextToken );

        return response()->json([
            'token'     => $token_response[1],
            'id'        => $user->id
        ]);

    }

    /**
     * logout a user
     * @param int $id
     * @return Response
     */
    public function logout( int $id ): Response
    {
        $user = User::find( $id );

        if ( $user ) {
            $user->tokens()->delete();
        }

        return response()->noContent();

    }

}
