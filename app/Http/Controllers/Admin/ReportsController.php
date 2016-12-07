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
use App\Http\Requests\ReportsCreateRequest;
use App\Http\Requests\ReportsUpdateRequest;
use App\Repositories\ReportsRepository;
use App\Validators\ReportsValidator;


class ReportsController extends Controller
{

    /**
     * @var ReportsRepository
     */
    protected $repository;

    /**
     * @var ReportsValidator
     */
    protected $validator;

    public function __construct(ReportsRepository $repository, ReportsValidator $validator)
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
        $reports = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $reports,
            ]);
        }

        return view('reports.index', compact('reports'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ReportsCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ReportsCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $report = $this->repository->create($request->all());

            $response = [
                'message' => 'Reports created.',
                'data'    => $report->toArray(),
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
        $report = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $report,
            ]);
        }

        return view('reports.show', compact('report'));
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

        $report = $this->repository->find($id);

        return view('reports.edit', compact('report'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ReportsUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(ReportsUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $report = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'Reports updated.',
                'data'    => $report->toArray(),
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
                'message' => 'Reports deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Reports deleted.');
    }
}
