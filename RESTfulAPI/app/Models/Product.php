<?php

namespace App\Models;

use App\Models\Seller;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'quantity',
        'status',
        'image',
        'seller_id',
    ];

    const AVAILABLE_PRODUCT='available';
    const UNAVAILABLE_PRODUCT='unavailable';

    public function isAvailable(){
        return $this->status == Product::AVAILABLE_PRODUCT;
    }

    public function categories(){
        return $this -> belongsToMany(Category::class);
    }

    public function seller(){
        return $this -> belongsTo(Seller::class);
    }

    public function transactions(){
        return $this -> hasMany(Transaction::class);
    }
}
