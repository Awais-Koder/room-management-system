@extends('layouts.app')

@section('content')
    <div class="container bg-white">
        <div class="mt-1 py-3 d-flex justify-content-between align-items-center">
            <h2 class="mt-2">My Permissions</h2>
        </div>
        <div class="table-responsive">

            <table id="myTable" class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th scope="col">Position Role</th>
                        <th scope="col">Room Image</th>
                        <th scope="col">Room Name</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data->positions as $key => $position)
                        @foreach ($position->rooms as $room)
                            <tr>
                                <td>{{ $key += 1 }}</td>
                                <td>{{ $position->name }}</td>
                                <td> <img src="{{ Storage::url($room->image) }}" alt="alter-image" width="20px"
                                        height="20px"></td>
                                <td>{{ $room->name }}</td>
                                <td>{{ Str::limit( $room->description , 100) }}</td>
                            </tr>
                        @endforeach
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
