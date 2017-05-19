<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Tasklinks;

/**
 * Class TasklinksTransformer
 * @package namespace App\Transformers;
 */
class TasklinksTransformer extends TransformerAbstract
{

    /**
     * Transform the \Tasklinks entity
     * @param \Tasklinks $model
     *
     * @return array
     */
    public function transform(Tasklinks $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
