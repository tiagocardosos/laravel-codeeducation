<?php
/**
 * Created by PhpStorm.
 * User: tiagocardoso
 * Date: 29/12/15
 * Time: 11:25
 */

namespace CodeProject\Presenters;


use CodeProject\Transformers\ProjectTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class ProjectPresenter extends FractalPresenter
{

    public function getTransformer()
    {
        return new ProjectTransformer();
    }

}