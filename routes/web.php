<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\LeavesController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\StaffController;
use App\Mail\ApproveLeaves;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\MarksController;
use App\Mail\StudentAssignment;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// home Routes
Route::get('home', function() {
    return view('home.index');
})->name('home.index');
Route::get('/', function () {
    return redirect(route('home.index'));
});

// Login Routes

Route::get('student/login', function() {
    return view('login.student');
})->name('student.login');
Route::get('admin/login', function() {
    return view('login.admin');
})->name('admin.login');
Route::get('teacher/login', function() {
    return view('login.teacher');
})->name('teacher.login');
Route::get('library/login', function() {
    return view('login.library');
})->name('library.login');


// Student Routes
Route::prefix('student')->middleware(['auth', 'IsStudent'])->group(function () {
    Route::get('/', function() {
        return redirect('student\dashboard');
    });
    Route::get('dashboard', function() {
        return view('student.dashboard');
    })->name('student.dashboard');
    Route::get('attendance', [AttendanceController::class, "navigateToStudentAttendance"])->name('student.attendance');
    Route::get('marks', function() {
        return view('student.marks');
    })->name('student.marks');
    Route::get('timetable', function() {
        return view('student.timetable');
    })->name('student.timetable');
    Route::get('assignments', [AssignmentController::class, 'navigateToStudentAssignments'])->name('student.assignments');
    Route::get('payment', [PaymentController::class, 'navigateToStudentPayment'])->name('student.payment');
});

