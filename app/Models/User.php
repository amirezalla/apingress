<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;



class User extends Authenticatable
{
    use Notifiable,HasFactory,HasApiTokens;

    protected $fillable = ['name', 'email', 'password', 'eth_address','bio'];

    public function getImageUrlAttribute($value)
    {
        return $value ?? asset('storage/profiles/profiledefault.jpg');
    }

    public function getCoverUrlAttribute($value)
    {
        return $value ?: asset('storage/profiles/coverdefault.jpg');
    }
    
}
