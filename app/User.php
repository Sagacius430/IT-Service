<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Notifications\ResetPassword;


class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'second_name', 'email', 'fone', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    //Mutator (Ao atribuir o password ele atribui o hash)
    public function setPasswordAttribute($value){

        $this->attributes['password'] = Hash::make($value);
    }

    //accessor (manipulação no momento do retorno do atributo no campo do index)
    public function getNameAttribute($value){

        $nameLowercase = strtolower($value);
        $nameUppercaseFirst = ucfirst($nameLowercase);

        return $nameUppercaseFirst;
    }
    
    //accessor (manipulação no momento do retorno do atributo no campo do index)
    public function getSecond_nameAttribute($value){
        
        $nameLowercase = strtolower($value);
        $nameUppercaseFirst = ucfirst($nameLowercase);

        return $nameUppercaseFirst;
    }

    public function sendPasswordResetNotification($token){

        $this->notify(new ResetPassword($token));
        
    }

    public function token(){ 

        return $this->hasOne('App\Token');
    }

    public function os(){ 
        
        return $this->hasMany('App\Os');
    }

}
