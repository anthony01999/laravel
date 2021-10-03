<?php

namespace App\Models;

use App\Models\Buyer;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'quantity',
        'buyer_id',
        'product_id',
    ];

    public function buyer(){
        return $this -> belongsTo(Buyer::class);
    }

    public function products(){
        return $this -> belongsTo(Product::class);
    }
}
