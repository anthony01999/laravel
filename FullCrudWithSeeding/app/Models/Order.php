<?php

namespace App\Models;

use App\Models\Design;
use App\Models\Customer;
use App\Models\LineItem;
use App\Models\LineItemDesign;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'customer_id',
        'title',
        'date',
        'dueDate'
    ];

    public function customers()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customerId');
    }

    public function designs()
    {
        return $this->hasMany(Design::class, 'order_id', 'orderId');
    }

    public function lineItems()
    {
        return $this->hasMany(LineItem::class, 'order_id', 'orderId');
    }

    public function lineItemDesigns()
    {
        return $this->hasMany(LineItemDesign::class, 'order_id', 'orderId');
    }
}
