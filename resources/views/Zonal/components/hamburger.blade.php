<div class="sidebar pe-4 pb-3 nscroll bg-secondary" style="
          border-right: black 2px solid;
          border-top-right-radius: 8px;
          border-bottom-right-radius: 8px;
        ">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="{{ route('library.dashboard') }}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary text-center hide-text">Sri Dharmaloka</h3>
            <h3 class="text-primary text-center hide-text">College</h3>
        </a>

        <div class="d-flex align-items-center ms-4 mb-4 flex-column">
            <div class="d-flex align-items-center justify-content-center w-100">
                <img src="/img/badge.png" class="schoolBadge" style="height: 190px" />
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a name="ham-item" id="dashboard" href="{{ route('library.dashboard') }}" class="nav-item nav-link active"><i
                    class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a name="ham-item" id="addBook" href="{{ route('library.addbooks') }}" class="nav-item nav-link"><i class="bi bi-book-half me-2"></i>Add Books</a>
            <a name="ham-item" id="search" href="{{ route('library.search') }}" class="nav-item nav-link"><i class="bi bi-gear-wide-connected me-2"></i>Manage
                Books</a>
            <a name="ham-item" id="manage" href="{{ route('library.manage') }}" class="nav-item nav-link"><i class="bi bi-collection me-2"></i>Borrow Books</a>
            <a name="ham-item" id="lateList" href="{{ route('library.lateList') }}" class="nav-item nav-link"><i class="bi bi-card-list me-2"></i>Late List</a>

        </div>
    </nav>
</div>