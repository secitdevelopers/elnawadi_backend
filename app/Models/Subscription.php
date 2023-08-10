<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;    
    protected $table = 'subscriptions'; 
    protected $guarded = [];
    public function activity()
    {
        return $this->belongsTo(Activity::class,'activity_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}