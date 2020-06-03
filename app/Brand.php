<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    // DATABASE TABLE brands
    protected $table = 'brands';

    // Fill columns
    protected $fillable = ['name'];

    public function truck(){
        return $this->hasMany(Truck::class);
    }
}
