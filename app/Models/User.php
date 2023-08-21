<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable , Notifiable;
    use HasRoles;
    protected $primaryKey = 'id';
     public function subscriptions()
    {
        return $this->hasMany(Subscription::class,'user_id');
    }
        public function subscribedActivities()
    {
        return $this->hasManyThrough(Activity::class, Subscription::class, 'user_id', 'id', 'id', 'activity_id');
    }
    public function setting()
    {
        return $this->hasOne(Setting::class, 'user_id');
    }
        public function products()
    {
        return $this->hasMany(Product::class, 'user_id');
    }
    public function activities()
    {
        return $this->hasMany(Activity::class, 'user_id');
    }
      public function withdrawal()
    {
        return $this->hasMany(Withdrawal::class, 'user_id');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
        'type', 'status', 'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
        public function cartItems()
    {
        return $this->hasMany(CartItem::class,'user_id');
    }       
     public function user_address()
    {
        return $this->hasMany(UserAddress::class,'user_id');
    }
        public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
     public function orders()
    {
        return $this->hasMany(Order::class,'user_id');
    }
}