<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCalenderUserRequest;
use App\Http\Requests\UpdateCalenderUserRequest;
use App\Models\Calender;
use App\Models\CalenderUser;
use Illuminate\Support\Facades\Auth;

class CalenderUserController extends Controller
{
    public function join($calenderId, $token, CalenderUser $calenderUser)
    {
        $calender = Calender::find($calenderId);

        $isAuthUserInCalender = CalenderUser::isAuthUserInCalender($calenderId);

        // すでにユーザがカレンダーに所属している。
        if($isAuthUserInCalender){
            return redirect()->route('calenders.show', compact('calender'))->with('flash_message', "登録済みのカレンダーです。");

        // まだユーザがカレンダーに所属していない。
        }else{
            // URLに付属するTokenがこちらの用意したTokenに一致する。
            if($token == Calender::generateToken($calender->name)){
                
                $calenderUser->registerAuthUserInCalender($calenderId);
                
                return redirect()->route('calenders.show', compact('calender'))->with('flash_message', "登録しました");

            }else{
                return redirect()->route('calender.index')->with('flash_message', "無効なTokenです。");
            }


        }
            
    }        
}
