<?php

namespace App\Http\Controllers\Admin;
use App\Entities\Role;
use App\Entities\RolePermission;
use App\Http\Controllers\Controller;
use App\Repositories\PermissionsRepository;
use App\Repositories\RoleRepository;
use App\Service\ServicePermission;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\RolePermissionCreateRequest;
use App\Http\Requests\RolePermissionUpdateRequest;
use App\Repositories\RolePermissionRepository;
use App\Validators\RolePermissionValidator;


class RolePermissionsController extends Controller
{

    /**
     * @var RolePermissionRepository
     */
    protected $repository;

    /**
     * @var RolePermissionValidator
     */
    protected $validator;
    /**
     * @var ServicePermission
     */
    private $servicePermission;
    /**
     * @var RoleRepository
     */
    private $roleRepository;

    /**
     * RolePermissionsController constructor.
     * @param RolePermissionRepository $repository
     * @param RolePermissionValidator $validator
     * @param ServicePermission $servicePermission
     */
    public function __construct(RolePermissionRepository $repository, RolePermissionValidator $validator, ServicePermission $servicePermission, RoleRepository $roleRepository)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->servicePermission = $servicePermission;
        $this->roleRepository = $roleRepository;
    }

    /**
     * @return RoleRepository
     */
    public function getRoleRepository()
    {
        return $this->roleRepository;
    }

    /**
     * @return ServicePermission
     */
    public function getServicePermission()
    {
        return $this->servicePermission;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Role $role)
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $rolePermissions = $role->permissions()->paginate();
        $permission = $this->getServicePermission()->getPermissionList($role);
        if (request()->wantsJson()) {

            return response()->json([
                'data' => $rolePermissions,
            ]);
        }

        return view('admin.rolePermissions.index', compact('rolePermissions', 'role','permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RolePermissionCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(RolePermissionCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $data = $request->all();
//            $rolePermission = RolePermission::create($data);
            $rolePermission = $this->repository->create($data);
            $response = [
                'message' => 'Função Cadastrada Com Sucesso!',
                'data'    => $rolePermission->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('role-permission.index',$data['role_id'])->with('message', $response['message']);
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
        $rolePermission = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $rolePermission,
            ]);
        }

        return view('admin.rolePermissions.show', compact('rolePermission'));
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

        $rolePermission = $this->repository->find($id);

        return view('admin.rolePermissions.edit', compact('rolePermission'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  RolePermissionUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(RolePermissionUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $rolePermission = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'RolePermission updated.',
                'data'    => $rolePermission->toArray(),
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
        dd($id);
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'RolePermission deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'RolePermission deleted.');
    }
}
