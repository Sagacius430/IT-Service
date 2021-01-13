<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;//importar o softdelets da migrates

class Client extends Model
{
    use SoftDeletes;

    // protected $tabe ='clients';

    protected $fillable = [//para adicionar atributos em massa, menos o id e tadatime
        'name',
        'fone',
    ];

    public function address(){

        return $this->hasOne('App\Address');

    }

    public function machines(){

        return $this->hasMany('App\Machine');

    }


}
