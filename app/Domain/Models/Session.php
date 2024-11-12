<?php

namespace App\Domain\Models;

use App\Domain\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{

    protected $primaryKey = 'session_id';

    protected $fillable = [
        'course_id',
        'user_id',
        'timestamp',
        'score',
        'normalized_score',
    ];
}