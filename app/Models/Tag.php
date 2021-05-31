<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\post;

class Tag extends Model
{
    use HasFactory; 
    protected $fillable=['name'];



    public function posts()
    {
    	return $this->belongsToMany(post::class);
    }
}
