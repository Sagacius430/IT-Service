<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $guarded = [];

    /**
     * Undocumented function
     *
     * @param [type] $value
     * @return void
     */
    public function getMonthAttribute($value)
    {
        $months = config('os.months');
        return $months[$value];
    }
}