<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ClassController;

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
    Route::get('attendance', function() {
        return view('student.attendance');
    })->name('student.attendance');
    Route::get('marks', function() {
        return view('student.marks');
    })->name('student.marks');
    Route::get('timetable', function() {
        return view('student.timetable');
    })->name('student.timetable');
    Route::get('assignments', function() {
        return view('student.assignment');
    })->name('student.assignments');
    Route::get('payment', function() {
        return view('student.payment');
    })->name('student.payment');
});

// Teahcer Routes
Route::prefix('teacher')->middleware(['auth', 'IsTeacher'])->group(function() {
    Route::get('dashboard', function() {
        return view('teacher.dashboard');
    })->name('teacher.dashboard');
    Route::get('attendance', function() {
        return view('teacher.attendance');
    })->name('teacher.attendance');
    Route::get('marks', function() {
        return view('teacher.marks');
    })->name('teacher.marks');
    Route::get('timetable', function() {
        return view('teacher.timetable');
    })->name('teacher.timetable');
    Route::get('assignments', function() {
        return view('teacher.assignment');
    })->name('teacher.assignments');
    Route::get('search/student', function() {
        return view('teacher.search');
    })->name('teacher.search');
    Route::get('search/marks', function() {
        return view('teacher.resultsheet');
    })->name('teacher.resultsheet');
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
    Route::get('manage/news', function() {
        return view('admin.news');
    })->name('admin.news');
    Route::get('manage/nonacademic', function() {
        return view('admin.nonAcademic');
    })->name('admin.nonAcademic');
    Route::get('teacher/shortLeaves', function() {
        return view('admin.teacherShortLeave');
    })->name('admin.teacherShortLeaves');
    Route::get('manage/sections', function() {
        return view('admin.sectionHead');
    })->name('admin.section');
    Route::get('manage/discipline', function() {
        return view('admin.discipline');
    })->name('admin.discipline');
    Route::get('manage/leaves', function() {
        return view('admin.approveLeaves');
    })->name('admin.leaves');
    Route::get('manage/sports', function() {
        return view('admin.sport');
    })->name('admin.sports');
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
});
Route::prefix('manage')->group(function() {
    Route::post('register', [ClassController::class, 'search_register'])->name('search.register');
    Route::post('register/remove/student', [ClassController::class, 'remove_student'])->name('remove.student.from.register');
    Route::post('register/add/student', [ClassController::class, 'add_student'])->name('add.student.to.register');
});
Route::prefix('search')->group(function() {
    Route::get('student/{id}', [StudentController::class, 'show'])->name('search.student');
});
