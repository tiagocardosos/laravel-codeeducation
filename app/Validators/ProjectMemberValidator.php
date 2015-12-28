<?php
/**
 * Created by PhpStorm.
 * User: tiagocardoso
 * Date: 10/12/15
 * Time: 15:40
 */

namespace CodeProject\Validators;

use Prettus\Validator\LaravelValidator;

class ProjectMemberValidator extends LaravelValidator
{

    protected $rules = [
        'project_id'=>'required|integer',
        'user_id'=>'required|integer'
    ];

}