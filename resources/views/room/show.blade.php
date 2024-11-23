@extends('layouts.app')

@section('content')
    <div class="container bg-white pb-3">
        <div class="mt-1 py-3 d-flex justify-content-between align-items-center">
            <h2 class="mt-2">Room Details</h2>
        </div>
        <div class="row">
            <!-- Name Card -->
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Name</h5>
                        <p class="card-text">{{$data->name}}</p>
                    </div>
                </div>
            </div>

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
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Image</h5>
                        <a href="{{Storage::url($data->image)}}" target="_blank">
                            <img src="{{Storage::url($data->image)}}" alt="" width="100%" title="Open In New Tab">
                        </a>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <a href="{{route('rooms')}}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i></a>
            </div>
        </div>
    </div>
@endsection
