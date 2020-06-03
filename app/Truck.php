<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    // DATABASE TABLE trucks
    protected $table = 'trucks';

    // Fill columns
    protected $fillable =
     [
         'brand_id',
         'year',
         'owner_full_name',
         'number_of_owners',
         'comment'
     ];

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

}
