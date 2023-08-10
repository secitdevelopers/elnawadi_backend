<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    public $table='countries';
    public $timestamps = false;
        protected $fillable = [
        'name', 'country_tax',
        // add other fillable attributes here
    ];
//         public function cities()
// {
//     return $this->hasMany(City::class,'country_id');
// }
}