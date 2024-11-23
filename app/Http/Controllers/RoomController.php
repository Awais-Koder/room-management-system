<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomStoreRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Room;
use Illuminate\Http\Request;
use Storage;

class RoomController extends Controller
{
    protected $model;
    public function __construct(Room $room)
    {
        $this->model = $room;
    }
    public function index()
    {
        $data = $this->model::with('positions')->get();
        return view('room.index', compact('data'));
    }
    //
    public function create()
    {
        return view('room.create');
    }
    public function store(RoomStoreRequest $request)
    {
        $data = $request->except('position_id');
        $data['image'] = $request->file('image')->store('room', 'public');
        $room = $this->model::create($data);
        $room->positions()->attach($request->position_id);
        return redirect()->back()->with('success', 'Room Created Successfully.');
    }

    public function edit($id)
    {
        $data = $this->model::with('positions')->findOrFail($id);
        $roomPositions = $data->positions->pluck('id')->toArray();
        return view('room.edit', compact('data', 'roomPositions'));
    }

    public function update(UpdateRoomRequest $request , $id)
    {
        $data = $request->except('position_id');
        $room = $this->model::findOrFail($id);
        if($request->has('image')){
            Storage::disk('public')->delete($room->image );
            $data['image'] = $request->file('image')->store('room' , 'public');
        }
        $room->update($data);
        $room->positions()->sync($request->position_id);
        return redirect()->back()->with('success' , 'Room Updated Successfully.');
    }

    public function show($id)
    {
        $data = $this->model::with('positions')->findOrFail($id);
        return view('room.show' , compact('data'));
    }
    public function delete($id)
    {
        $data = $this->model::findOrFail($id);
        if(Storage::disk('public')->exists($data->image)){
            Storage::disk('public')->delete($data->image);
        }
        $data->delete();
        return redirect()->back()->with('success' , 'Room Deleted Successfully.');
    }
    //
    public function history($id)
    {
        $data = Room::with(['entries.user' , 'positions'])->findOrFail($id);
        // $data = UserRoomEntry::with(['user.positions' , 'room'])->latest()->get();
        return view('entry.history' , compact('data'));
    }
}
