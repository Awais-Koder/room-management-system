<?php

namespace App\Services;

use App\Models\Position;
use App\Models\Room;
use App\Models\User;

class DefaultService
{
    public static function getPositions()
    {
        return Position::all();
    }
    public static function getRooms()
    {
        return Room::all();
    }
    public static function getEmployees()
    {
        return User::where('card_number' , '!=' , null)->get();
    }
}
