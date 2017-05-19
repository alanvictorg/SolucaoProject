<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\TasklinksRepository;
use App\Entities\Tasklinks;
use App\Validators\TasklinksValidator;

/**
 * Class TasklinksRepositoryEloquent
 * @package namespace App\Repositories;
 */
class TasklinksRepositoryEloquent extends BaseRepository implements TasklinksRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Tasklinks::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return TasklinksValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
