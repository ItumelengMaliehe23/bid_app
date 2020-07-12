<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'product_id', 'product_name' , 'quantity', 'total_price'
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
}
