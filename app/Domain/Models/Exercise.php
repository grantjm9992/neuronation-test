<?php

namespace app\Domain\Models;

use app\Domain\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    

    protected $primaryKey = 'exercise_id';

    protected $fillable = [
        'course_id',
        'name',
        'points',
    ];
}