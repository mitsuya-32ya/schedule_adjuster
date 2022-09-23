<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Schedule extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function calender()
    {
        return $this->belongsTo(Calender::class);
    }

    public static function isOldSchedules($calenderId)
    {
        return self::where('calender_id', $calenderId)
            ->where('user_id', Auth::user()->id)->count() > 0;
    }
    
}
