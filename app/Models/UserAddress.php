<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{     
    // public $timestamps = false;
 protected $guarded = [];
     protected $table = 'user_addresses'; 
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');// 
    }
        public function orders()
    {
        return $this->hasMany(Order::class);
    }
}