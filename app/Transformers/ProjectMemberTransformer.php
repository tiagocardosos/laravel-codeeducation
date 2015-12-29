<?php
/**
 * Created by PhpStorm.
 * User: tiagocardoso
 * Date: 29/12/15
 * Time: 11:18
 */

namespace CodeProject\Transformers;

use CodeProject\Entities\User;
use League\Fractal\TransformerAbstract;

class ProjectMemberTransformer extends TransformerAbstract
{


    /**
     * @param User $member
     * @return array
     */
    public function transform(User $member){
        return [
            'member_id'=>$member->id,
            'name'=>$member->name
        ];
    }
}