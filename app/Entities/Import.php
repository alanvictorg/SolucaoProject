<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Import extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'company_id',
        'project_id',
        'user_id',
        'file',
        'status'
    ];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

}
