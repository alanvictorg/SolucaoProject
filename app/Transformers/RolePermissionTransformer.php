<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\RolePermission;

/**
 * Class RolePermissionTransformer
 * @package namespace App\Transformers;
 */
class RolePermissionTransformer extends TransformerAbstract
{

    /**
     * Transform the \RolePermission entity
     * @param \RolePermission $model
     *
     * @return array
     */
    public function transform(RolePermission $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
