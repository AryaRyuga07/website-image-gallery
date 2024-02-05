<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    protected $table = 'photos';
    
    public function comment()
    {
        return $this->hasMany(Comment::class)->cascadeOnDelete();
    }

    public function like()
    {
        return $this->hasMany(Like::class)->cascadeOnDelete();
    }
}
