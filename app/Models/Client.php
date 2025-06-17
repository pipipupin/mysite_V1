<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Client extends Model
{
    protected $fillable = ['name', 'registration_date', 'password', 'phone', 'email'];  

    public function setPasswordAttribute($value)
    {
        if ($value) {
            $this->attributes['password'] = Hash::needsRehash($value) 
                ? Hash::make($value) 
                : $value;
        }
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
