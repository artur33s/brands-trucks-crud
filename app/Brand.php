<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    // DATABASE TABLE cars
    protected $table = 'brands';

    // Fill columns
    protected $fillable = ['name'];

}
