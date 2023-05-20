<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\LeavesController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\LearningController;
use App\Http\Controllers\MarksController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\AccessoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\TeamController;
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
Route::get('coach/login', function () {
    return view('login.sport');
})->name('sport.login');

// Student Routes
Route::prefix('student')->middleware(['auth', 'IsStudent'])->group(function () {
    Route::get('/', function() {
        return redirect('student\dashboard');
    });
    Route::get('dashboard', function() {
        return view('student.dashboard');
    })->name('student.dashboard');
    Route::get('profile', [StudentController::class, 'navigateToProfile'])->name('student.profile');
    Route::get('attendance', [AttendanceController::class, "navigateToStudentAttendance"])->name('student.attendance');
    Route::get('marks', [StudentController::class, 'navigateToMarks'])->name('student.marks');
    Route::get('timetable', function() {
        return view('student.timetable');
    })->name('student.timetable');
    Route::get('request/sports', [StudentController::class, 'navigateToSports'])->name('student.sports');
    Route::get('feedback', [StudentController::class, 'navigateToFeedback'])->name("student.feedback");
    Route::get('request/subject', [StudentController::class, 'navigateToSubject'])->name('student.subject');
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
    Route::get('manage/accessories', [TeacherController::class, "navigateToAccessories"])->name('teacher.accessories');
    Route::get('send/message', function() {
        return view("teacher.message");
    })->name('teacher.message');
    Route::get('class/records', [TeacherController::class, 'navigateToFeedback'])->name('teacher.feedback');
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
    Route::get('add/teacher/subject', [SubjectController::class, 'navigateToTeacherSubject'])->name('admin.teacher.subject');
    Route::get('manage/accessories', [AccessoryController::class, 'adminNavigateToAccessories'])->name('admin.accessories');
    Route::get("manage/class/record", function() {
        return view("admin.subject");
    })->name('admin.class.report');
    Route::get('add/student/subject', [SubjectController::class, 'navigateToStudentSubject'])->name('admin.student.subject');
    Route::get('manage/leaves', [LeavesController::class, 'navigateToadminApproveLeaves'])->name('admin.leaves');
    Route::get('manage/sports', [SportController::class, "navigateToAdminSport"])->name('admin.sports');
});

// Library Routes
Route::prefix('library')->middleware(['auth', 'IsLibrarian'])->group(function() {
    Route::get('dashboard', [BookController::class, "navigateToDashboard"])->name('library.dashboard');
    Route::get('books/add', [BookController::class, "navigateToAddBooks"])->name('library.addbooks');
    Route::get('books/search', [BookController::class, 'navigateToSearch'])->name('library.search');
    Route::get('books/manage', function() {
        return view('library.manage');
    })->name('library.manage');
    Route::get('lateList', [BookController::class, "navigateToLateList"])->name('library.lateList');
});

// Sport Routes
Route::prefix('sport')->group(function() {
    Route::get('dashboard', function() {
        return view('sport.dashboard');
    })->name('sport.dashboard');
    Route::get('manage/teams', [TeamController::class, 'navigateToTeams'])->name('sport.teams');
    Route::get('add/student', [SportController::class, "navigateToAddStudent"])->name('sport.add.student');
    Route::get('add/timetable', [SportController::class, "navigateToTimeTable"])->name('sport.add.timetable');
    Route::get('add/awards', [SportController::class, 'naivgateToAddAwards'])->name('sport.add.awards');
    Route::get('list/student', [SportController::class, "navigateToStudentList"])->name('sport.student.list');
    Route::get('list/requests', [SportController::class, 'navigateToRequests'])->name('sport.requests');
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
    Route::post('teacher/subject', [TeacherController::class, 'addSubject'])->name('add.subject.to.teacher');
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

    // student subject
    Route::prefix('subject/student/action/')->group(function() {
        Route::post('aesthetics', [SubjectController::class, 'studentActionAesthetics'])->name('student.subject.action.aesthetics');
        Route::post('ol', [SubjectController::class,'studentActionOL'])->name('student.subject.action.ol');
    });
});
Route::prefix('search')->group(function() {
    Route::get('student/{id}', [StudentController::class, 'show'])->name('search.student');
    Route::post('student/live', [StudentController::class, 'live'])->name('live.search.student');
    Route::post('student/discipline', [StudentController::class, 'searchStudentForDiscipline'])->name('search.student.discipline');
    Route::post("teacher", [TeacherController::class, 'show'])->name('search.teacher');
    Route::get("teacher/all/{nic}", [TeacherController::class, 'search'])->name('search.teacher.all.details');
    Route::get("teacher/live/{id}", [TeacherController::class, 'live'])->name('live.search.teacher');
    Route::post('class/record', [LearningController::class, 'showRecord'])->name('search.class.record');
    Route::get('accessories/{grade}/{class}', [AccessoryController::class, 'show'])->name('search.accessories');
});

