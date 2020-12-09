<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;//importar o softdelets da migrates

class client extends Model
{
    use SoftDeletes;
    //protected $tabe ='clients';

    protected $fillable = [//para adicionar atributos em massa, menos o id e tadatime
        'brand',
        'model',
        'serial_number',
        'machine_type',
        'description',
        'breakdowns',
    ];


}
