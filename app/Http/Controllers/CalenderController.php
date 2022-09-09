<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCalenderRequest;
use App\Http\Requests\UpdateCalenderRequest;
use App\Models\Calender;
use Illuminate\Support\Facades\Auth;

class CalenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calenders = Calender::with('users')->get();

        return view('calenders.index', compact('calenders'));
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
     * @param  \App\Http\Requests\StoreCalenderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCalenderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Calender  $calender
     * @return \Illuminate\Http\Response
     */
    public function show(Calender $calender)
    {
        if ($calender->isAuthUserBelongsToCalender()){
            $dates = Calender::dates($calender);
            return view('calenders.show', compact('calender', 'dates'));
        } else {
            return view('errors.403');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Calender  $calender
     * @return \Illuminate\Http\Response
     */
    public function edit(Calender $calender)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCalenderRequest  $request
     * @param  \App\Models\Calender  $calender
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCalenderRequest $request, Calender $calender)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calender  $calender
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calender $calender)
    {
        //
    }
}
