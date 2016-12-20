<?php
/**
 * Created by PhpStorm.
 * User: thiagodionizio
 * Date: 19/12/16
 * Time: 14:06
 */

namespace App\Services;


use App\Repositories\TaskRepository;
use Carbon\Carbon;

class ServiceTask
{
    /**
     * @var TaskRepository
     */
    private $taskRepository;

    /**
     * ServiceTask constructor.
     */
    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }
    /**
     * @return TaskRepository
     */
    public function getTaskRepository()
    {
        return $this->taskRepository;
    }

    public function create($data)
    {
        if (isset($data['CreateDate']))
        {
            $data['CreateDate'] = Carbon::parse($data['CreateDate']);
        }
        if (isset($data['Start']))
        {
            $data['Start'] = Carbon::parse($data['Start']);
        }
        if (isset($data['Finish']))
        {
            $data['Finish'] = Carbon::parse($data['Finish']);
        }
        if (isset($data['EarlyStart']))
        {
            $data['EarlyStart'] = Carbon::parse($data['EarlyStart']);
        }
        if (isset($data['EarlyFinish']))
        {
            $data['EarlyFinish'] = Carbon::parse($data['EarlyFinish']);
        }
        if (isset($data['LateStart']))
        {
            $data['LateStart'] = Carbon::parse($data['LateStart']);
        }
        if (isset($data['LateFinish']))
        {
            $data['LateFinish'] = Carbon::parse($data['LateFinish']);
        }
        if (isset($data['ManualStart']))
        {
            $data['ManualStart'] = Carbon::parse($data['ManualStart']);
        }
        if (isset($data['ManualFinish']))
        {
            $data['ManualFinish'] = Carbon::parse($data['ManualFinish']);
        }
        if (isset($data['Stop']))
        {
            $data['Stop'] = Carbon::parse($data['Stop']);
        }
        if (isset($data['Resume']))
        {
            $data['Resume'] = Carbon::parse($data['Resume']);
        }
        if (isset($data['ActualStart']))
        {
            $data['ActualStart'] = Carbon::parse($data['ActualStart']);
        }

        return $this->getTaskRepository()->create($data);
    }
}