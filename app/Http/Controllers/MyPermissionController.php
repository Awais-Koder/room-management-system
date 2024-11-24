<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class MyPermissionController extends Controller
{
    public function index()
    {
        $data = User::with('positions.rooms')->latest()->findOrFail(Auth::id());
        return view('my-permission.index' , compact('data'));
    }
}
