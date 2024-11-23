@extends('layouts.app')

@section('content')
    <div class="container bg-white">
        <div class="mt-1 py-3 d-flex justify-content-between align-items-center">
            <h2 class="mt-2">Room Entry History</h2>
        </div>
        <div class="table-responsive">

            <table id="myTable" class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th scope="col">Employee Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Job Role(s)</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Entry Success</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $history)
                    <tr>
                        <td>{{$key+=1}}</td>
                        <td>{{$history->user->name}}</td>
                        <td>{{$history->created_at->format('d/M/Y')}}</td>
                        <td>{{$history->user->positions->isNotEmpty() ? $history->user->positions()->pluck('name')->implode(', ') : "N/A"}}</td>
                        <td>{{$history->user->phone_number}}</td>
                        <td>{!! $history->successful ? '<span class="badge badge-sm bg-success">True</span>' : '<span class="badge badge-sm bg-danger">False</span>' !!}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('bottom-scripts')
    <script>
        let table = new DataTable('#myTable');
    </script>
@endsection
