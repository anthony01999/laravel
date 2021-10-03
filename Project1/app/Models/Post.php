<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'name',
    ];
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
