<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Reports;

/**
 * Class ReportsTransformer
 * @package namespace App\Transformers;
 */
class ReportsTransformer extends TransformerAbstract
{

    /**
     * Transform the \Reports entity
     * @param \Reports $model
     *
     * @return array
     */
    public function transform(Reports $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
