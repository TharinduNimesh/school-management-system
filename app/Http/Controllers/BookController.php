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
        $book = Book::where("book_id", $request->id)->first();
        if($book == null) {
            $book = new Book();
            $book->book_id = $request->id;
            $book->title = $request->title;
            $book->author = $request->author;
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
        $book = book::where("book_id", $request->bookId)->first();
        $person = null;
        if($request->role == "student") {
            $person = Student::where("index_number", $request->index)->first();
        } else if($request->role == "teacher") {
            $person = Teacher::where("nic", $request->index)->first();
        } else if($request->role == "nonacademic") {
            $person = Staff::where("nic", $request->index)->first();
        }
        if($person != null) {
            if($book != null) {
                if(self::isAvailable($request->bookId)) {
                    $holder = BorrowedBook::where("holder_id", $request->index)
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
        $book = Book::where("book_id", $id)->first();
        if($book != null) {
            $borrowedBook = BorrowedBook::where("title", $book->title)
            ->get();
            $copies = Book::where("title", $book->title)
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
                ->where("returned", false)
                ->first();
                $holder = null;
                $response->borrowed_id = $getHolder->_id;
                $response->holder = $getHolder->holder_id;
                $response->role = $getHolder->role;

                if($getHolder->role == "student") {
                    $holder = Student::where("index_number", $getHolder->holder_id)->first();
                } else if($getHolder->role == "teacher") {
                    $holder = Teacher::where("nic", $getHolder->holder_id)->first();
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
        ->distinct("title")
        ->get();

        $response = new \stdClass();
        $response->books = $list;
        $response->count = count($count);
        
        return $response;
    }

    public function searchByTitle($title) {
        $books = Book::where("title", $title)
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
        ->get();

        $response = new \stdClass();
        $response->books = $list;
        $response->count = count($count);
        
        return $response;
    }

    public static function isAvailable($id) {
        $book = Book::where("book_id", $id)->first();
        if($book != null) {
            $borrowedBook = BorrowedBook::where("book_id", $id)
            ->where("returned", false)
            ->first();
            if($borrowedBook == null) {
                return true;
            }
        }
        return false;
    }

    public static function listAuthorsAndTitles() {
        $allBooks = Book::all();

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
        ->where("need_to_return", "<", Date("Y-m-d"))
        ->get();

        $students = array();
        $teachers = array();
        $staff = array();

        foreach($lateList as $late) {
            $lateData = new \stdClass();
            $book = Book::where("book_id", $late->book_id)->first();
            $person = null;
            if($late->role == "student") {
                $person = Student::where("index_number", $late->holder_id)->first();
                $array = $students;
            } else if($late->role == "teacher") {
                $person = Teacher::where("nic", $late->holder_id)->first();
                $array = $teachers;

            } else if($late->role == "staff") {
                $person = Staff::where("nic", $late->holder_id)->first();
                $array = $staff;
            }

            $book = Book::where("book_id", $late->book_id)->first();
            $lateData->book_name = $book->title;
            $lateData->name = $person->full_name;
            $lateData->book_id = $late->book_id;
            $lateData->end_date = $late->need_to_return;

            array_push($lateListData, $array);
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

    public function navigateToDashboard() {
        $allBooks = Book::all();
        $unavailable = BorrowedBook::where("returned", false)->get();
        $available = count($allBooks) - count($unavailable);
        $titles = self::listAuthorsAndTitles()->titles;

        $authors = array();
        $count = array();
        foreach ($titles as $title) {
            $count[$title] = 0;
            $author = $allBooks->where('title', $title)->first();
            $authors[$title] = $author->author;
        }

        $borrowed = BorrowedBook::all();

        foreach ($borrowed as $book) {
            if(count($count) >= 10) {
                break;
            } 
            $count[$book->title] += 1;
        }
        arsort($count);

        return view('library.dashboard', [
            'available' => $available,
            'all' => count($allBooks),
            'books' => $count,
            'authors' => $authors
        ]);
    }
}
