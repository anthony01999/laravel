<?php

namespace App\Models;

use App\Models\Order;
use App\Models\LineItemDesign;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LineItem extends Model
{
    protected $table = 'line_items';

    protected $fillable = [
        'order_id',
        'productDescription',
        'productColor'
    ];

    public function orders()
    {
        return $this->belongsTo(Order::class, 'order_id', 'orderId');
    }

    public function lineItemDesign()
    {
        return $this->hasMany(LineItemDesign::class, 'line_id', 'lineId');
    }
}
