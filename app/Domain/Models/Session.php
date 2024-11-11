<?php

namespace app\Domain\Models;

use app\Domain\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{

    protected $primaryKey = 'session_id';

    protected $fillable = [
        'course_id',
        'user_id',
        'timestamp',
        'score',
    ];
}