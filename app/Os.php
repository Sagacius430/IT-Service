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
        'user_id',
        'client_id',
        'machines_id',
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
