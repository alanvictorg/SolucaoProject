<?php

namespace App\Http\Controllers\Admin;

use App\Service\ServiceRole;
use App\Service\ServiceUser;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
/**
 * Class UsersController
 * @package App\Http\Controllers\Admin
 */
class UsersController extends Controller
{

    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * @var UserValidator
     */
    protected $validator;
    /**
     * @var ServiceRole
     */
    private $serviceRole;
    /**
     * @var ServiceUser
     */
    private $serviceUser;

    /**
     * UsersController constructor.
     * @param UserRepository $repository
     * @param UserValidator $validator
     * @param ServiceUser $serviceUser
     * @param ServiceRole $serviceRole
     */
    public function __construct(UserRepository $repository, UserValidator $validator, ServiceUser $serviceUser, ServiceRole $serviceRole)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->serviceRole = $serviceRole;
        $this->serviceUser = $serviceUser;
    }

    /**
     * @return ServiceUser
     */
    public function getServiceUser()
    {
        return $this->serviceUser;
    }

    /**
     * @return ServiceRole
     */
    public function getServiceRole()
    {
        return $this->serviceRole;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::denies('user-view'))
        {
            abort(403, 'Não Autorizado');
        }
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $users = $this->getServiceUser()->getUsers();
        $roles = $this->getServiceRole()->getRoleList();
        if (request()->wantsJson()) {

            return response()->json([
                'data' => $users,
            ]);
        }

        return view('admin.users.index', compact('users', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        if (Gate::denies('user-create'))
        {
            abort(403, 'Não Autorizado');
        }
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $data = $request->all();
            dd($data);
            $user = $this->repository->create($request->all());

            $response = [
                'message' => 'User created.',
                'data'    => $user->toArray(),
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
        $user = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $user,
            ]);
        }

        return view('admin.users.show', compact('user'));
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
        if (Gate::denies('user-update'))
        {
            abort(403, 'Não Autorizado');
        }
        $user = $this->repository->find($id);
        $roles = $this->getServiceRole()->getRoleList();

        return view('admin.users.edit', compact('user', 'roles'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  UserUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        if (Gate::denies('user-update'))
        {
            abort(403, 'Não Autorizado');
        }
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $data = $request->all();
            $data['password'] = bcrypt($data['password']);

            $user = $this->repository->update($data, $id);
            $role = $this->serviceRole->find($data['role_id']);
            $roles = $this->getServiceUser()->syncRoleUser($role, $user);
            $response = [
                'message' => 'Usuário Atualizado',
                'data'    => $user->toArray(),
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
        if (Gate::denies('user-destroy'))
        {
            abort(403, 'Não Autorizado');
        }
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'User deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'User deleted.');
    }
}
