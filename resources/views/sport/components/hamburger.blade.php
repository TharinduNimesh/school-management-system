<div class="sidebar pe-4 pb-3 nscroll bg-secondary"
    style="border-right: black 2px solid; border-top-right-radius: 8px; border-bottom-right-radius: 8px;">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="dashboard.php" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary text-center hide-text">Sri Dharmaloka</h3>
            <h3 class="text-primary text-center hide-text">Collage</h3>
        </a>

        <div class="d-flex align-items-center ms-4 mb-4 flex-column">
            <div class="d-flex align-items-center justify-content-center w-100">
                <img src="/img/badge.png" class="schoolBadge" style="height: 190px;">
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a name="ham-item" id="dashboard" href="{{ route('sport.dashboard') }}"
                class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a name="ham-item" id="studentList" href="{{ route('sport.student.list') }}" class="nav-item nav-link"><i
                    class="bi bi-list-check me-2"></i>Student List</a>
            <a name="ham-item" id="awards" href="{{ route('sport.add.awards') }}" class="nav-item nav-link"><i
                    class="bi bi-award me-2"></i>Awards</a>
            <a name="ham-item" id="team" href="{{ route('sport.teams') }}" class="nav-item nav-link"><i
                    class="bi bi-people me-2"></i>teams</a>
            <a name="ham-item" id="timetable" href="{{ route('sport.add.timetable') }}" class="nav-item nav-link"><i
                    class="bi bi-table me-2"></i>Time Table</a>
            <a name="ham-item" id="addStudent" href="{{ route('sport.add.student') }}" class="nav-item nav-link"><i
                    class="bi bi-person-plus me-2"></i>Add Student</a>        
        </div>
    </nav>
</div>