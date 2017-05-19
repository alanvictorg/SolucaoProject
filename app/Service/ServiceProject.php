<?php
/**
 * Created by PhpStorm.
 * User: thiagodionizio
 * Date: 09/05/17
 * Time: 15:09
 */

namespace App\Service;


use App\Repositories\ProjectRepository;
use Carbon\Carbon;

class ServiceProject
{
    /**
     * @var ProjectRepository
     */
    private $projectRepository;

    /**
     * ServiceProject constructor.
     */
    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    /**
     * @return ProjectRepository
     */
    private function getProjectRepository()
    {
        return $this->projectRepository;
    }

    public function importProject($data)
    {
        $data['company_id'] = $data['company'];
        $project = $this->verifyprojectbycompany($data);
        if (isset($data['CreationDate']))
        {
            $data['CreationDate'] = Carbon::parse($data['CreationDate']);
        }
        if (isset($data['LastSaved']))
        {
            $data['LastSaved'] = Carbon::parse($data['LastSaved']);
        }
        if (isset($data['StartDate']))
        {
            $data['StartDate'] = Carbon::parse($data['StartDate']);
        }
        if (isset($data['FinishDate']))
        {
            $data['FinishDate'] = Carbon::parse($data['FinishDate']);
        }
        if (isset($data['StatusDate']))
        {
            $data['StatusDate'] = Carbon::parse($data['StatusDate']);
        }
        if (isset($data['CurrentDate']))
        {
            $data['CurrentDate'] = Carbon::parse($data['CurrentDate']);
        }
        if (isset($data['ExtendedCreationDate']))
        {
            $data['ExtendedCreationDate'] = Carbon::parse($data['ExtendedCreationDate']);
        }
        if($project)
        {
            $project->update($data);
            return $project;
        }
        return $this->getProjectRepository()->create($data);
    }
    private function verifyprojectbycompany($data)
    {
        $project = $this->getProjectRepository()->findWhere(['company_id'=>$data['company'],'Title'=>$data['Title']]);
        if($project->isEmpty())
        {
            return false;
        }
        return $project->first();
    }
}