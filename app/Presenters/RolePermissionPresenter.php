<?php

namespace App\Presenters;

use App\Transformers\RolePermissionTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class RolePermissionPresenter
 *
 * @package namespace App\Presenters;
 */
class RolePermissionPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new RolePermissionTransformer();
    }
}
