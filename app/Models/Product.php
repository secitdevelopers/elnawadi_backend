<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{

    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'products';
    // protected $appends = ['final_price'];
    // protected $hidden = ['discount_start','discount_end'];

    // public function subCategory()
    // {
    //     return $this->belongsTo(SubCategory::class, 'sub_category_id');
    // }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class, 'product_id');
    }
    public function attribute()
    {
        return $this->hasMany(Attribute::class, 'product_id');
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }






    public function scopeActiveAndSorted($query)
    {
        return $query->where('status', 1)
            ->orderBy('arrange')
            ->orderByDesc('created_at')
            ->select('id', DB::raw("name_" . app()->getLocale() . " AS name"), 'price', 'image');
    }

    public function scopeProductById($query)
    {
        return $query->with('images', 'attribute', 'user.setting')
                ->select('id', 'name_' . app()->getLocale() . ' AS name', 'price', 'user_id', 'image',  'description_' . app()->getLocale() . ' AS description', 'quantity', 'category_id');
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