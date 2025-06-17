<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    // Указываем поля, которые могут быть массово присвоены
    protected $fillable = ['client_id', 'street', 'house_number', 'apartment', 'intercom', 'city'];
    // Связь с моделью Client
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
