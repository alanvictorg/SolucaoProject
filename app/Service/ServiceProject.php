<?php
/**
 * Created by PhpStorm.
 * User: thiagodionizio
 * Date: 09/05/17
 * Time: 15:09
 */

namespace App\Service;


use App\Repositories\ProjectRepository;

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

    public function tratarImport($data)
    {
        $data['company_id'] = $data['company'];
        $project = $this->verifyprojectbycompany($data);

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