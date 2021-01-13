<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Machine extends Model
{
    use SoftDeletes;

    protected $fillable = [//para adicionar atributos em massa, menos o id e tadatime
        
        'machine_type',
        'brand',
        'model',
        'serial_number',
        'description',
        'breakdowns',
        'client_id',

    ];

    public function clients(){
        return $this->belongsTo('App\Client');
    }
}
