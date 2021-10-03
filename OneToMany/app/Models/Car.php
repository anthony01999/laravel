<?php

namespace App\Models;

use App\Models\Showroom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    protected $table = 'cars';

    protected $fillable = [
        'showroom_id',
        'name',
        'plateNumber',
    ];

    public function showrooms()
    {
        return $this->belongsTo(Showroom::class, 'showroom_id');
    }
}
