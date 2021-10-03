<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

     const VERIFIED_USER='1';
     const UNVERIFIED_USER='0';

     const ADMIN_USER='true';
     const REGULAR_USER='false';

     protected $table='users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'verified',
        'verified_token',
        'admin',
    ];

    public function isVerified(){
        return $this->verified == User::VERIFIED_USER();
    }

    public function isAdmin(){
        return $this->admin == User::ADMIN_USER();
    }

    public static function generateSpecificationCode(){
        return str_random(40);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'verification_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
