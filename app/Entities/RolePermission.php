<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class RolePermission extends Model implements Transformable
{
    use TransformableTrait;
    protected $table = 'role_permissions';
    protected $fillable = [
        'role_id',
        'permission_id'
    ];

}
