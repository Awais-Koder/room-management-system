@extends('layouts.app')

@section('content')
    <div class="container bg-white pb-3">
        <div class="mt-1 py-3 d-flex justify-content-between align-items-center">
            <h2 class="mt-2">Job Details</h2>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table id="myTable" class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th scope="col">Job Name</th>
                            <th scope="col">Employee Name</th>
                            <th scope="col">Phone Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data->users as $key => $employee)
                            <tr>
                                <td>{{ $key += 1 }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->phone_number }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mb-3">
                <a href="{{ route('jobs') }}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i></a>
            </div>
        </div>
    </div>
@endsection
@section('bottom-scripts')
    <script>
        let table = new DataTable('#myTable');
    </script>
@endsection
