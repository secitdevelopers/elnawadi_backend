<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Activity extends Model
{
    use HasFactory;
     protected $guarded = [];

     protected $table = 'activities';
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class,'activity_id');
    }
 
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function scopeActiveAndSorted($query)
    {
        return $query->where('status', 1)
            ->orderBy('arrange')
            ->orderByDesc('created_at')
            ->select('id', DB::raw("name_" . app()->getLocale() . " AS name"), 'price', 'image', 'adress');
    }

        public function scopeActivitiesById($query)
    {
        return $query->with('user')
                ->select('id', 'name_' . app()->getLocale() . ' AS name', 'price', 'user_id', 'image','price_for_one' , 'price_for_two' ,  'adress',  'start_data', 'end_data',  'description_' . app()->getLocale() . ' AS description', 'activities_catogeries_id');
    }
    
        public function scopeActiveAndSortedForSearch($query, $keyword)
    {
        return $query->where('status', 1)
                ->where(function ($query) use ($keyword) {
                    $query->where('name_en', 'LIKE', "%{$keyword}%")
                        ->orWhere('name_ar', 'LIKE', "%{$keyword}%");
                })
                ->orderByDesc('created_at')
                ->select('id', DB::raw("name_" . app()->getLocale() . " AS name"), 'price', 'image');
    }

}