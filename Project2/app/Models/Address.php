<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';

    protected $fillable = [
        'street',
        'area',
        'city',
        'country',
    ];

    public function persons()
    {
        return $this->belongsToMany(Person::class, 'persons_addresses', 'person_id', 'address_id');
    }
}
