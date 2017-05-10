<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ResourceCreateRequest;
use App\Http\Requests\ResourceUpdateRequest;
use App\Repositories\ResourceRepository;
use App\Validators\ResourceValidator;


class ResourcesController extends Controller
{

    /**
     * @var ResourceRepository
     */
    protected $repository;

    /**
     * @var ResourceValidator
     */
    protected $validator;

    public function __construct(ResourceRepository $repository, ResourceValidator $validator)
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
        $resources = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $resources,
            ]);
        }

        return view('resources.index', compact('resources'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ResourceCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ResourceCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $resource = $this->repository->create($request->all());

            $response = [
                'message' => 'Resource created.',
                'data'    => $resource->toArray(),
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
        $resource = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $resource,
            ]);
        }

        return view('resources.show', compact('resource'));
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

        $resource = $this->repository->find($id);

        return view('resources.edit', compact('resource'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ResourceUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(ResourceUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $resource = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Resource updated.',
                'data'    => $resource->toArray(),
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
                'message' => 'Resource deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Resource deleted.');
    }
}
