<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\category;
use App\Models\Tag; 
use App\Models\User;
use App\Models\comment;
use App\Models\card;
use App\Models\order;
class post extends Model
{
    use HasFactory;
    use SoftDeletes;
    //protected $table = 'posts';
    protected $fillable=['title','description','content','image','category_id','user_id'];
    public function order()
    {
        return $this->belongsTo(order::class);
    }
    public function Card()
    {
        return $this->belongsTo(card::class);
    }
    public function Category()
    {
    	return $this->belongsTo(category::class);
    }
    public function tags()
    {
    	return $this->belongsToMany(Tag::class);//tag & post
    }

    public function hastag($tagid)
    {
        return in_array($tagid,$this->tags->pluck('id')->toArray());//get all tag id's in array and we used 'in_array'
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->belongsToMany(comment::class);//comnt & post
    }
    public function hascomment($commentid)
    {
        return in_array($commentid,$this->comments->pluck('id')->toArray());//get all comments id's in array and we used 'in_array'
    }
}
