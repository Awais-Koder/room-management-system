@extends('layouts.app')

@php
    $isAdmin = auth()->check() && auth()->user()->admin;
@endphp
@section('content')
    <div class="container bg-white">
        <div class="mt-1 py-3 d-flex justify-content-between align-items-center">
            <h2 class="mt-2">Positions</h2>
            @if ($isAdmin)
                <a href="{{route('job.create')}}" class="btn btn-primary btn-sm"><b>+ New</b></a>
            @endif
        </div>
        <div class="table-responsive">
            <table id="myTable" class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th scope="col">Position Name</th>
                        <th scope="col">No. Of Employees</th>
                        <th scope="col">No. Of Rooms</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($data as $index => $position)
                        <tr class="">
                            <td>{{ $index += 1 }}</td>
                            <td scope="row">{{ $position->name }}</td>
                            <td>{{ $position->users_count }}</td>
                            <td>{{ $position->rooms_count }}</td>
                            <td>
                                @if ($isAdmin)
                                    <a href="javascript:;" class="btn btn-sm btn-danger"
                                        onclick="confirmAndRedirect('{{ route('job.delete', $position->id) }}')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <a href="{{ route('job.edit', $position->id) }}" class="btn btn-sm btn-secondary">
                                        <i class="fas fa-pencil"></i>
                                    </a>
                                @endif
                                <a href="{{ route('job.show', $position->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-eye text-white"></i>
                                </a>
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
