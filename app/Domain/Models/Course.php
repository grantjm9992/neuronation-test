<?php

namespace App\Domain\Models;

use App\Domain\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $primaryKey = 'course_id';

    protected $fillable = [
        'name',
        'timestamp',
    ];
}