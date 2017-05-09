<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\PermissionsCreateRequest;
use App\Http\Requests\PermissionsUpdateRequest;
use App\Repositories\PermissionsRepository;
use App\Validators\PermissionsValidator;


class PermissionsController extends Controller
{

    /**
     * @var PermissionsRepository
     */
    protected $repository;

    /**
     * @var PermissionsValidator
     */
    protected $validator;

    public function __construct(PermissionsRepository $repository, PermissionsValidator $validator)
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
        $permissions = $this->repository->paginate();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $permissions,
            ]);
        }

        return view('admin.permissions.index', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PermissionsCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionsCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $permission = $this->repository->create($request->all());

            $response = [
                'message' => 'Permissions created.',
                'data'    => $permission->toArray(),
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
        $permission = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $permission,
            ]);
        }

        return view('admin.permissions.show', compact('permission'));
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

        $permission = $this->repository->find($id);

        return view('admin.permissions.edit', compact('permission'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  PermissionsUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(PermissionsUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $permission = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Permissions updated.',
                'data'    => $permission->toArray(),
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
                'message' => 'Permissions deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Permissions deleted.');
    }
}
