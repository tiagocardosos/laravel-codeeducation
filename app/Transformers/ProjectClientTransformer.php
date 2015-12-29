<?php

namespace CodeProject\Transformers;

use CodeProject\Entities\Client;
use League\Fractal\TransformerAbstract;

/**
 * Class ProjectClientTransformer
 * @package namespace CodeProject\Transformers;
 */
class ProjectClientTransformer extends TransformerAbstract
{

    /**
     * @param Client $client
     * @return array
     */
    public function transform(Client $client)
    {
        return [
            'id'  => (int) $client->id,
            //'name'=> $client->name
        ];
    }
}
