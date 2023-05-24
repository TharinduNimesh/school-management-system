<div class="sidebar pe-4 pb-3 nscroll bg-secondary" style="
          border-right: black 2px solid;
          border-top-right-radius: 8px;
          border-bottom-right-radius: 8px;
        ">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="{{ route('library.dashboard') }}" class="navbar-brand mx-4 mb-3" >
            <h3 class="text-primary text-center hide-text"  style="width: 200px">Eversoft</h3>
            <h3 class="text-primary text-center hide-text">IT Solutions</h3>
        </a>

        <div class="d-flex align-items-center ms-4 mb-4 flex-column">
            <div class="d-flex align-items-center justify-content-center w-100">
                <img src="/img/developer_logo.png" class="schoolBadge" style="width: 60%; height: 60%;" />
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a name="ham-item" id="dashboard" href="#" class="nav-item nav-link active"><i
                    class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a name="ham-item" id="schools" href="{{ route('developer.schools') }}" class="nav-item nav-link"><i class="bi bi-building me-2"></i>Manage Schools</a>
            <a name="ham-item" id="users" href="{{ route('developer.users') }}" class="nav-item nav-link"><i class="bi bi-people-fill me-2"></i>Manage Users</a>
        </div>
    </nav>
</div>