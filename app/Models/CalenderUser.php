<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CalenderUser extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'calender_id',
        'user_id',
    ];

    protected $table = 'calender_user';

    public static function isAuthUserInCalender($calenderId)
    {
        return self::where('calender_id', $calenderId)
            ->where('user_id', Auth::user()->id)
            ->count() > 0;
    }

    public function registerAuthUserInCalender($calenderId){
        $data = [
            'calender_id' => $calenderId,
            'user_id'     => Auth::user()->id,
        ];
        return $this->create($data);
    }
}
