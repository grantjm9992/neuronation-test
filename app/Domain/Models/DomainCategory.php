<?php

namespace app\Domain\Models;

use app\Domain\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class DomainCategory extends Model
{
    

    protected $primaryKey = 'category_id';

    protected $fillable = [
        'name',
        'timestamp',
    ];
}