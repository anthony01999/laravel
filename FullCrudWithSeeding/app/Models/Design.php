<?php

namespace App\Models;

use App\Models\Order;
use App\Models\LineItemDesign;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Design extends Model
{
    protected $table = 'designs';

    protected $fillable = [
        'order_id',
        'type',
        'location',
        'color'
    ];

    public function orders()
    {
        return $this->belongsTo(Order::class, 'order_id', 'orderId');
    }

    public function lineItemDesigns()
    {
        return $this->hasMany(LineItemDesign::class, 'design_id', 'designId');
    }
}
