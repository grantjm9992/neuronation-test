<?php

namespace app\Domain\Models;

use app\Domain\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    

    protected $primaryKey = 'score_id';

    protected $fillable = [
        'session_id',
        'exercise_id',
        'user_id',
        'score',
        'score_normalized',
        'start_difficulty',
        'end_difficulty',
    ];
}