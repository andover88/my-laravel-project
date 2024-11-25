<?php
// App\Models\Post.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'image', 'caption'];

    // Define the relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
