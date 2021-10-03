<?php

namespace App\Models;

use App\Models\Person;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PanCard extends Model
{
    protected $table = 'pancards';

    protected $fillable = [
        'person_id',
        'number',
    ];

    public function persons()
    {
        return $this->hasOne(Person::class);
    }
}
