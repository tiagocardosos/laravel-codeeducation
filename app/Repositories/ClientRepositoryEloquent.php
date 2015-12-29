<?php
/**
 * Created by PhpStorm.
 * User: tiagocardoso
 * Date: 10/12/15
 * Time: 14:10
 */

namespace CodeProject\Repositories;

use CodeProject\Entities\Client;
use CodeProject\Presenters\ProjectClientPresenter;
use Prettus\Repository\Eloquent\BaseRepository;

class ClientRepositoryEloquent extends BaseRepository implements ClientRepository
{

    public function model()
    {
        return Client::class;
    }

    public function presenter()
    {
        return ProjectClientPresenter::class;
    }

}