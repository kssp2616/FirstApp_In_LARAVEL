<?php

namespace App\Http\Controllers;

use App\Models\dashboarddata;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\post;
use App\Models\User;
use App\Models\order;

class dashboardcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard',[
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\dashboarddata  $dashboarddata
     * @return \Illuminate\Http\Response
     */
    public function show(dashboarddata $dashboarddata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\dashboarddata  $dashboarddata
     * @return \Illuminate\Http\Response
     */
    public function edit(dashboarddata $dashboarddata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\dashboarddata  $dashboarddata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dashboarddata $dashboarddata)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dashboarddata  $dashboarddata
     * @return \Illuminate\Http\Response
     */
    public function destroy(dashboarddata $dashboarddata)
    {
        //
    }
}
