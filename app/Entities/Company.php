<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Company extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'name',
        'manager',
        'phone',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

}
