<?php

namespace App\Models;

use App\Models\User;
use App\Models\RoleUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'name', 'user_id'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user', 'user_id', 'role_id');
    }
}
