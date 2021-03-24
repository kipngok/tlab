<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table='products';
         protected $fillable = [
         'id', 'product_name','product_desc','volume_size','company_id','category_id'
    ];

    public function code(){
    	return $this->hasMany('App\Code' ,'product_id','id');
    }
     public function company(){
    	return $this->hasOne('App\Company' ,'id','company_id');
    }
    // public function category(){
    //    	return $this->hasOne('App\Category','id','category_id')->withDefault(['name'=>'Deleted']);
    //    }
 public function category(){
        return $this->hasOne('App\Category','id','category_id')->withDefault(['name'=>'Deleted']);
       }
}
