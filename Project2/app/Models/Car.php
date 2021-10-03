<?php

namespace App\Models;

use App\Models\Person;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    protected $table = 'cars';

    protected $fillable = [
        'person_id',
        'plateNumber',
        'registrationNumber',
        'registrationArea',
    ];

    public function persons()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }
}
