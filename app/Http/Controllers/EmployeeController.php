<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeCreateRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Models\Position;
use Hash;
use Illuminate\Http\Request;
use App\Models\User;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = User::where('admin', false)->with('positions')->latest()->get();
        return view('employee.index', compact('employees'));
    }
    public function create()
    {
        return view('employee.create');
    }
    public function store(EmployeeCreateRequest $request)
    {
        $data = $request->except(['position_id', 'password_confirmation']);
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        $user->positions()->attach($request->position_id);
        return redirect()->back()->with('success', 'Employee Created Successfully.');
    }
    public function edit($id)
    {
        $data = User::with('positions')->findOrFail($id);
        $userPositions = $data->positions->pluck('id')->toArray();
        return view('employee.edit', compact('data', 'userPositions'));
    }
    public function update(EmployeeUpdateRequest $request, $id)
    {
        $data = $request->except(['position_id', 'password', 'password_confirmation']);
        // Update user data
        $user = User::findOrFail($id);
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
        $user->update($data);
        // Update the user's positions
        $user->positions()->sync($request->position_id);
        return redirect()->back()->with('success', 'Employee updated successfully.');
    }

    public function delete($id)  {
        $data = User::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Employee deleted successfully.');
    }
    public function show($id)
    {
        $data = User::with('positions')->findOrFail($id);
        return view('employee.show' , compact('data'));
    }
    public function history($id)
    {
        $data = User::with('roomEntries.room')->latest()->findOrFail($id);
        return view('my-entry-logs.index' , compact('data'));
    }
}
