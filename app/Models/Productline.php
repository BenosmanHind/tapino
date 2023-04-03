<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productline extends Model
{
    use HasFactory;
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

    public function qte(){
        $qte_stock = Stock::where('productline_id',$this->id)->where('type','stockage')->sum('qte');
        $qte_destockage = Stock::where('productline_id',$this->id)->where('type','destockage')->sum('qte');
        $qte = $qte_stock - $qte_destockage;
        return $qte;
    }


   public function qteM2(){
    $qte_stock = Stock::where('productline_id',$this->id)->where('type','stockage')->sum('qte_m2');
    $qte_destockage = Stock::where('productline_id',$this->id)->where('type','destockage')->sum('qte_m2');
    $qte = $qte_stock - $qte_destockage;
    return $qte;
}
}
