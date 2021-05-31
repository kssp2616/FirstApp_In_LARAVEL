<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\category;
use App\Models\post;
use App\Models\comment;
use App\Models\order;
class usercontroller extends Controller
{
    public function index()
    {
      return view('admin.users.index',[
         'users'=>User::all()->where('groupid',0),
         'categories'=>category::all(),
	     'posts'=>post::all(),
	     'comments'=>comment::all(),
	     'orders'=>order::all()
      ]);
    }
}
