<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=[
        'game',
        'image'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
