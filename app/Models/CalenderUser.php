<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalenderUser extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'calender_id',
        'user_id',
    ];

    protected $table = 'calender_user';
}