// Teahcer Routes
Route::prefix('teacher')->middleware(['auth', 'IsTeacher'])->group(function() {
    Route::get('dashboard', function() {
        return view('teacher.dashboard');
    })->name('teacher.dashboard');
    Route::get('attendance', [ClassController::class, 'list_students'])->name('teacher.attendance');
    Route::get('marks', [TeacherController::class, 'navigateToMarks'])->name('teacher.marks');
    Route::get('timetable', function() {
        return view('teacher.timetable');
    })->name('teacher.timetable');
    Route::get('assignments', function() {
        return view('teacher.assignment');
    })->name('teacher.assignments');
    Route::get('search/student', function() {
        return view('teacher.search');
    })->name('teacher.search');
    Route::get('search/marks', [TeacherController::class, 'navigateToResultSheet'])->name('teacher.resultsheet');
    Route::get('manage/leaves', [LeavesController::class, 'navigateToTeacherLeaves'])->name('teacher.leaves');
    Route::get('summary', [TeacherController::class, 'navigateToSummary'])->name('teacher.summary');
});

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'IsAdmin'])->group(function() {
    Route::get('dashboard', function() {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::get('add/student', function() {
        return view('admin.addStudent');
    })->name('admin.addStudent');
    Route::get('search/student', function() {
        return view('admin.searchStudent');
    })->name('admin.searchStudent');
    Route::get('add/teacher', function() {
        return view('admin.addTeacher');
    })->name('admin.addTeacher');
    Route::get('manage/register', function() {
        return view('admin.register');
    })->name('admin.register');
    Route::get('search/teacher', function() {
        return view('admin.searchTeacher');
    })->name('admin.searchTeacher');
    Route::get('manage/news', [NewsController::class, 'navigateToNews'])->name('admin.news');
    Route::get('manage/nonacademic', function() {
        return view('admin.nonAcademic');
    })->name('admin.nonAcademic');
    Route::get('teacher/shortLeaves', function() {
        return view('admin.teacherShortLeave');
    })->name('admin.teacherShortLeaves');
    Route::get('manage/sections', [TeacherController::class, 'navigateToSectionHead'])->name('admin.section');
    Route::get('manage/discipline', function() {
        return view('admin.discipline');
    })->name('admin.discipline');
    Route::get('add/teacher/subject', function() {
        return view('admin.teacherSubject');
    })->name('admin.teacher.subject');
    Route::get('manage/leaves', [LeavesController::class, 'navigateToadminApproveLeaves'])->name('admin.leaves');
    Route::get('manage/sports', [SportController::class, "navigateToAdminSport"])->name('admin.sports');
});

// Library Routes
Route::prefix('library')->middleware(['auth', 'IsLibrarian'])->group(function() {
    Route::get('dashboard', function() {
        return view('library.dashboard');
    })->name('library.dashboard');
    Route::get('books/add', function() {
        return view('library.addbooks');
    })->name('library.addbooks');
    Route::get('books/search', function() {
        return view('library.search');
    })->name('library.search');
    Route::get('books/manage', function() {
        return view('library.manage');
    })->name('library.manage');
    Route::get('lateList', function() {
        return view('library.lateList');
    })->name('library.lateList');
});

// Sport Routes
Route::prefix('sport')->group(function() {
    Route::get('dashboard', function() {
        return view('sport.dashboard');
    })->name('sport.dashboard');
    Route::get('add/student', function() {
        return view('sport.addStudent');
    })->name('sport.add.student');
    Route::get('add/timetable', function() {
        return view('sport.timetable');
    })->name('sport.add.timetable');
    Route::get('add/awards', function() {
        return view('sport.awards');
    })->name('sport.add.awards');
    Route::get('list/student', function() {
        return view('sport.studentList');
    })->name('sport.student.list');
});

// login functions
Route::post('login', [LoginController::class, 'login'])->name('login');
Auth::routes();

// logout function
Route::post('logout', function() {
    Auth::logout();
    return redirect(route('home.index'));
})->name('logout');

// admin functions
Route::prefix('add')->group(function() {
    Route::post('student', [StudentController::class, 'add'])->name('add.student');
    Route::post('teacher', [TeacherController::class, 'add'])->name('add.teacher');
    Route::post('staff', [StaffController::class, 'add'])->name("add.staff");
    Route::post('sport', [SportController::class, 'add_sport'])->name('add.sport');
    Route::post('coach', [SportController::class, 'add_coach'])->name('add.coach');
    Route::post('section-head', [TeacherController::class, 'makeAsSectionHead'])->name('add.section.head');
});
Route::prefix('manage')->group(function() {
    // admin manage register routes
    Route::post('register', [ClassController::class, 'search_register'])->name('search.register');
    Route::post('register/remove/student', [ClassController::class, 'remove_student'])->name('remove.student.from.register');
    Route::post('register/remove/teacher', [ClassController::class, 'remove_teacher'])->name('remove.teacher.from.register');
    Route::post('register/add/student', [ClassController::class, 'add_student'])->name('add.student.to.register');
    Route::post('register/add/teacher', [ClassController::class, 'add_teacher'])->name('add.teacher.to.class');

    // admin manage news routes
    Route::post('news/add', [NewsController::class, 'add'])->name('add.news');
    Route::delete('news/delete', [NewsController::class, 'remove'])->name('remove.news');

    // admin manage staff routes
    Route::post('staff/search', [StaffController::class, 'show'])->name("search.staff");
    Route::post('staff/search/live', [StaffController::class, 'live'])->name("live.search.staff");
    Route::post('staff/remove', [StaffController::class, 'remove'])->name('remove.staff');

    // admin manage leaves routes
    Route::patch('leaves/accept', [LeavesController::class, 'accept'])->name("admin.accept.leaves");
    Route::patch('leaves/reject', [LeavesController::class, 'reject'])->name("admin.reject.leaves");

    // short leaves
    Route::post('short/leave/add', [LeavesController::class, 'addShortLeaves'])->name('add.short.leaves');
    Route::get('short/leave/search', [LeavesController::class, 'showShortLeaves'])->name('search.short.leaves');

});
Route::prefix('search')->group(function() {
    Route::get('student/{id}', [StudentController::class, 'show'])->name('search.student');
    Route::post("teacher", [TeacherController::class, 'show'])->name('search.teacher');
});
Route::delete('remove/section/head', [TeacherController::class, 'removeSectionHead'])->name("remove.section.head");

// Teacher functions
Route::post("request/leaves", [LeavesController::class, 'request'])->name('request.leaves');
Route::patch("self/remove/leaves", [LeavesController::class, 'self_remove'])->name("teacher.reject.leaves");
Route::post("mark/attendance", [AttendanceController::class, 'mark'])->name('mark.attendance');
Route::post("search/attendance", [AttendanceController::class, 'search'])->name('search.attendance');
Route::post("update/attendance", [AttendanceController::class, 'update'])->name('update.attendance');
Route::post('add/assignment', [AssignmentController::class, "add"])->name('add.assignment');
Route::post('search/assignment', [AssignmentController::class, "search"])->name('search.assignment');
Route::post('add/marks/assignment', [AssignmentController::class, "add_marks"])->name('add.marks.assignment');
Route::post('add/marks', [MarksController::class, 'add'])->name('add.marks');
Route::post('filter/marks', [MarksController::class, 'getUnmarkedStudents'])->name('filter.student.for.marks');
Route::post('get/subjects', [MarksController::class, 'getSubjectsList'])->name('get.subjects');
Route::post('get/subject/marks', [TeacherController::class, 'getStudentMarksToUpdate'])->name('get.marks.for.update');
Route::post('update/marks', [MarksController::class, 'update'])->name('update.marks');
Route::post('teacher/search/marks', [TeacherController::class, 'teacherSearchMarks'])->name('teacher.search.marks');

// Student Function Routes
Route::post('submit/assignment', [AssignmentController::class, 'submit'])->name('submit.assignment');

// email routes
Route::get('email/assignment', function() {
    $data = [
        "student_name" => "Tharindu Nimesh",
        'start_date' => "2023-12-02",
        "end_date" => "2023-12-07",
        "url" => "https://google.com"
    ];
    return new StudentAssignment($data);
});


Route::fallback(function() {
    return view("404");
});
