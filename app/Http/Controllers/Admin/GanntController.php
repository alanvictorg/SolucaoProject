<?php

namespace App\Http\Controllers;

use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\Project;

class GanntController extends Controller
{
    /**
     * @var ProjectRepository
     */
    private $projectRepository;

    /**
     * GanntController constructor.
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

    public function getGantt($project)
    {
        $project =$this->getProjectRepository()->find($project);
        dd($project);
    }
}
