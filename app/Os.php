<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

class Os extends Model
{
    protected $fillable = [
        'service',
        'diagnosis',
        'status',
        'contacted',
        'user_id',
        'machines_id',
    ];

    public function users(){
        return $this->belongsTo('App\User');
    }

    public function machines(){
        return $this->belongsTo('App\Machine');
    }
}
