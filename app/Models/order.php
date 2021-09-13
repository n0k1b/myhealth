<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $guarded = [];
    public function customer()
    {
        return $this->belongsTo('App\Models\customer','customer_id','id');
    }
    public function menu()
    {
        return $this->belongsTo('App\Models\menu','menu_id','id');
    }

}
