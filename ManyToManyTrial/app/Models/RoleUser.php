<?php

namespace App\Models;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoleUser extends Model
{
    protected $table = 'role_user';
    protected $fillable = [
        'user_id',
        'role_id',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'role_id', 'user_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user', 'user_id', 'role_id');
    }
}
