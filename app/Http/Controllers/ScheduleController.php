<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Models\Calender;
use App\Models\Schedule;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as FacadesRequest;

class ScheduleController extends Controller
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
    public function create(Calender $calender)
    {
        abort_if(!$calender->isAuthUserBelongsToCalender(), 403);
        $dates = Calender::dates($calender);
        $isOldSchedules = Schedule::isOldSchedules($calender->id);
        return view('schedules.create', compact('calender', 'dates', 'isOldSchedules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreScheduleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Calender $calender,StoreScheduleRequest $request)
    {
        $dates = Calender::dates($calender);
        $data = [];
        foreach($dates as $date){
            $data[] = [
                'id'          => $request->id[$date] ?? null,
                'date'        => $date,
                'user_id'     => Auth::user()->id,
                'calender_id' => $calender->id,
                'start_time'  => $request->start_time[$date],
                'end_time'    => $request->end_time[$date]
            ];
        }
        Schedule::upsert($data, ['id'], ['start_time', 'end_time']);

        return redirect()->route('calenders.show', compact('calender'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateScheduleRequest  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateScheduleRequest $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}
