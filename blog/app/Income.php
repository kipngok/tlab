<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    //
     protected $table='notification';
         protected $fillable = [
         'id','cost_valid', 'cost_invalid', 'cost_used', 'notification', 'created_at', 'updated_at', 'code_id', 'invalid_code', 'consumed_by', 'status'
    ];

}
