<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Import;

/**
 * Class ImportTransformer
 * @package namespace App\Transformers;
 */
class ImportTransformer extends TransformerAbstract
{

    /**
     * Transform the \Import entity
     * @param \Import $model
     *
     * @return array
     */
    public function transform(Import $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
