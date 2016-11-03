<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Timeline;

/**
 * Class TimelineTransformer
 * @package namespace App\Transformers;
 */
class TimelineTransformer extends TransformerAbstract
{

    /**
     * Transform the \Timeline entity
     * @param \Timeline $model
     *
     * @return array
     */
    public function transform(Timeline $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
