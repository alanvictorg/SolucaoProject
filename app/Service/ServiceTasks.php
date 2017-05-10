<?php
/**
 * Created by PhpStorm.
 * User: thiagodionizio
 * Date: 09/05/17
 * Time: 15:20
 */

namespace App\Service;


use App\Repositories\TaskRepository;
use Carbon\Carbon;

class ServiceTasks
{
    /**
     * @var TaskRepository
     */
    private $taskRepository;

    /**
     * ServiceTasks constructor.
     */
    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * @return TaskRepository
     */
    private function getTaskRepository()
    {
        return $this->taskRepository;
    }

    private function storeImport($data)
    {
        $task = $this->getTaskRepository()->findWhere(['UID'=>$data['UID'],'project_id'=>$data['project_id']]);
        if ($task->isEmpty())
        {
            return $this->getTaskRepository()->create($data);
        }
        return $task->first()->update($data);
    }
    public function tratarImport($data, $project)
    {
        foreach ($data as $key=>$row)
        {
            $row['project_id'] = $project->id;
            if (isset($row['CreateDate']))
            {
                $row['CreateDate'] = Carbon::parse($row['CreateDate']);
            }
            if (isset($row['Start']))
            {
                $row['Start'] = Carbon::parse($row['Start']);
            }
            if (isset($row['Finish']))
            {
                $row['Finish'] = Carbon::parse($row['Finish']);
            }
            if (isset($row['EarlyStart']))
            {
                $row['EarlyStart'] = Carbon::parse($row['EarlyStart']);
            }
            if (isset($row['EarlyFinish']))
            {
                $row['EarlyFinish'] = Carbon::parse($row['EarlyFinish']);
            }
            if (isset($row['LateStart']))
            {
                $row['LateStart'] = Carbon::parse($row['LateStart']);
            }
            if (isset($row['LateFinish']))
            {
                $row['LateFinish'] = Carbon::parse($row['LateFinish']);
            }
            if (isset($row['ManualStart']))
            {
                $row['ManualStart'] = Carbon::parse($row['ManualStart']);
            }
            if (isset($row['ManualFinish']))
            {
                $row['ManualFinish'] = Carbon::parse($row['ManualFinish']);
            }
            if (isset($row['Stop']))
            {
                $row['Stop'] = Carbon::parse($row['Stop']);
            }
            if (isset($row['Resume']))
            {
                $row['Resume'] = Carbon::parse($row['Resume']);
            }
            if (isset($row['ActualStart']))
            {
                $row['ActualStart'] = Carbon::parse($row['ActualStart']);
            }
            if (isset($row['ActualFinish']))
            {
                $row['ActualFinish'] = Carbon::parse($row['ActualFinish']);
            }
//            if (isset($row['PredecessorLink']))
//            {
//                $row['PredecessorLink'] =  $row['PredecessorLink']['PredecessorUID'];
//
//            }

            $task[$key] = $this->storeImport($row);

        }
        return $task;

    }
}