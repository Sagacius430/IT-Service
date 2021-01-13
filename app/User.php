<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    //Mutator
    public function setPasswordAttribute($value){
        $this->attributes['password'] = Hash::make($value);
    }

    //Acessor
    public function getNameAttribute($value){
        $nameLowercase = strtolower($value);
        $nameUppercaseFirst = ucfirst($nameLowercase);

        return $nameUppercaseFirst;
    }

    public function getSecond_nameAttribute($value){
        $nameLowercase = strtolower($value);
        $nameUppercaseFirst = ucfirst($nameLowercase);

        return $nameUppercaseFirst;
    }
}
