<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Permissions extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'name',
        'label'
    ];


    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permissions', 'permission_id', 'role_id');
    }
    public function users()
    {
        return $this->hasManyThrough(User::class,Role::class);
    }
}
