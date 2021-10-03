<?php

namespace App\Models;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = [
        'firstName',
        'lastName',
        'age',
    ];

    public function contacts()
    {
        return $this->hasOne(Contact::class);
    }
}
