<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Design;
use App\Models\LineItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LineItemDesign extends Model
{
    protected $table = 'line_items_designs';

    protected $fillable = [
        'design_id',
        'line_id',
        'order_id'
    ];

    public function designs()
    {
        return $this->belongsTo(Design::class, 'design_id', 'designId');
    }

    public function lineItems()
    {
        return $this->belongsTo(LineItem::class, 'line_id', 'lineId');
    }

    public function orders()
    {
        return $this->belongsTo(Order::class, 'order_id', 'orderId');
    }
}
