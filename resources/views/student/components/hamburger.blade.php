<div class="sidebar pe-4 pb-3 nscroll bg-secondary"
    style="border-right: black 2px solid; border-top-right-radius: 8px; border-bottom-right-radius: 8px;">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="{{ route('student.dashboard') }}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary text-center hide-text">Sri Dharmaloka</h3>
            <h3 class="text-primary text-center hide-text">College</h3>
        </a>

        <div class="d-flex align-items-center ms-4 mb-4 flex-column">
            <div class="d-flex align-items-center justify-content-center w-100">
                <img src="/img/badge.png" class="schoolBadge" style="height: 190px;">
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a name="ham-item" id="dashboard" href="{{ route('student.dashboard') }}" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a name="ham-item" id="attendance" href="{{ route('student.attendance') }}" class="nav-item nav-link">
                <i class="fa fa-th me-2"></i>Attendance
            </a>
            <a name="ham-item" id="marks" href="{{ route('student.marks') }}" class="nav-item nav-link">
                <i class="fa fa-keyboard me-2"></i>Marks
            </a>
            <a name="ham-item" id="timeTable" href="{{ route('student.timetable') }}" class="nav-item nav-link">
                <i class="fa fa-table me-2"></i>Time Table
            </a>
            <a name="ham-item" id="subject" href="{{ route('student.subject') }}" class="nav-item nav-link">
                <i class="bi bi-book-half me-2"></i>Request Subject
            </a>
            <a name="ham-item" id="assignments" href="{{ route('student.assignments') }}" class="nav-item nav-link">
                <i class="bi bi-journal-bookmark-fill me-2"></i>Assignments
            </a>
            <a name="ham-item" id="payment" href="{{ route('student.payment') }}" class="nav-item nav-link">
                <i class="fas fa-money-check-alt me-2"></i>Payment
            </a>
        </div>
    </nav>
</div>