// admin update discipline
Route::post('update/discipline', [StudentController::class, 'updateDiscipline'])->name('update.discipline');

Route::delete('remove/section/head', [TeacherController::class, 'removeSectionHead'])->name("remove.section.head");
Route::post('remove/teacher/subject/grade', [TeacherController::class, 'removeSubjectFromGrade'])->name('remove.grade.from.teacher');
Route::post('remove/teacher/subject/all', [TeacherController::class, 'removeSubjectFromAll'])->name('remove.all.grade.from.teacher');
Route::post('show/grade/teacher/subject', [TeacherController::class, 'showSubjectGrade'])->name('show.grade.for.subject');
Route::delete('delete/accessory/{id}', [AccessoryController::class, 'deleteRequest'])->name('delete.accessory.request');
Route::get('reject/request/al/{id}', [SubjectController::class, 'rejectALRequest'])->name('reject.al.request');

// admin route for get feedbacks
Route::post('feedbacks', [LearningController::class, 'getFeedbacks'])->name('get.feedbacks');

// admin manage student subject routes
Route::post('activate/request', [SubjectController::class, 'activate'])->name('request.activate');
Route::post("get/subjects/marks", [MarksController::class, 'getMarksForSubject'])->name('get.marks.for.subject');

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
Route::post('add/learning/task', [LearningController::class, 'addTask'])->name('add.learning.task');
Route::post('report/feedback', [LearningController::class, 'reportFeedback'])->name('report.feedback');
Route::post('update/accessories', [AccessoryController::class, 'updateAccessories'])->name('update.accessories');
Route::post('request/accessories', [AccessoryController::class, 'requestAccessories'])->name('send.accessories.request');

// Student Function Routes
Route::post('submit/assignment', [AssignmentController::class, 'submit'])->name('submit.assignment');
Route::post('student/search/marks', [StudentController::class, 'searchMarks'])->name('student.search.marks');
Route::post('request/subject/aesthetic', [SubjectController::class, 'requestAestheticSubject'])->name('request.aesthetic.subject');
Route::post("request/subject/ol", [SubjectController::class, 'requestOlSubject'])->name('request.ol.subject');
Route::post('request/subject/al', [SubjectController::class, 'requestAlSubject'])->name('request.al.subject');
Route::post("send/feedback", [LearningController::class, 'sendFeedback'])->name('send.feedback');
Route::get('search/sport/{name}', [SportController::class, 'search'])->name('search.sport');
Route::get('request/sport/{name}', [SportController::class, 'request'])->name('request.sport');

// librarian function routes
Route::post('add/book', [BookController::class, 'add'])->name('add.book');
Route::post('borrow/book', [BookController::class, 'borrow'])->name('borrow.book');
Route::get('search/book/{id}', [BookController::class, 'search'])->name('search.book');
Route::get('search/book/author/{author}', [BookController::class, 'searchByAuthor'])->name('search.by.author');
Route::get('search/book/title/{title}', [BookController::class, 'searchByTitle'])->name('search.by.title');
Route::get('return/book/{id}', [BookController::class, 'returnBook'])->name('return.book');

// sports function routes
Route::post('add/student/sport', [SportController::class, 'addStudent'])->name('add.student.to.sport');
Route::get('search/student/{sport}/{id}', [SportController::class, 'searchStudent'])->name('search.student.sport');
Route::post('add/award', [SportController::class, 'addAward'])->name('add.award');
Route::post('search/award', [SportController::class, 'searchAwards'])->name('search.award');
Route::post('send/timetable', [MailController::class, 'sendTimetable'])->name('send.sport.timetable');
Route::post('add/team/student', [TeamController::class, 'addStudent'])->name('add.student.to.team');
Route::get('search/team/{sport}/{team}', [TeamController::class, 'searchTeam'])->name('search.sport.team');
Route::get('remove/player/{sport}/{team}/{index}', [TeamController::class, 'removePlayer'])->name('remove.player');
Route::post('change/position', [TeamController::class, 'changePosition'])->name('change.position');
Route::post('sport/request/action', [SportController::class, 'requestAction'])->name('sport.request.action');

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
