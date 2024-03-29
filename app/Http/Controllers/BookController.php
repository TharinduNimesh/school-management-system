<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BorrowedBook;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Staff;

class BookController extends Controller
{
    public function add(Request $request) {
        $book = Book::where("book_id", $request->id)
        ->where("school", auth()->user()->school)
        ->first();
        if($book == null) {
            $book = new Book();
            $book->book_id = $request->id;
            $book->title = $request->title;
            $book->author = $request->author;
            $book->school = auth()->user()->school;
            $saved = $book->save();

            if($saved) {
                return "success";
            } else {
                return "failed";
            }
        } else {
            return "already";
        }
    }

    public function borrow(Request $request) {
        $book = book::where("book_id", $request->bookId)
        ->where("school", auth()->user()->school)
        ->first();
        $person = null;
        if($request->role == "student") {
            $person = StudentController::getStudent($request->index, auth()->user()->school);
        } else if($request->role == "teacher") {
            $person = TeacherController::getTeacher($request->index, auth()->user()->school);
        } else if($request->role == "nonacademic") {
            $person = Staff::where("nic", $request->index)->first();
        }
        if($person != null) {
            if($book != null) {
                if(self::isAvailable($request->bookId)) {
                    $holder = BorrowedBook::where("holder_id", $request->index)
                    ->where("school", auth()->user()->school)
                    ->where("returned", false)
                    ->first();
                    if($holder == null) {
                        $holder = new BorrowedBook();
                        $holder->holder_id = $request->index;
                        $holder->book_id = $request->bookId;
                        $holder->title = $book->title;
                        $holder->borrowed_date = $request->date;
                        $holder->need_to_return = Date("Y-m-d", strtotime($request->date . "+ 7 days"));
                        $holder->role = $request->role;
                        $holder->school = auth()->user()->school;
                        $holder->returned = false;
                        $saved = $holder->save();
    
                        if($saved) {
                            return 'success';
                        } else {
                            return 'failed';
                        }
                    } else {
                        return 'personHaveABook';
                    }
                }
                return "notAvailable";
            }
            return 'invalidBook';
        }
        return 'invalidIndex';
    }

    public function search($id) {
        $response = new \stdClass();
        $book = Book::where("book_id", $id)
        ->where("school", auth()->user()->school)
        ->first();
        if($book != null) {
            $borrowedBook = BorrowedBook::where("title", $book->title)
            ->where("school", auth()->user()->school)
            ->get();
            $copies = Book::where("title", $book->title)
            ->where("school", auth()->user()->school)
            ->count();
    
            $response->id = $book->book_id;
            $response->title = $book->title;
            $response->author = $book->author;
            $response->copies = $copies;
            $response->borrowingCount = count($borrowedBook);
            if(self::isAvailable($id)) {
                $response->available = "Available";
                $response->holder = "None";
            } else {
                $response->available = false;
                $getHolder = BorrowedBook::where("book_id", $id)
                ->where("school", auth()->user()->school)
                ->where("returned", false)
                ->first();
                $holder = null;
                $response->borrowed_id = $getHolder->_id;
                $response->holder = $getHolder->holder_id;
                $response->role = $getHolder->role;

                if($getHolder->role == "student") {
                    $holder = StudentController::getStudent($getHolder->holder_id, auth()->user()->school);
                } else if($getHolder->role == "teacher") {
                    $holder = TeacherController::getTeacher($getHolder->holder_id, auth()->user()->school);
                } else if($getHolder->role == "nonacademic") {
                    $holder = Staff::where("nic", $getHolder->holder_id)->first();
                }

                $response->holder_name = $holder->full_name;

                if($getHolder->need_to_return < Date("Y-m-d")) {
                    $response->late = true;
                } else {
                    $response->late = false;
                }
            }
            return $response;
        }
        return "invalid";
    }

    public function returnBook($id) {
        $book = BorrowedBook::find($id);
        if($book != null) {
            $book->returned = true;
            $saved = $book->save();
            if($saved) {
                return "success";
            } else {
                return "failed";
            }
        }
        return "invalid";
    }

    public function searchByAuthor($author) {
        $books = Book::where("author", $author)
        ->where("school", auth()->user()->school)
        ->get();

        $list = [];
        foreach ($books as $book) {
            $obj = new \stdClass();
            $obj->id = $book["book_id"];
            $obj->title = $book["title"];
            $obj->available = self::isAvailable($book["book_id"]);

            array_push($list, $obj);
        }

        $count = Book::where("author", $author)
        ->where("school", auth()->user()->school)
        ->distinct("title")
        ->get();

        $response = new \stdClass();
        $response->books = $list;
        $response->count = count($count);
        
        return $response;
    }

