<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\TasklinksCreateRequest;
use App\Http\Requests\TasklinksUpdateRequest;
use App\Repositories\TasklinksRepository;
use App\Validators\TasklinksValidator;


class TasklinksController extends Controller
{

    /**
     * @var TasklinksRepository
     */
    protected $repository;

    /**
     * @var TasklinksValidator
     */
    protected $validator;

    public function __construct(TasklinksRepository $repository, TasklinksValidator $validator)
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
        $tasklinks = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $tasklinks,
            ]);
        }

        return view('tasklinks.index', compact('tasklinks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TasklinksCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TasklinksCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $tasklink = $this->repository->create($request->all());

            $response = [
                'message' => 'Tasklinks created.',
                'data'    => $tasklink->toArray(),
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
        $tasklink = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $tasklink,
            ]);
        }

        return view('tasklinks.show', compact('tasklink'));
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

        $tasklink = $this->repository->find($id);

        return view('tasklinks.edit', compact('tasklink'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  TasklinksUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(TasklinksUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $tasklink = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Tasklinks updated.',
                'data'    => $tasklink->toArray(),
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
                'message' => 'Tasklinks deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Tasklinks deleted.');
    }
}
