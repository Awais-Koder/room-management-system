@extends('layouts.app')

@php
    $isAdmin = auth()->check() && auth()->user()->admin;
@endphp
@section('content')
    <div class="container bg-white">
        <div class="mt-1 py-3 d-flex justify-content-between align-items-center">
            <h2 class="mt-2">Rooms</h2>
            @if ($isAdmin)
                <a href="{{ route('room.create') }}" class="btn btn-primary btn-sm"><b>+ New</b></a>
            @endif
        </div>
        <div class="table-responsive">
            <table id="myTable" class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th scope="col">Room Name</th>
                        <th scope="col">Positions</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($data as $key => $room)
                        <tr>
                            <td>{{ $key += 1 }}</td>
                            <td>{{ $room->name }}</td>
                            <td>
                                {{ $room->positions->isNotEmpty() ? $room->positions->pluck('name')->implode(', ') : 'N/A' }}
                            </td>
                            <td>
                                @if ($isAdmin)
                                    <a href="javascript:;" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash" onclick="confirmAndRedirect('{{ route('room.delete', $room->id) }}')"></i>
                                    </a>
                                    <a href="{{route('room.edit' , $room->id )}}" class="btn btn-sm btn-secondary">
                                        <i class="fas fa-pencil"></i>
                                    </a>
                                    <a href="{{route('room.entry.history' , $room->id )}}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                @endif
                                <a href="{{route('room.show' , $room->id )}}" class="btn btn-sm btn-warning text-white"><i
                                        class="fas fa-eye"></i></a>
                            </td>
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
