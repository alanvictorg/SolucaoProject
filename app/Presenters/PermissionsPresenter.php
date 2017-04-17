<?php

namespace App\Presenters;

use App\Transformers\PermissionsTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PermissionsPresenter
 *
 * @package namespace App\Presenters;
 */
class PermissionsPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PermissionsTransformer();
    }
}
