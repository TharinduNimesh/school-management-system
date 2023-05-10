{{-- Sidebar start --}}
<div class="sidebar pe-4 pb-3 nscroll bg-secondary"
    style="border-right: black 2px solid; border-top-right-radius: 8px; border-bottom-right-radius: 8px;">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="{{ route('admin.dashboard') }}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary text-center hide-text">Sri Dharmaloka</h3>
            <h3 class="text-primary text-center hide-text">College</h3>
        </a>

        <div class="d-flex align-items-center ms-4 mb-4 flex-column">
            <div class="d-flex align-items-center justify-content-center w-100">
                <img src="/img/badge.png" class="schoolBadge" style="height: 190px;">
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a name="ham-item" id="dashboard" href="{{ route('admin.dashboard') }}" class="nav-item nav-link active"><i
                    class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a name="ham-item" id="searchStudent" href="{{ route('admin.searchStudent') }}" class="nav-item nav-link"><i class="bi bi-search me-2"></i>Search
                Students</a>
            <a name="ham-item" id="searchTeacher" href="{{ route('admin.searchTeacher') }}" class="nav-item nav-link"><i class="bi bi-search me-2"></i>Search Teacher</a>
            <a name="ham-item" id="addStudent" href="{{ route('admin.addStudent') }}" class="nav-item nav-link"><i class="bi bi-person-plus-fill me-2"></i>Add
                Student</a>
            <a name="ham-item" id="addTeacher" href="{{ route('admin.addTeacher') }}" class="nav-item nav-link"><i class="bi bi-person-plus-fill me-2"></i>Add
                teacher</a>
            <a name="ham-item" id="nonAcademic" href="{{ route('admin.nonAcademic') }}" class="nav-item nav-link"><i class="bi bi-person-badge-fill me-2"></i>
                Non-Academic</a>
            <a name="ham-item" id="teacherShortLeave" href="{{ route('admin.teacherShortLeaves') }}" class="nav-item nav-link"><i class="bi bi-calendar-range-fill me-2"></i>Short Leaves</a>
            <a name="ham-item" id="leaves" href="{{ route('admin.leaves') }}" class="nav-item nav-link"><i class="bi bi-calendar-event-fill me-2"></i>
                Manage Leaves</a>
            <a name="ham-item" id="section" href="{{ route('admin.section') }}" class="nav-item nav-link"><i class="bi bi-stack me-2"></i>
                Manage Section</a>
            <a name="ham-item" id="sports" href="{{ route('admin.sports') }}" class="nav-item nav-link"><i class="fas fa-skiing me-2"></i>
                Manage Sports</a>
            <a name="ham-item" id="accessories" href="{{ route('admin.accessories') }}" class="nav-item nav-link"><i class="fa fa-cubes me-2"></i>
                Accessories</a>
            <a name="ham-item" id="manageRegister" href="{{ route('admin.register') }}" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Manage
                Register</a>
            <a name="ham-item" id="teacherSubject" href="{{ route('admin.teacher.subject') }}" class="nav-item nav-link"><i class="bi bi-journal-code me-2"></i>Teacher
                Subject</a>
            <a name="ham-item" id="studentSubject" href="{{ route('admin.student.subject') }}" class="nav-item nav-link"><i class="bi bi-journal-plus me-2"></i>Student
                Subjects</a>
            <a name="ham-item" id="discipline" href="{{ route('admin.discipline') }}" class="nav-item nav-link"><i class="bi bi-speedometer me-2"></i>
                Discipline</a>
            <a name="ham-item" id="timetable" href="adminTimeTable.php" class="nav-item nav-link"><i class="bi bi-table me-2"></i>Time
                Table</a>
            <a name="ham-item" id="addNews" href="{{ route('admin.news') }}" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Add News</a>
        </div>
    </nav>
</div>
{{-- Sidebar end --}}