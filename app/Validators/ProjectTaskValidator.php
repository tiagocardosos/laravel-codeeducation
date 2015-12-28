<?php
/**
 * Created by PhpStorm.
 * User: tiagocardoso
 * Date: 10/12/15
 * Time: 15:40
 */

namespace CodeProject\Validators;

use Prettus\Validator\LaravelValidator;

class ProjectTaskValidator extends LaravelValidator
{

    protected $rules = [
        'project_id'=>'required|integer',
        'name'=>'required|max:255',
        'start_date'=>'required|date',
        'due_date'=>'required|date',
        'status'=>'required',
    ];

}