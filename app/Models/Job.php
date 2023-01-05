<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "type",
        "start_salary",
        "end_salary",
        "experience",
        "skills",
        "description",
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
