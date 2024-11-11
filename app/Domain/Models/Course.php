<?php

namespace app\Domain\Models;

use app\Domain\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    

    protected $primaryKey = 'course_id';

    protected $fillable = [
        'name',
        'timestamp',
    ];
}