<?php
/**
 * Created by PhpStorm.
 * User: thiagodionizio
 * Date: 13/04/17
 * Time: 14:03
 */

namespace App\Service;


use App\Repositories\RoleRepository;
use Illuminate\Support\Facades\Auth;

class ServiceRole
{
    /**
     * @var RoleRepository
     */
    private $roleRepository;

    /**
     * ServiceRole constructor.
     */
    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * @return RoleRepository
     */
    private function getRoleRepository()
    {
        return $this->roleRepository;
    }
    public function getRoleList(){

        if (Auth::user()->isSuperAdmin()){
            return $this->getRoleRepository()->all()->pluck('label', 'id');
        }
        //get roles > do que o usuário atual
        $role_user = Auth::user()->roles->first()->id;
        $roles = $this->getRoleRepository()->findWhere([['id','>',$role_user]])->pluck('label', 'id');
        return $roles;

    }

    public function find($id)
    {
        return $this->getRoleRepository()->find($id);
    }


}