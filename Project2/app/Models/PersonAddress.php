<?php

namespace App\Models;

use App\Models\Person;
use App\Models\Address;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PersonAddress extends Model
{
    protected $table = 'persons_addresses';

    protected $fillable = [
        'person_id',
        'address_id',
    ];

    public function addresses()
    {
        return $this->belongsToMany(Address::class, 'persons_addresses', 'address_id', 'person_id');
    }
    public function persons()
    {
        return $this->belongsToMany(Person::class, 'persons_addresses', 'person_id', 'address_id');
    }
}
