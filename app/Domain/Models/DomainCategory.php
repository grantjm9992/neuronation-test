<?php

namespace App\Domain\Models;

use App\Domain\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class DomainCategory extends Model
{
    

    protected $primaryKey = 'category_id';

    protected $fillable = [
        'name',
        'timestamp',
    ];
}