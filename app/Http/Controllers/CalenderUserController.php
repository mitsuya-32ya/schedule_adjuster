<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCalenderUserRequest;
use App\Http\Requests\UpdateCalenderUserRequest;
use App\Models\CalenderUser;

class CalenderUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreCalenderUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCalenderUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CalenderUser  $calenderUser
     * @return \Illuminate\Http\Response
     */
    public function show(CalenderUser $calenderUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CalenderUser  $calenderUser
     * @return \Illuminate\Http\Response
     */
    public function edit(CalenderUser $calenderUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCalenderUserRequest  $request
     * @param  \App\Models\CalenderUser  $calenderUser
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCalenderUserRequest $request, CalenderUser $calenderUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CalenderUser  $calenderUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(CalenderUser $calenderUser)
    {
        //
    }
}
