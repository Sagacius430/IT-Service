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

    public function getNameAttribute($value){

        $nameLowercase = strtolower($value);
        $nameUppercaseFirst = ucfirst($nameLowercase);

        return $nameUppercaseFirst;
    }

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
    
    public function os(){ 
        
        return $this->hasMany('App\Os');
    }
}
