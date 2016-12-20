<?php

namespace App\Presenters;

use App\Transformers\CalendarTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CalendarPresenter
 *
 * @package namespace App\Presenters;
 */
class CalendarPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CalendarTransformer();
    }
}
