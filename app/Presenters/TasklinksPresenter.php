<?php

namespace App\Presenters;

use App\Transformers\TasklinksTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TasklinksPresenter
 *
 * @package namespace App\Presenters;
 */
class TasklinksPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TasklinksTransformer();
    }
}
