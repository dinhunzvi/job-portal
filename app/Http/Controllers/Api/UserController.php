<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Mail\UserRegistration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return UserResource::collection( User::where( 'user_type', 'Administrator' )
            ->orderBy( 'first_name', 'asc' )
            ->orderBy( 'last_name', 'asc' )
            ->get() );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return UserResource
     */
    public function store(UserRequest $request)
    {
        $password = Str::random( 10 );
        $name = ucwords( implode( ' ', [ $request->first_name, $request->last_name ] ) );
        $email = strtolower( $request->email );

        $user = User::create([
            'first_name'    => ucwords( $request->first_name ),
            'last_name'     => ucwords( $request->last_name ),
            'email'         => strtolower( $request->email ),
            'password'      => Hash::make( $password )
        ]);

        Mail::to( $email )->send( new UserRegistration( $email, $name, $password ) );

        return new UserResource( $user );

    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return UserResource
     */
    public function show(int $id)
    {
        $user = User::find( $id );

        if ( !$user ) {
            abort( 404, 'User not found' );
        }

        return new UserResource( $user );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param User $user
     * @return UserResource
     */
    public function update(UserRequest $request, User $user): UserResource
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
