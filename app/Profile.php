<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'company_name', 'company_about' , 'comp_pro_img', 'comp_cov_img', 'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

}
