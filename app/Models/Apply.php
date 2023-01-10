<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Apply extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'user_id',
        'apply_date',
        'resume'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
