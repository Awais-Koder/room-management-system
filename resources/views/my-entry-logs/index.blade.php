@extends('layouts.app')

@section('content')
    <div class="container bg-white">
        <div class="mt-1 py-3 d-flex justify-content-between align-items-center">
            <h2 class="mt-2">My Entry Logs</h2>
        </div>
        <div class="table-responsive">

            <table id="myTable" class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th scope="col">Attempt Date</th>
                        <th scope="col">Room Name</th>
                        <th scope="col">Success</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data->roomEntries as $key => $entry)
                        {{-- @foreach ($entry->room as $room) --}}
                            <tr>
                                <td>{{ $key += 1 }}</td>
                                <td>{{ $entry->created_at->format('d/M/Y') }}</td>
                                <td>{{ $entry->room->name }}</td>
                                <td>{!! $entry->successful ? '<span class="badge badge-sm bg-success">true<span/>' : '<span class="badge badge-sm bg-danger">false<span/>' !!}</td>
                            </tr>
                        {{-- @endforeach --}}
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
