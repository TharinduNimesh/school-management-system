<div class="sidebar pe-4 pb-3 nscroll">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="{{ route('teacher.dashboard') }}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary text-center">Sri Dharmaloka</h3>
            <h3 class="text-primary text-center hide-text">College</h3>
        </a>

        <div class="d-flex align-items-center ms-4 mb-4 flex-column">
            <div class="d-flex align-items-center justify-content-center w-100">
                <img src="/img/badge.png" style="height: 200px;">
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a name="ham-item" id="dashboard" href="{{ route('teacher.dashboard') }}" class="nav-item nav-link active"><i
                class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a name="ham-item" id="marksAttendance" href="{{ route('teacher.attendance') }}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Attendance <span
                class="badge bg-danger ms-3">
                    0
            </span></a>
            <a name="ham-item" id="marks" href="{{ route('teacher.marks') }}" class="nav-item nav-link"><i class="fa-solid fa-square-poll-vertical me-2"></i>Manage Marks</a>
            <a name="ham-item" id="leaves" href="{{ route('teacher.leaves') }}" class="nav-item nav-link"><i class="bi bi-bag-check-fill me-2"></i>Manage Leaves</a>
            <a name="ham-item" id="dismissal" href="{{ route('teacher.dismissal') }}" class="nav-item nav-link"><i class="fa-sharp fa-solid fa-person-breastfeeding me-2"></i></i>Student Dismiss</a>
            <a name="ham-item" id="timetable" href="{{ route('teacher.timetable') }}" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Time Table</a>
            <a name="ham-item" id="assignments" href="{{ route('teacher.assignments') }}" class="nav-item nav-link"><i class="fa-solid fa-clipboard me-2"></i>Assignments</a>
            <a name="ham-item" id="message" href="{{ route('teacher.message') }}" class="nav-item nav-link"><i class="fa-sharp fa-solid fa-envelopes-bulk me-2"></i>Mail Message</a>
            <a name="ham-item" id="feedback" href="{{ route('teacher.feedback') }}" class="nav-item nav-link"><i class="fa-solid fa-book-bookmark me-2"></i>Class Records</a>
            <a name="ham-item" id="search" href="{{ route('teacher.search') }}" class="nav-item nav-link"><i class="bi bi-search me-2"></i>Search Student</a>
            <a name="ham-item" id="result" href="{{ route('teacher.resultsheet') }}" class="nav-item nav-link"><i class="bi bi-file-earmark-spreadsheet-fill me-2"></i>Result Sheet</a>
            <a name="ham-item" id="accessories" href="{{ route('teacher.accessories') }}" class="nav-item nav-link"><i class="fa fa-cubes me-2"></i>Accessories</a>
            <a name="ham-item" id="summary" href="{{ route('teacher.summary') }}" class="nav-item nav-link"><i class="bi bi-file-bar-graph-fill me-2"></i>Summary</a>
            <a name="ham-item" id="request" href="{{ route('teacher.request') }}" class="nav-item nav-link"><i class="bi bi-file-bar-graph-fill me-2"></i>Request</a>
        </div>
    </nav>
</div>