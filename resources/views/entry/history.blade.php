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
                        <th scope="col">Position Role(s)</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Entry Success</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data->entries as $key => $entry)
                        <tr>
                            <td>{{$key += 1}}</td>
                            <td>{{$entry->user->name}}</td>
                            <td>{{$entry->created_at->format('d-M-Y')}}</td>
                            <td>{{$data->positions->pluck('name')->implode(', ')}}</td>
                            <td>{{$entry->user->phone_number}}</td>
                            <td>{!! $entry->successful ? '<span class="badge badge-sm bg-success">true<span/>' : '<span class="badge badge-sm bg-danger">false<span/>' !!}</td>
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
