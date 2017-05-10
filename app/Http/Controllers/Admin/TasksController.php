<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
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

    public function __construct(TaskRepository $repository, TaskValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
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
                'data'    => $task->toArray(),
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
        $task = $this->repository->find($id);
        // Alterar a duracao restante

        $date_finish = Carbon::parse($task->Finish);
        $date_start = Carbon::parse($task->Start);
        $duration = $date_finish->diffInDays($date_start);
        $custo = Utils::moeda($task->Cost);
        if (request()->wantsJson()) {

            return response()->json([
                'data' => $task,
            ]);
        }

        return view('admin.tasks.show', compact('task', 'duration', 'custo'));
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
     * @param  string            $id
     *
     * @return Response
     */
    public function update(TaskUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $task = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Task updated.',
                'data'    => $task->toArray(),
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
                'message' => 'Task deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Task deleted.');
    }
}
