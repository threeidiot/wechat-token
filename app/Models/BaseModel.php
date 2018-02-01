<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BaseModel
 *
 * @mixin \Eloquent
 */
class BaseModel extends Model
{

    protected $casts = [
    ];

    public function getDates()
    {
        return [];
    }
}
