<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Permissions;

/**
 * Class PermissionsTransformer
 * @package namespace App\Transformers;
 */
class PermissionsTransformer extends TransformerAbstract
{

    /**
     * Transform the \Permissions entity
     * @param \Permissions $model
     *
     * @return array
     */
    public function transform(Permissions $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
