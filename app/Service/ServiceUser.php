<?php
/**
 * Created by PhpStorm.
 * User: thiagodionizio
 * Date: 13/04/17
 * Time: 14:01
 */

namespace App\Service;


use App\Entities\Role;
use App\Entities\User;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

/**
 * Class ServiceUser
 * @package App\Service
 */
class ServiceUser
{
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var RoleRepository
     */
    private $roleRepository;

    /**
     * ServiceUser constructor.
     */
    public function __construct(UserRepository $userRepository, RoleRepository $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    /**
     * @return UserRepository
     */
    public function getUserRepository()
    {
        return $this->userRepository;
    }

    /**
     * @return RoleRepository
     */
    public function getRoleRepository()
    {
        return $this->roleRepository;
    }


    /**
     * @return mixed
     */
    public function getUserList()
    {
        return $this->getUserRepository()->all()->pluck('name','id');
    }/**
     * @return mixed
     */
    public function getUsers()
    {
        if(Auth::user()->isSuperAdmin())
        {
            return $this->getUserRepository()->paginate();
        }
        return $this->getUserRepository()->whereHas('roles',function ($query){
            return $query->where('role_id','>',1);
        })->paginate();

    }

    public function syncRoleUser(Role $role, User $user)
    {
        return $user->roles()->sync([$role->id]);
    }
}