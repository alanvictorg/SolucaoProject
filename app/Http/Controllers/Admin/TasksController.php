<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\TasklinksRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use JansenFelipe\Utils\Utils;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\TaskCreateRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Repositories\TaskRepository;
use App\Validators\TaskValidator;


class TasksController extends Controller
{

    /**
     * @var TaskRepository
     */
    protected $repository;

    /**
     * @var TaskValidator
     */
    protected $validator;
    /**
     * @var TasklinksRepository
     */
    private $tasklinksRepository;

    public function __construct(TaskRepository $repository, TaskValidator $validator, TasklinksRepository $tasklinksRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->tasklinksRepository = $tasklinksRepository;
    }

    /**
     * @return TasklinksRepository
     */
    public function getTasklinksRepository()
    {
        return $this->tasklinksRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $tasks = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $tasks,
            ]);
        }

        return view('admin.tasks.index', compact('tasks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TaskCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TaskCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $task = $this->repository->create($request->all());

            $response = [
                'message' => 'Task created.',
                'data' => $task->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error' => true,
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
        $task = $this->repository->find($id);
        // Alterar a duracao restante

        $date_finish = Carbon::parse($task->Finish);
        $date_start = Carbon::parse($task->Start);
        $duration = $date_finish->diffInDays($date_start);
        $custo = Utils::moeda($task->Cost);

        $link = $task->links->first()->PredecessorUID;
        $links = $this->getTasklinksRepository()->findWhere(['PredecessorUID'=>$task->UID]);
        $task_predecessora = $this->getTaskUID($task->project->id, $link);
        $task_sucessora = $this->getTaskUID($task->project->id, $task->parent);
        $count = 3;
        foreach ($links as $link)
        {
            $sucessora = [
                'text' => $link->task->Name,
                'start_date' => Carbon::parse($link->task->Start)->format('d-m-Y'),
                'progress' => $link->task->PercentComplete/100,
                'duration' => Carbon::parse($link->task->Finish)->diffInDays(Carbon::parse($link->task->Start)),
                'open' => 'true',
                'parent' => '2'
            ];
        }
//        dd($task, $task_predecessora,$links);
        $data_gantt = [
            'data' => [
                //predecessora
                [
                    'id' => 1,
                    'text' => $task_predecessora->Name,
                    'start_date' => Carbon::parse($task_predecessora->Start)->format('d-m-Y'),
                    'duration' =>  Carbon::parse($task_predecessora->Finish)->diffInDays(Carbon::parse($task_predecessora->Start)),
                    'progress' => $task_predecessora->PercentComplete/100,
                    'open' => 'true',
                ],
                //task
                [
                    'id' => 2,
                    'text' => $task->Name,
                    'start_date' => $date_start->format('d-m-Y'),
                    'duration' => $duration,
                    'progress' => $task->PercentComplete/100,
                    'open' => 'true',
                    'parent' => '1'
                ],

            ],
            'link' => [
                [
                    'id' => 1,
                    'source' => 1,
                    'target' => 2,
                    'type' => "1"
                ],
                [
                    'id' => 2,
                    'source' => 2,
                    'target' => 3,
                    'type' => "1"
                ],

            ]

        ];
        array_push($data_gantt['data'], $sucessora);
        $data_gantt = json_encode($data_gantt);
//dd($data_gantt);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $task,
            ]);
        }

        return view('admin.tasks.show', compact('task', 'duration', 'custo', 'data_gantt'));
    }
    private function getTaskUID($project_id, $uid)
    {
        return $this->repository->findWhere(['project_id'=>$project_id, 'uid'=>$uid])->first();
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

        $task = $this->repository->find($id);

        return view('admin.tasks.edit', compact('task'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  TaskUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(TaskUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $task = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Tarefa Atualizada',
                'data' => $task->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error' => true,
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
                'message' => 'Task deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Task deleted.');
    }
}
