<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Http\Requests\commentrequest;
use App\Models\post;
use App\Models\User;
use App\Models\category;
use App\Models\order;
use Illuminate\Support\Facades\DB;
use App\Models\rating;
use Auth;
class commentscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.comments.index',[
         'users'=>User::all(),
         'categories'=>category::all(),
         'posts'=>post::all(),
         'comments'=>comment::all(),
         'orders'=>order::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(post $post,commentrequest $request)
    {
        comment::create([
         'content'=>request('content'),
         'user_id'=>request('user_id'),
         'post_id'=>request('post_id')
         
        ]);
        
        $post->comments()->attach($request->comments);
        

        session()->flash('success','comment created successfully');
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {   if(Auth::user())
      {
        $id=Auth::user()->id;
      }else{
       $id=0;
      } 
        $count_card=DB::table('card')
                ->where('user_id',$id)
                ->count();
        $moyrating = DB::table('ratings')->where('itemid',$post->id)->avg('votes');
        $comment = DB::table('comments')->where('post_id',$post->id)->get();
        $namecomment=DB::table('comments')
        ->join('users','user_id','=','users.uid')
        ->get();
        return view('users.posts.show',[
        'posts'=>$post,
        'comments'=> $comment,
        'names'=>$namecomment,
        'rats' =>$moyrating,
        'cards_count'=>$count_card
        ]);
         
    }
    //supp that when u finish
    public function post(post $post)
    {
        return view('users.posts.show',compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(comment $comment)
    {
        //
    }
}
