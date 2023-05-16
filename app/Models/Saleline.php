<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saleline extends Model
{
    use HasFactory;
    public function productline(){
        return $this->belongsTo(Productline::class,'productline_id');
    }
}
