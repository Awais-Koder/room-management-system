<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntryAccessRequest;
use App\Models\UserRoomEntry;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;

class EntrySimulationController extends Controller
{
    public function index()
    {
        return view('entry.index');
    }
    public function checkAccess(EntryAccessRequest $request)
    {
        $employee = User::findOrFail($request->employee_id);
        $room = Room::findOrFail($request->room_id);
        $allowedPositions = $room->positions;  // Assuming rooms have many positions
        $employeePositions = $employee->positions;  // Get employee's positions
        $hasAccess = $employeePositions->intersect($allowedPositions)->isNotEmpty();
        $status = $hasAccess ? true : false;
        $message = $hasAccess ? 'The employee has access to the room.' : 'The employee does not have access to the room.';
        UserRoomEntry::create([
            'user_id' => $employee->id,
            'room_id' => $room->id,
            'successful' => $status,
        ]);
        return back()->with('success' , $message);
    }
}
