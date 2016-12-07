<?php

namespace App\Presenters;

use App\Transformers\ReportsTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ReportsPresenter
 *
 * @package namespace App\Presenters;
 */
class ReportsPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ReportsTransformer();
    }
}
