@extends('layouts.app')

@section('content')
    <div class="container bg-white pb-3">
        <div class="mt-1 py-3 d-flex justify-content-between align-items-center">
            <h2 class="mt-2">Create Job</h2>
        </div>
        <form action="{{ route('job.store') }}" method="post">
            @csrf
            @include('Jobs.fields')
            <div class="mb-3">
                <button class="btn btn-sm btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
