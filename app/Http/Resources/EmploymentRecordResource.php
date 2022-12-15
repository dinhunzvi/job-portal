<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmploymentRecordResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id'            => $this->id,
            'user_id'       => $this->user_id,
            'candidate'     => ucwords( implode( ' ', [ $this->candidate->first_name,
                $this->candidate->last_name] ) ),
            'company_name'  => $this->company_name,
            'start_date'    => $this->start_date->format( 'Y-m-d' ),
            'end_date'      => isset( $this->end_date ) ? $this->end_date->format( 'Y-m-d' ) : "",
            'position'      => $this->position,
            'description'   => $this->description
        ];

    }

}
