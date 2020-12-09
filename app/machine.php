<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class machine extends Model
{
    use SoftDeletes;

    protected $fillable = [//para adicionar atributos em massa, menos o id e tadatime
        'name',
        'fone',
        'machine_type',
        'description',
        'breakdowns',
    ];

}
