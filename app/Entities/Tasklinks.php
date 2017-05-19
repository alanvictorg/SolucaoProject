<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Tasklinks extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'task_id',
        'PredecessorUID',
        'CrossProject',
        'LinkLag',
        'LagFormat',
        'source',
        'target',
        'type',
    ];
    public function task()
    {
        return $this->belongsTo(Task::class);
    }

}
