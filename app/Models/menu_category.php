<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu_category extends Model
{
   protected $guarded = [];
   public function category()
   {
       return $this->belongsTo('App\Models\menu_category','category_id','id');
   }

}
