<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','comment','post_id'];
    public function posts(){
        return $this->hasMay(Post::class);
    }
}
