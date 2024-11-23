<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class MyEntryLogsController extends Controller
{
    public function index()
    {
        $data = User::with('roomEntries.room')->latest()->findOrFail(Auth::id());
        return view('my-entry-logs.index' , compact('data'));
    }
}
