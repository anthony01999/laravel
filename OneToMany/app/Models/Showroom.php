<?php

namespace App\Models;

use App\Models\Car;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Showroom extends Model
{
    protected $table = 'showrooms';

    protected $fillable = [
        'title',
        'location',
    ];

    public function cars()
    {
        return $this->hasMany(Car::class, 'showroom_id');
    }
}
