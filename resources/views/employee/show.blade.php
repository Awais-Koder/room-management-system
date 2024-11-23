@extends('layouts.app')

@section('content')
    <div class="container bg-white pb-3">
        <div class="mt-1 py-3 d-flex justify-content-between align-items-center">
            <h2 class="mt-2">Employee Details</h2>
        </div>
        <div class="row">
            <!-- Name Card -->
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Name</h5>
                        <p class="card-text">{{$data->name}}</p>
                    </div>
                </div>
            </div>

            <!-- Email Card -->
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Email</h5>
                        <p class="card-text">{{$data->email}}</p>
                    </div>
                </div>
            </div>

            <!-- Card Number Card -->
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Card Number</h5>
                        <p class="card-text">{{$data->card_number}}</p>
                    </div>
                </div>
            </div>
            <!-- Phone Number Card -->
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Phone Number</h5>
                        <p class="card-text">{{$data->phone_number}}</p>
                    </div>
                </div>
            </div>
            <!-- Jobs Card -->
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Positions</h5>
                        <p class="card-text">{{
                        $data->positions->pluck('name')->implode(', ')
                        }}</p>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <a href="{{route('employees')}}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i></a>
            </div>
        </div>
    </div>
@endsection
