<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\post;
use App\Models\User;

class comment extends Model
{
    use HasFactory;

    protected $fillable=['content','post_id','user_id'];

    public function Post()
    {
    	return $this->belongsTo(post::class);
    }
     public function user()
    {
        return $this->belongsTo(User::class);
    }
}
