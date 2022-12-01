<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CandidateDocumentResource extends JsonResource
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
            'candidate'     => implode( ' ', [ $this->user->first_name, $this->user->last_name ] ),
            'document_name' => $this->document_name,
            'document_type' => $this->document_type,
            'date_uploaded' => $this->created_at->format( 'Y-m-d H:i:s' )
        ];

    }
}
