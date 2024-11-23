@extends('layouts.app')

@php
    $isAdmin = auth()->check() && auth()->user()->admin;
@endphp
@section('content')
    <div class="container bg-white">
        <div class="mt-1 py-3 d-flex justify-content-between align-items-center">
            <h2 class="mt-2">Employees</h2>
            @if ($isAdmin)
                <a href="{{ route('employee.create') }}" class="btn btn-primary btn-sm"><b>+ New</b></a>
            @endif
        </div>
        <div class="table-responsive">

            <table id="myTable" class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th scope="col">Employee Name</th>
                        <th scope="col">Position Role(s)</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($employees as $index => $employee)
                        <tr class="">
                            <td>{{ $index += 1 }}</td>
                            <td scope="row">{{ $employee->name }}</td>
                            <td>{{ $employee->positions->pluck('name')->implode(', ') }}</td>
                            <td>{{ $employee->phone_number }}</td>
                            <td>
                                @if ($isAdmin)
                                    <a href="javascript:;" class="btn btn-sm btn-danger"
                                        onclick="confirmAndRedirect('{{ route('employee.delete', $employee->id) }}')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-sm btn-secondary">
                                        <i class="fas fa-pencil"></i>
                                    </a>
                                    <a href="{{ route('employee.history', $employee->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                @endif
                                <a href="{{ route('employee.show', $employee->id) }}" class="btn btn-sm btn-warning">
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
