<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

class Os extends Model
{
    protected $fillable = [
        //**falta procedimentos e service_id
        'service',
        'diagnosis',
        'status',
        'contacted',
        'guarantee',
        'finish',
        'procedures',
        'year',
        'month',
        'day',
        'hour',
        'user_id',
        'client_id',
        'machine_id',
        'service_id',
    ];

    public function users(){
        return $this->belongsTo('App\User', 'id', 'user_id');
    }

    public function machines(){
        return $this->belongsTo('App\Machine', 'id', 'machine_id');
    }

    public function clients(){
        return $this->belongsTo('App\Client', 'id', 'client_id');
    }

    public function services(){
        return $this->belongsTo('App\Service', 'id', 'service_id');
    }
    
    
}
