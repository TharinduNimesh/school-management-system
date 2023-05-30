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
            <a name="ham-item" id="dashboard" href="{{ route('zonal.dashboard') }}" class="nav-item nav-link active"><i
                    class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a name="ham-item" id="studentCount" href="{{ route('zonal.students') }}" class="nav-item nav-link"><i
                    class="bi bi-book-half me-2"></i>Student Details</a>
            <a name="ham-item" id="subject" href="{{ route('zonal.subjects') }}" class="nav-item nav-link"><i
                    class="bi bi-gear-wide-connected me-2"></i>Subject</a>
            <a name="ham-item" id="resultsheet" href="{{ route('zonal.marks') }}" class="nav-item nav-link"><i
                    class="bi bi-collection me-2"></i>Result Sheet</a>
            <a name="ham-item" id="accessories" href="{{ route('zonal.accessories') }}" class="nav-item nav-link"><i
                    class="bi bi-card-list me-2"></i>Accessories</a>
            <a name="ham-item" id="teacherCountAdd" href="{{ route('zonal.teachers') }}" class="nav-item nav-link"><i
                    class="bi bi-card-list me-2"></i>Teacher Count for Subject</a>
        </div>
    </nav>
</div>