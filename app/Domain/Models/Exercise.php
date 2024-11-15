<?php

namespace App\Domain\Models;

use App\Domain\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    

    protected $primaryKey = 'exercise_id';

    protected $fillable = [
        'course_id',
        'category_id',
        'name',
        'points',
    ];
}