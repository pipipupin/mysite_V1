<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Setting extends Model
{
    protected $fillable = ['client_id', 'alias', 'component', 'value'];
    
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}