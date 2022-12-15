<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id'            => $this->id,
            'first_name'    => ucwords( $this->first_name ),
            'last_name'     => ucwords( $this->last_name ),
            'name'          => ucwords( implode( ' ', [ $this->first_name, $this->last_name ] ) ),
            'email'         => strtolower( $this->email ),
            'user_type'     => $this->user_type,
            'id_number'     => $this->id_number ?? "",
            'dob'           => isset( $this->dob ) ? $this->dob->format( 'Y-m-d' ) : "",
            'gender'        => $this->gender ?? "",
            'created_at'    => isset( $this->created_at ) ? $this->created_at->format( 'Y-m-d H:i:s' ) : "",
            'updated_at'    => isset( $this->updated_at ) ? $this->updated_at->format( 'Y-m-d H:i:s' ) : "",
        ];

    }

}
