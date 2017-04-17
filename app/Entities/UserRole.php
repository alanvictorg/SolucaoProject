<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class UserRole extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'role_id',
        'user_id'
    ];

}
