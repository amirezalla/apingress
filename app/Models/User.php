<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'email', 'password', 'eth_address','bio'];

    public function getImageUrlAttribute($value)
    {
        return $value ?? asset('storage/profiles/profiledefault.jpg');
    }
}
