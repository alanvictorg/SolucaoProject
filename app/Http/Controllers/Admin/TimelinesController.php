<?php
/**
 * Copyright (c) 2016. Include Tecnologia http://includetecnologia.com.br
 */

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\TimelineCreateRequest;
use App\Http\Requests\TimelineUpdateRequest;
use App\Repositories\TimelineRepository;
use App\Validators\TimelineValidator;


class TimelinesController extends Controller
{

    /**
     * @var TimelineRepository
     */
    protected $repository;

    /**
     * @var TimelineValidator
     */
    protected $validator;

    public function __construct(TimelineRepository $repository, TimelineValidator $validator)
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
        $timelines = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $timelines,
            ]);
        }

        return view('timelines.index', compact('timelines'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TimelineCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TimelineCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $timeline = $this->repository->create($request->all());

            $response = [
                'message' => 'Timeline created.',
                'data'    => $timeline->toArray(),
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
        $timeline = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $timeline,
            ]);
        }

        return view('timelines.show', compact('timeline'));
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

        $timeline = $this->repository->find($id);

        return view('timelines.edit', compact('timeline'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  TimelineUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(TimelineUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $timeline = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'Timeline updated.',
                'data'    => $timeline->toArray(),
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
                'message' => 'Timeline deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Timeline deleted.');
    }
}
