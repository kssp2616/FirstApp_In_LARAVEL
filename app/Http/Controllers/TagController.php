<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\User;
use App\Models\post;
use App\Models\order;
use App\Http\Requests\tagrequest;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tags.index',[
             'tags'=>Tag::all(),
             'posts'=>post::all(),
             'users'=>User::all(),
             'categories'=>category::all(),
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
         return view('admin.tags.create',[
          'posts'=>post::all(),
          'users'=>User::all(),
          'categories'=>category::all(),
          'orders'=>order::all()
         ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         /*replace validator to tagrequest*/
        Tag::create($request->all());// if you have lot of columns you can use it
        session()->flash('success','tag created successfully');

        return redirect(route('tags.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.create',[
          'tag'=>$tag,
          'posts'=>post::all(),
          'users'=>User::all(),
          'categories'=>category::all(),
          'orders'=>order::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(tagrequest $request, Tag $tag)
    {
       $tag->update([
         'name' =>$request->name
        ]);
        session()->flash('success','tag updated successfully');

        return redirect(route('tags.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        session()->flash('success','tag deleted successfully');

        return redirect(route('tags.index'));
    }
}
