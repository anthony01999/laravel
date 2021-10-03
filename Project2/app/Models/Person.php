<?php

namespace App\Models;

use App\Models\Car;
use App\Models\PanCard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Person extends Model
{
    protected $table = 'persons';

    protected $fillable = [
        'firstName',
        'lastName',
        'age',
        'email',
    ];

    public function pancards()
    {
        return $this->hasOne(PanCard::class);
    }

    public function addresses()
    {
        return $this->belongsToMany(Address::class, 'persons_addresses', 'address_id', 'person_id');
    }

    public function cars()
    {
        return $this->hasMany(Car::class, 'person_id');
    }
}
