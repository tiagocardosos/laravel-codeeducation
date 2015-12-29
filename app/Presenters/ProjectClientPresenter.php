<?php

namespace CodeProject\Presenters;

use CodeProject\Transformers\ProjectClientTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProjectClientPresenter
 *
 * @package namespace CodeProject\Presenters;
 */
class ProjectClientPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProjectClientTransformer();
    }
}
