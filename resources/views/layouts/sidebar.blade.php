<nav class="col-md-2 d-none d-md-block bg-light sidebar border-end border-top border-2 position-fixed"
    style="height: 100vh">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item border-bottom">
                <a class="nav-link active" href="{{ route('dashboard') }}">
                    <i class="fa-solid fa-house"></i>
                    <span class="mx-2">Dashboard</span>
                </a>
            </li>
            <li class="nav-item border-bottom">
                <a class="nav-link" href="{{ route('employees') }}">
                    <i class="fa-solid fa-user-group"></i>
                    <span class="mx-2">Employees</span>
                </a>
            </li>
            <li class="nav-item border-bottom">
                <a class="nav-link" href="{{ route('jobs') }}">
                    <i class="fa-solid fa-person-digging"></i>
                    <span class="mx-2">Jobs</span>
                </a>
            </li>
            <li class="nav-item border-bottom">
                <a class="nav-link" href="{{ route('rooms') }}">
                    <i class="fa-solid fa-house-chimney"></i>
                    <span class="mx-2">Rooms</span>
                </a>
            </li>
            <li class="nav-item border-bottom">
                <a class="nav-link" href="{{ route('entry.simulation') }}">
                    <i class="fa-solid fa-person-through-window"></i>
                    <span class="mx-2">Entry Simulation</span>
                </a>
            </li>
            <li class="nav-item border-bottom">
                <a class="nav-link" href="{{ route('room.entry.history') }}">
                    <i class="fa-solid fa-arrow-rotate-left"></i>
                    <span class="mx-2">Room Entry History</span>
                </a>
            </li>
            <li class="nav-item border-bottom">
                <a class="nav-link" href="{{ route('my.permission') }}">
                    <i class="fa-solid fa-lock"></i>
                    <span class="mx-2">My Permissions</span>
                </a>
            </li>
            <li class="nav-item border-bottom">
                <a class="nav-link" href="{{ route('my.entry.logs') }}">
                    <i class="fa-solid fa-file"></i>
                    <span class="mx-2">My Entry Logs</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
