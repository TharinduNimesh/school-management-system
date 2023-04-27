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
                    <a name="ham-item" id="attendance" href="{{ route('teacher.attendance') }}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Attendance <span
                            class="badge bg-danger ms-3">
                           0
                        </span> </a>
                    <a name="ham-item" id="marks" href="{{ route('teacher.marks') }}" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Manage Marks</a>
                    <a name="ham-item" id="leaves" href="{{ route('teacher.leaves') }}" class="nav-item nav-link"><i class="bi bi-bag-check-fill me-2"></i>Manage Leaves</a>
                    <a name="ham-item" id="timetable" href="{{ route('teacher.timetable') }}" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Time
                        Table</a>
                    <a name="ham-item" id="assignments" href="{{ route('teacher.assignments') }}" class="nav-item nav-link"><i
                            class="bi bi-journal-bookmark-fill me-2"></i>Assingments</a>
                    <a name="ham-item" id="search" href="{{ route('teacher.search') }}" class="nav-item nav-link"><i class="bi bi-search me-2"></i>Search
                        Student</a>
                    <a name="ham-item" id="result" href="{{ route('teacher.resultsheet') }}" class="nav-item nav-link"><i
                            class="bi bi-file-earmark-spreadsheet-fill me-2"></i>Result Sheet</a>
                    <a name="ham-item" id="summary" href="{{ route('teacher.summary') }}" class="nav-item nav-link"><i class="bi bi-file-bar-graph-fill me-2"></i>Summary</a>
                </div>
            </nav>
        </div>