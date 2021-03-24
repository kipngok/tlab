<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
            protected $table='companys';	
            protected $fillable = [
         'id','company_name', 'contact', 'email', 'kra_pin', 'image'
    ];

    // public function product(){
    // 	return $this->hasMany('App\Product' ,'id','product_id');
    // }
       

      // public function product(){
      //  	return $this->hasOne('App\Product','id','product_id')->withDefault(['name'=>'Deleted']);
      //  }
    //


      public function product(){
        return $this->hasMany('App\Product','company_id','id')->withDefault(['name'=>'Deleted']);
       }
}
