<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\post;

class category extends Model
{
    use HasFactory;
    //protected $table = 'categories';
    protected $fillable = ['name'];
    public function posts()
    {
    	return $this->hasMany(post::class);
    }
}
