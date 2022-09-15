<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Calender extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public static function dates($calender)
    {
        for ($i = date('Ymd', strtotime($calender->start_date)); $i <= date('Ymd', strtotime($calender->end_date)); $i++) {
            $year = substr($i, 0, 4);
            $month = substr($i, 4, 2);
            $day = substr($i, 6, 2);

            if (checkdate($month, $day, $year))
                $dates[] = date('Y-m-d', strtotime($i));
        }

        return $dates;
    }

    public function getSchedulesAt($date)
    {
        return $this->schedules->where('date', $date);
    }

    public function getAuthUserScheduleAt($date)
    {
        return $this->getSchedulesAt($date)->where('user_id', Auth::user()->id)->first();
    }

    public function isAuthUserBelongsToCalender()
    {
        return $this->users->where('id', Auth::user()->id)->first();
    }

    public static function generateToken($calenderName)
    {
        return md5($calenderName);
    }

    public function generateJoinUrl()
    {
        return (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . "/calender/{$this->id}/" . Calender::generateToken($this->name);
    }

    
}