<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'zip_code',
        'city',
        'uf',
        'district',
        'street',
        'number',
        'complement',
        'client_id',
    ];

public function client()
{
    return $this->belongsTo('App\Client');
}

}
