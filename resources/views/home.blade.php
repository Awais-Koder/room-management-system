@extends('layouts.app')

@section('content')
    <div class="container bg-white pb-3">
        <div class="mt-1 py-3 d-flex justify-content-between align-items-center">
            <h2 class="mt-2">Dashboard</h2>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">No. Of Rooms</h5>
                        <strong class="badge badge-lg bg-primary">{{ $rooms }}</strong>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">No. Of Employees</h5>
                        <strong class="badge badge-lg bg-danger">{{ $employees }}</strong>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">No. Of Positions</h5>
                        <strong class="badge badge-lg bg-warning">{{ $jobs }}</strong>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="container mt-5">
                    <h1 class="text-center mb-4">Project Overview</h1>

                    <p><strong>Project Overview:</strong></p>
                    <p>This application is a <strong>role-based access control system</strong> designed to manage employees'
                        access to card-protected rooms within a facility. It allows administrators to assign rooms to
                        employees based on their roles and whether they have an active card associated with their profile.
                        The system ensures only authorized employees can access restricted areas by validating their roles
                        and card status before granting access.</p>

                    <p><strong>Key Features:</strong></p>
                    <ul>
                        <li><strong>Employee Management:</strong>
                            <ul>
                                <li>Admins can manage employee details including names, emails, and card numbers.</li>
                                <li>Employees without a card number cannot access rooms that require card entry.</li>
                            </ul>
                        </li>
                        <li><strong>Room Management:</strong>
                            <ul>
                                <li>Admins can manage rooms, each with an associated list of employees who are allowed to
                                    access it.</li>
                                <li>Each room may have a unique set of permissions based on the employee’s roles (assigned
                                    through positions).</li>
                            </ul>
                        </li>
                        <li><strong>Card-Entry Validation:</strong>
                            <ul>
                                <li>A simulation page allows users to check if a specific employee can access a
                                    card-protected room.</li>
                                <li>Employees are only allowed entry if their role and card number are validated against the
                                    room's requirements.</li>
                            </ul>
                        </li>
                        <li><strong>Access Logging:</strong>
                            <ul>
                                <li>The system records each attempt to access a room (both successful and unsuccessful) in a
                                    <strong>UserRoomEntry</strong> log.</li>
                                <li>The log includes details about the employee, room, and the access status (successful or
                                    denied).</li>
                            </ul>
                        </li>
                        <li><strong>Role-Based Access Control:</strong>
                            <ul>
                                <li>Users can be assigned roles (e.g., admin, employee) to determine their ability to
                                    perform CRUD operations on rooms and employees.</li>
                                <li>Admins have full control over employee and room management, while other users may have
                                    restricted access based on their role.</li>
                            </ul>
                        </li>
                        <li><strong>Real-Time Feedback:</strong>
                            <ul>
                                <li>When submitting the employee access request, users receive real-time feedback on whether
                                    the employee has access to the room or not.</li>
                                <li>Success and error messages are displayed dynamically based on the validation outcome.
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <p><strong>Technologies Used:</strong></p>
                    <ul>
                        <li><strong>Backend:</strong> Laravel (PHP Framework)</li>
                        <li><strong>Database:</strong> SQLite (for storage), with migrations and relationships such as
                            <code>User</code>, <code>Room</code>, <code>Position</code>, <code>UserRoomEntry</code>.</li>
                        <li><strong>Frontend:</strong> Bootstrap (for styling) and Blade (Laravel templating engine).</li>
                        <li><strong>Authentication:</strong> Built-in Laravel authentication for managing users and roles.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
