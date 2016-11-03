<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\TimelineRepository;
use App\Entities\Timeline;
use App\Validators\TimelineValidator;

/**
 * Class TimelineRepositoryEloquent
 * @package namespace App\Repositories;
 */
class TimelineRepositoryEloquent extends BaseRepository implements TimelineRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Timeline::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return TimelineValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
