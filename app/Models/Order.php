<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['client_id', 'number', 'total_amount', 'product_id']; 
    // Определение связи с моделью Client
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
