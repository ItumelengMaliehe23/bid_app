<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name', 'product_category' , 'product_disc', 'product_img_1', 'product_img_2', 'product_price', 'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
    
}
