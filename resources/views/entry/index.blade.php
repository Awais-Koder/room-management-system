@extends('layouts.app')

@php
    $isAdmin = auth()->check() && auth()->user()->admin;
@endphp
@section('content')
    <div class="container bg-white">
        <div class="mt-1 py-3 d-flex justify-content-between align-items-center">
            <h2 class="mt-2">Entry Simulation</h2>
        </div>

        <!-- Form -->

        <form action="{{ route('entry.check.access') }}" method="post">
            @csrf
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="employee_id" class="form-label">Employees</label>
                    <select name="employee_id" id="employee_id" class="form-control" size="5">
                        <option selected disabled>-- select an employee --</option>
                        @foreach (App\Services\DefaultService::getEmployees() as $employee)
                            <option value="{{ $employee->id }}">
                                {{ $employee->name }} - ({{ $employee->card_number }})
                            </option>
                        @endforeach
                    </select>
                    <strong id="employee_id" class="form-text text-danger">
                        @error('employee_id')
                            {{ $message }}
                        @enderror
                    </strong>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="room_id" class="form-label">Rooms</label>
                    <select name="room_id" id="room_id" class="form-control" size="5">
                        <option selected disabled>-- select an employee --</option>
                        @foreach (App\Services\DefaultService::getRooms() as $room)
                            <option value="{{ $room->id }}">
                                {{ $room->name }}
                            </option>
                        @endforeach
                    </select>
                    <strong id="room_id" class="form-text text-danger">
                        @error('room_id')
                            {{ $message }}
                        @enderror
                    </strong>
                </div>
            </div>
            <div class="mb-3 pb-3">
                <button class="btn btn-sm btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection

@section('bottom-scripts')
@endsection
