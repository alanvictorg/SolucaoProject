<?php
/**
 * Created by PhpStorm.
 * User: thiagodionizio
 * Date: 17/04/17
 * Time: 10:54
 */

namespace App\Service;


use App\Repositories\PermissionsRepository;

class ServicePermission
{
    /**
     * @var PermissionsRepository
     */
    private $permissionsRepository;

    /**
     * ServicePermission constructor.
     */
    public function __construct(PermissionsRepository $permissionsRepository)
    {
        $this->permissionsRepository = $permissionsRepository;
    }

    /**
     * @return PermissionsRepository
     */
    private function getPermissionsRepository()
    {
        return $this->permissionsRepository;
    }

    public function getPermissionList($role){
        return $this->getPermissionsRepository()->findWhere([['id','!=',$role->permissions->pluck('id')]])->pluck('name', 'id');
    }
}