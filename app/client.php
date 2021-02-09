<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;//importar o softdelets da migrates

class Client extends Model
{
    use SoftDeletes;

    protected $tabe ='clients';

    protected $fillable = [//para adicionar atributos em massa, menos o id e tadatime
        'name',
        'fone',
    ];

    //mascaras de exibição
    // public function getFoneAttribute(){
    //     $fone = $this->attributes['fone'];

    //     return  substr($fone, 0, 2).
    //         substr($fone, 2, 2).' '.
    //         substr($fone, 3, 4).'-'.
    //         substr($fone, 6, 4);
    // }

    public function address(){

        return $this->hasOne('App\Address');

    }

    public function machines(){

        return $this->hasMany('App\Machine');

    }

    public function machine(){

        return $this->hasOne('App\Machine');

    }

    public function clients(){
        return $this->hasMany('App\Client');
    }
    
}
