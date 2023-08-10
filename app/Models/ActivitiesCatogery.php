<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

class ActivitiesCatogery extends Model
{
    use HasFactory;
    
     protected $fillable = [
        'name_en',
        'name_ar',
        'image',
        'status', 
        'arrange',
    ];
   
   
    protected $table = 'activities_catogeries';
        public function activities()
    {
        return $this->hasMany(activity::class,'activities_catogeries_id');
    }

      public function getImageUrl()
    {
        return Storage::disk('imagesfp')->url($this->image);
    }
}