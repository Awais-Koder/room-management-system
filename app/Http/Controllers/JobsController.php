<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobStoreRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Position;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index()
    {
        $data = Position::withCount(['users', 'rooms'])->latest()->get();
        return view('Jobs.index', compact('data'));
    }
    public function create()
    {
        return view('Jobs.create');
    }
    public function store(JobStoreRequest $request)
    {
        $data = $request->except('room_id');
        $position = Position::create($data);
        $position->rooms()->attach($request->room_id);
        return redirect()->back()->with('success', 'Job Created Successfully.');
    }

    public function show($id)
    {
        $data = Position::with(['rooms' , 'users'])->findOrFail($id);
        return view('Jobs.show' , compact('data'));
    }
    public function edit($id)
    {
        $data = Position::with('rooms')->findOrFail($id);
        $rooms = $data->rooms->pluck('id')->toArray();
        return view('Jobs.edit', compact('data', 'rooms'));
    }
    public function update(UpdateJobRequest $request, $id)
    {
        $data = $request->except('room_id');
        $job = Position::findOrFail($id);
        $job->update($data);
        $job->rooms()->sync($request->room_id);
        return redirect()->back()->with('success', 'Job Updated Successfully.');
    }

    public function delete($id)
    {
        $data = Position::findOrFail($id);
        $data->delete();

        return redirect()->back()->with('success' , 'Job Deleted Successfully.');
    }
}
