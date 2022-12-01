<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CandidateResume extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'document_name'
    ];

    /**
     * user/candidate resume belongs to
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo( User::class, 'user_id', 'id' );

    }

}
