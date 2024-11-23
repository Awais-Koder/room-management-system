<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employees = User::where('admin' , '!=' , true)->count();
        $rooms = Room::all()->count();
        $jobs = Position::all()->count();
        return view('home' , compact('employees' , 'rooms' , 'jobs'));
    }
}