    public function searchByTitle($title) {
        $books = Book::where("title", $title)
        ->where("school", auth()->user()->school)
        ->get();

        $list = [];
        foreach ($books as $book) {
            $obj = new \stdClass();
            $obj->id = $book["book_id"];
            $obj->author = $book["author"];
            $obj->available = self::isAvailable($book["book_id"]);

            array_push($list, $obj);
        }

        $count = Book::where("title", $title)
        ->where("school", auth()->user()->school)
        ->get();

        $response = new \stdClass();
        $response->books = $list;
        $response->count = count($count);
        
        return $response;
    }

    public static function isAvailable($id) {
        $book = Book::where("book_id", $id)
        ->where("school", auth()->user()->school)
        ->first();
        if($book != null) {
            $borrowedBook = BorrowedBook::where("book_id", $id)
            ->where("school", auth()->user()->school)
            ->where("returned", false)
            ->first();
            if($borrowedBook == null) {
                return true;
            }
        }
        return false;
    }

    public static function listAuthorsAndTitles() {
        $allBooks = Book::where("school", auth()->user()->school)->get();

        $titles = array();
        $authors = array();

        foreach($allBooks as $book) {
            if(in_array($book->title, $titles)) {
                continue;
            }
            if(in_array($book->author, $authors)) {
                continue;
            }
            array_push($titles, $book->title);
            array_push($authors, $book->author);
        }

        asort($titles);
        asort($authors);

        $response = new \stdClass();
        $response->titles = $titles;
        $response->authors = $authors;

        return $response;
    }

    public function navigateToAddBooks() {
        $data = self::listAuthorsAndTitles();

        return view('library.addbooks', ['titles' => $data->titles, 'authors' => $data->authors]);
    }

    public function navigateToLateList() {
        $lateList = BorrowedBook::where("returned", false)
        ->where("school", auth()->user()->school)
        ->where("need_to_return", "<", Date("Y-m-d"))
        ->get();

        $students = array();
        $teachers = array();
        $staff = array();

        foreach($lateList as $late) {
            $lateData = new \stdClass();
            $book = Book::where("book_id", $late->book_id)
            ->where("school", auth()->user()->school)
            ->first();
            $person = null;
            $array = null;
            if($late->role == "student") {
                $person = StudentController::getStudent($late->holder_id, auth()->user()->school);
                $array = &$students;
            } else if($late->role == "teacher") {
                $person = TeacherController::getTeacher($late->holder_id, auth()->user()->school);
                $array = &$teachers;

            } else if($late->role == "staff") {
                $person = Staff::where("nic", $late->holder_id)->first();
                $array = &$staff;
            }

            $lateData->book_title = $book->title;
            $lateData->name = $person->full_name;
            $lateData->book_id = $late->book_id;
            $lateData->end_date = $late->need_to_return;

            array_push($array, $lateData);
        }

        return view('library.lateList', [
            'students' => $students,
            'teachers' => $teachers,
            'staff' => $staff
        ]);
    }

    public function navigateToSearch() {
        $data = self::listAuthorsAndTitles();

        return view('library.search', ['titles' => $data->titles, 'authors' => $data->authors]);
    }

    public function navigateToDashboard()
    {
        $userSchool = auth()->user()->school;
    
        $allBooks = Book::where("school", $userSchool)->get();
        $unavailable = BorrowedBook::where("returned", false)
            ->where("school", $userSchool)
            ->get();
    
        $borrowed = BorrowedBook::where("school", $userSchool)->get();
    
        $available = $allBooks->count() - $unavailable->count();
    
        $titles = self::listAuthorsAndTitles()->titles;
    
        $bookCounts = $borrowed->groupBy('title')->map->count()->toArray();
        arsort($bookCounts);
        $topBooks = array_slice($bookCounts, 0, 10, true);
    
        $authors = Book::whereIn('title', $titles)
            ->where('school', $userSchool)
            ->pluck('author', 'title')
            ->toArray();
    
        return view('library.dashboard', [
            'available' => $available,
            'borrowed' => $borrowed->count(),
            'topBooks' => $topBooks,
            'authors' => $authors,
            'allBooks' => $allBooks->count(),
        ]);
    }
    
}
