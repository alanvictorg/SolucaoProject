<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Calendar;

/**
 * Class CalendarTransformer
 * @package namespace App\Transformers;
 */
class CalendarTransformer extends TransformerAbstract
{

    /**
     * Transform the \Calendar entity
     * @param \Calendar $model
     *
     * @return array
     */
    public function transform(Calendar $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
