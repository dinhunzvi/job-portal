<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmploymentRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'company_name', 'start_date', 'end_date', 'position', 'description'
    ];

    protected $dates = [
        'start_date', 'end_date'
    ];

    /**
     * candidate record belongs to
     * @return BelongsTo
     */
    public function candidate(): BelongsTo
    {
        return $this->belongsTo( User::class, 'user_id', 'id' );

    }

}
