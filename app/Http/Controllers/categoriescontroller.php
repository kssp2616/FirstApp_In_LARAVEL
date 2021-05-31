<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\categoryrequest;
use App\Models\category;
use App\Models\User;
use App\Models\order;
use App\Models\post;
class categoriescontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$cat=category::all();
        return view('admin.cat.index',[
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
       return view('admin.cat.create',[
            'categories'=>category::all(),
            'users'=>User::all(),
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
    public function store(categoryrequest $request)
    { 
        /*replace validator to categoryrequest*/
        category::create($request->all());// if you have lot of columns you can use it
        session()->flash('success','category created successfully');

        return redirect(route('categories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        return view('admin.cat.create',[
            'categories'=>category::all(),
            'users'=>User::all(),
            'posts'=>post::all(),
            'orders'=>order::all(),
            'category'=>$category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,category $category)
    {

        $category->update([
         'name' =>$request->name
        ]);
        session()->flash('success','category updated successfully');

        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        $category->delete();
        session()->flash('success','category deleted successfully');

        return redirect(route('categories.index'));
    }
}
