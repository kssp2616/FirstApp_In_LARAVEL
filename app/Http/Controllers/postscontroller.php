<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\User;
use App\Models\post;
use App\Models\Tag;
use App\Models\order;
use App\Http\Requests\postrequest;//for rules
use App\Http\Requests\updatepostrequest;//for rules
use Illuminate\Support\Facades\Storage;

class postscontroller extends Controller
{
    public function __construct()
    {
       $this->middleware('checkcategory')->only('create');//how work: dispaly Error when u dont have any category & u want to insert post ==> sources[kernal.php+checkcategory]
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        return view('admin.posts.index',[
            'categories'=>category::all(),
            'users'=>User::all(),
            'posts'=>post::all(),
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
        return view('admin.posts.create',[
            'categories'=>category::all(),
            'users'=>User::all(),
            'tags'=>Tag::all(),
            'posts'=>post::all(),
            'orders'=>order::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(postrequest $request)
    { 
        $post=post::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'content'=>$request->content,
            'image'=>$request->image->store('images','public'),
            'category_id' =>$request->categoryid, 
            'user_id' =>$request->user_id
            
        ]);
        if($request->tags)
        {
        $post->tags()->attach($request->tags);
        }

        session()->flash('success','post created successfully');

        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {       
        return view('admin.posts.show',[
            'categories'=>category::all(),
            'users'=>User::all(),
            'posts'=>post::all(),
            'orders'=>order::all()
        ]);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        return view('admin.posts.create',[
            'categories'=>category::all(),
            'users'=>User::all(),
            'tags'=>Tag::all(),
            'posts'=>post::all(),
            'orders'=>order::all(),
            'post'=>$post 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(updatepostrequest $request, post $post)
    {
        $data=$request->only(['title','description','content']);//only this prop
        if($request->hasFile('image'))//if isset image file
        {
            $image=$request->image->store('images','public');//add image to folder 
            Storage::disk('public')->delete($post->image);//remove form folder img
            $data['image']=$image;//add name img to data
        }
        if($request->tags)
        {
        $post->tags()->sync($request->tags);
        }
        $post->update($data);
        session()->flash('success','post updated successfully');
        return redirect(route('posts.index'));
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $post=post::withTrashed()->where('id',$id)->first();
        if($post->trashed())
        {
            
            Storage::disk('public')->delete($post->image);//deleting files[Img_form_Folder]
            $post->forceDelete();
            session()->flash('success','post deleted successfully');
        }else
        {
            $post->delete();
            session()->flash('success','post trashed successfully');
        }

        return redirect(route('posts.index'));
    }
    /**
     i create this -_- 
    */
    public function trashed()
    {
      $trashed=post::onlyTrashed()->get();
        return view('admin.posts.index',[
            'categories'=>category::all(),
            'users'=>User::all(),
            'Posts'=>post::all(),
            'orders'=>order::all(),
            'posts'=>$trashed
        ]);
    }
    /**

    */
    public function restore($id)
    {
        post::withTrashed()->where('id',$id)->restore();
        session()->flash('success','post restored successfully');
        return redirect(route('posts.index'));
    }
}
