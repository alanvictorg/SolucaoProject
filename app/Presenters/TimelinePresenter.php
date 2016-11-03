<?php

namespace App\Presenters;

use App\Transformers\TimelineTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TimelinePresenter
 *
 * @package namespace App\Presenters;
 */
class TimelinePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TimelineTransformer();
    }
}
