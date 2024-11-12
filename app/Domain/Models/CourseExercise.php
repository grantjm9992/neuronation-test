<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class CourseExercise extends Model
{
    protected $primaryKey = 'course_exercise_id';

    protected $fillable = [
        'course_id',
        'exercise_id',
    ];
}
