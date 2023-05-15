{{-- Navbar start --}}
<nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>
    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa fa-envelope me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Messages</span> <!-- copy -->
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                <a href="#" class="dropdown-item">
                    <div class="d-flex align-items-center">
                        <div class="ms-2">
                            <span class="fw-normal mb-0 text-dark">You Have No Any Messages</span>
                        </div>
                    </div>
                </a>
                <hr class="dropdown-divider">
            </div>
        </div>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa fa-bell me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Notifications</span> <!-- copy -->
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                <a href="#" class="dropdown-item">
                    <span class="fw-normal mb-0 text-dark">You have no Any Notifications</span>
                </a>
                <hr class="dropdown-divider">
            </div>

        </div>
        <form method="post" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-primary ms-5">LogOut</button>
        </form>
    </div>
</nav>
{{-- Navbar end --}}