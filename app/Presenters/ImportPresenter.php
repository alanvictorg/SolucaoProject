<?php

namespace App\Presenters;

use App\Transformers\ImportTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ImportPresenter
 *
 * @package namespace App\Presenters;
 */
class ImportPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ImportTransformer();
    }
}
