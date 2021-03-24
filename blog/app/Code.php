<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
            protected $table='codes';	
            protected $fillable = [
         'id','code', 'product_id','status','updated_at','created_at','consumed_by','date_time','cost_valid','cost_used'
        
    ];

   
      public function product(){
       	return $this->hasOne('App\Product','id','product_id')->withDefault(['name'=>'Deleted']);
       }
}
