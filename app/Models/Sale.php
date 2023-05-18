<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Sale extends Model
{
    use HasFactory;

    public function saletable(): MorphTo
    {
        return $this->morphTo();
    }

    public function professional(){
        return $this->belongsTo(Professional::class,'professional_id');
    }
}
