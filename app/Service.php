<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'analysis',
        'diagnostic',
        'contacted',
        'guarantee',
    ];
}
