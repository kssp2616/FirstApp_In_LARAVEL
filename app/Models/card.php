<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\post;

class card extends Model
{
    use HasFactory;
    protected $table = 'card';
    protected $fillable = ['user_id','item_id','qte'];

    public function Post()
    {
    	return $this->belongsToMany(post::class);
    }
}
