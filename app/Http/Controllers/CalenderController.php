<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalenderPostRequest;
use App\Models\Calender;
use App\Models\CalenderUser;
use App\Models\Schedule;
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
        return view('calenders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCalenderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CalenderPostRequest $request, CalenderUser $calenderUser)
    {
        // CAUTION:start_date < end_dateであるvalidationがうまく作動しないため、一旦このバリデーションエラーとなった場合は、calender.createにリダイレクトする。後に修正する必要あり。
        if($request->start_date >= $request->end_date){
            return redirect()->route('calender.create');
        }

        $form = $request->all();

        $calender = Calender::create($form);
        $linkCalenderUser = [
            'calender_id' => $calender->id,
            'user_id' => $request->user()->id,
        ];
        $calenderUser->create($linkCalenderUser);
        return redirect()->route('calenders.show', compact('calender'));
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
            $calenderJoinUrl = $calender->generateJoinUrl();
            return view('calenders.show', compact('calender', 'dates', 'calenderJoinUrl'));
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
    public function update(CalenderPostRequest $request, Calender $calender)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calender  $calender
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calender $calender, CalenderUser $calenderUser, Schedule $schedule)
    {
        $schedule->where('calender_id', $calender->id)->delete();
        $calenderUser->where('calender_id', $calender->id)->delete();
        $calender->delete();
        return redirect('calenders');
    }
}
