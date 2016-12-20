<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CalendarRepository;
use App\Entities\Calendar;
use App\Validators\CalendarValidator;

/**
 * Class CalendarRepositoryEloquent
 * @package namespace App\Repositories;
 */
class CalendarRepositoryEloquent extends BaseRepository implements CalendarRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Calendar::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return CalendarValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
