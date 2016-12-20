<?php
/**
 * Created by PhpStorm.
 * User: thiagodionizio
 * Date: 13/12/16
 * Time: 10:21
 */

namespace App\Services;


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
     * @param ProjectRepository $projectRepository
     */
    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    /**
     * @return ProjectRepository
     */
    public function getProjectRepository()
    {
        return $this->projectRepository;
    }
    public function all()
    {
        return $this->getProjectRepository()->paginate(10);
    }
    public function getProjetcsHome()
    {
        $projects = $this->getProjectRepository()->scopeQuery(function($query){
            $query->limit(5);
            return $query->orderBy('id','asc');
        })->all();
        return $projects;
    }
    public function findByName($name)
    {
        return $this->getProjectRepository()->findByField(['title'=>$name]);
    }

    public function store($data)
    {

        $data['CreationDate'] = Carbon::parse($data['CreationDate']);
        $data['LastSaved'] = Carbon::parse($data['LastSaved']);
        $data['StartDate'] = Carbon::parse($data['StartDate']);
        $data['FinishDate'] = Carbon::parse($data['FinishDate']);
        $data['StatusDate'] = Carbon::parse($data['StatusDate']);
        $data['CurrentDate'] = Carbon::parse($data['CurrentDate']);
        $data['ExtendedCreationDate'] = Carbon::parse($data['ExtendedCreationDate']);
        return $this->getProjectRepository()->create($data);
    }

    public function update($data)
    {
        return $this->getProjectRepository()->sync($data);
    }


}