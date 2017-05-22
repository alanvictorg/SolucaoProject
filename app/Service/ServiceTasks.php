<?php
/**
 * Created by PhpStorm.
 * User: thiagodionizio
 * Date: 09/05/17
 * Time: 15:20
 */

namespace App\Service;


use App\Repositories\TasklinksRepository;
use App\Repositories\TaskRepository;
use Carbon\Carbon;

class ServiceTasks
{
    /**
     * @var TaskRepository
     */
    private $taskRepository;
    /**
     * @var TasklinksRepository
     */
    private $tasklinksRepository;

    /**
     * ServiceTasks constructor.
     */
    public function __construct(TaskRepository $taskRepository, TasklinksRepository $tasklinksRepository)
    {
        $this->taskRepository = $taskRepository;
        $this->tasklinksRepository = $tasklinksRepository;
    }

    /**
     * @return TaskRepository
     */
    public function getTaskRepository()
    {
        return $this->taskRepository;
    }

    /**
     * @return TasklinksRepository
     */
    public function getTasklinksRepository()
    {
        return $this->tasklinksRepository;
    }



    private function storeImport($data)
    {
        $task = $this->getTaskRepository()->findWhere(['UID'=>$data['UID'],'project_id'=>$data['project_id']]);
        if ($task->isEmpty())
        {
            $data['anotation'] = "";
            $task =  $this->getTaskRepository()->create($data);
            if (isset($data['PredecessorLink'])){
                foreach ($data['PredecessorLink'] as $item)
                {
                    $item['task_id'] = $task->id;
//                    $item['source'] = $task->UID;
                    $links = $this->getTasklinksRepository()->create($item);
                }


            }

            return $task;

        }
        return $task->first()->update($data);
    }
    public function tratarTasks($data, $project)
    {
        foreach ($data as $key=>$row)
        {
//            dd($row);
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
            if (isset($row['PredecessorLink']))
            {
                if(isset($row['PredecessorLink'][0]))
                {
                    foreach ($row['PredecessorLink'] as $key => $item)
                    {
                        $row['PredecessorLink'][$key] = [
                            'PredecessorUID' => $item['PredecessorUID'],
                            'CrossProject' => $item['CrossProject'],
                            'LinkLag' => $item['LinkLag'],
                            'LagFormat' => $item['LagFormat'],
                            'target' =>$row['UID'] ,
                            'type' => $item['Type'],
                            'task_id' => "",
                            'source'=> $item['PredecessorUID'],
                        ];
                        $row['parent'] = $item['PredecessorUID'];

                    }
                }else
                {
                    $row['PredecessorLink'][0] = [
                        'PredecessorUID' => $row['PredecessorLink']['PredecessorUID'],
                        'CrossProject' => $row['PredecessorLink']['CrossProject'],
                        'LinkLag' => $row['PredecessorLink']['LinkLag'],
                        'LagFormat' => $row['PredecessorLink']['LagFormat'],
                        'target' => $row['UID'],
                        'type' => $row['PredecessorLink']['Type'],
                        'task_id' => "",
                        'source'=> $row['PredecessorLink']['PredecessorUID'],
                    ];
                    $row['parent'] = $row['PredecessorLink']['PredecessorUID'];
                    unset($row['PredecessorLink']['PredecessorUID']);
                    unset($row['PredecessorLink']['CrossProject']);
                    unset($row['PredecessorLink']['LinkLag']);
                    unset($row['PredecessorLink']['LagFormat']);
                    unset($row['PredecessorLink']['Type']);
                }
            }


            $task[$key] = $this->storeImport($row);

        }
        return $task;

    }
}