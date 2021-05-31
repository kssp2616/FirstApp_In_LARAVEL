<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\post;
class order extends Model
{
    use HasFactory;
    protected $table="order";
    protected $fillable=['user_id','product_id','qte','status'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function posts()
    {
    	return $this->belongsToMany(post::class);
    }
}
