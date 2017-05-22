<?php


namespace App\Http\Controllers\Admin;
use App\Entities\Project;
use App\Entities\Task;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;
use App\Service\ServiceCompanies;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ProjectCreateRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Repositories\ProjectRepository;
use App\Validators\ProjectValidator;
use Dhtmlx\Connector\GanttConnector;


class ProjectsController extends Controller
{

    /**
     * @var ProjectRepository
     */
    protected $repository;

    /**
     * @var ProjectValidator
     */
    protected $validator;
    /**
     * @var ServiceCompanies
     */
    private $serviceCompanies;
    /**
     * @var TaskRepository
     */
    private $taskRepository;

    public function __construct(ProjectRepository $repository, ProjectValidator $validator, ServiceCompanies $serviceCompanies, TaskRepository $taskRepository)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->serviceCompanies = $serviceCompanies;
        $this->taskRepository = $taskRepository;
    }

    /**
     * @return TaskRepository
     */
    public function getTaskRepository()
    {
        return $this->taskRepository;
    }

    /**
     * @return ServiceCompanies
     */
    private function getServiceCompanies()
    {
        return $this->serviceCompanies;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Input::get('company');
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        if (!$company)
        {
            $companies = $this->getServiceCompanies()->getCompanies();
            return view('admin.projects.choosecompany', compact("companies"))->with(['message'=>'Escolha uma empresa']);
        }
        $projects = $this->repository->findWhere(['company_id'=>$company]);

        if($projects->isEmpty()){
            return redirect()->route('imports.index');
        }
        $companies =$this->getServiceCompanies()->getCompanyList();
        if (request()->wantsJson()) {

            return response()->json([
                'data' => $projects,
            ]);
        }

        return view('admin.projects.index', compact('projects', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProjectCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $project = $this->repository->create($request->all());

            $response = [
                'message' => 'Project created.',
                'data'    => $project->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = $this->repository->find($id);
        $tasks =  $this->getTaskRepository()->orderBy('UID')->findWhere(['project_id'=>$project->id]);
        $data = [];
        $links = [];
        $count = 1;
        foreach ($tasks as $key=>$task)
        {
            $date_finish = Carbon::parse($task->Finish);
            $date_start = Carbon::parse($task->Start);
            $duration = $date_finish->diffInDays($date_start);
            if ($duration == 0)
            {
                $duration = 1;
            }
            if ($task->UID != 0 )
            {
                if ($task->parent)
                {
                    $row = [
                        'id' => $task->UID,
                        'text' => $task->Name,
                        'start_date' => $date_start->format('d-m-Y'),
                        'duration' => $duration,
                        'progress' => $task->PercentComplete/100,
                        'open' => 'true',
                        'parent'=>$task->parent

                    ];
                }else
                    {
                        $row = [
                            'id' => $task->UID,
                            'text' => $task->Name,
                            'start_date' => $date_start->format('d-m-Y'),
                            'duration' => $duration,
                            'progress' => $task->PercentComplete/100,
                            'open' => 'true'
                        ];
                    }

                 array_push($data, $row);
            }
            if (isset($task->links)){
                foreach ($task->links as $key=>$link)
                {
                    if($this->getTaskUID($task->project->id, $link->source) != null && $this->getTaskUID($task->project->id, $link->target) != null )
                    {
                        $link_task = [
                            'id'=>$count,
                            'source'=>$link->source,
                            'target'=>$link->target,
                            'type'=>$link->type,
                        ];
                        array_push($links, $link_task);
                        $count++;
                    }
                }
            }
        }
//dd($links);
        $data_gantt = [
            'data' => $data,
            'link' => $links

        ];
//        dd($data_gantt['link']);
//        dd($data);
        $data_gantt = json_encode($data_gantt);
//        dd($data_gantt);
        if (request()->wantsJson()) {

            return response()->json([
                'data' => $project,
            ]);
        }

        return view('admin.projects.show', compact('project', 'data_gantt'));
    }
    private function getTaskUID($project_id, $uid)
    {
        return $this->getTaskRepository()->findWhere(['project_id'=>$project_id, 'uid'=>$uid])->first();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $project = $this->repository->find($id);

        return view('admin.projects.edit', compact('project'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ProjectUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(ProjectUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $project = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Project updated.',
                'data'    => $project->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Project deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Project deleted.');
    }
}
