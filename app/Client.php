<?php

namespace CodeProject;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    public $fillable = [
        'name',
        'responsible',
        'email',
        'phone',
        'address',
        'obs'
    ];
    //
}
