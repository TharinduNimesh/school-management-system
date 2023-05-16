<!DOCTYPE html>
<html lang="en">

<head>
    @include('library.components.head')
    <style>
      .space {
        white-space: nowrap;
      }
    </style>
</head>

<body>
  <div class="container-fluid position-relative d-flex p-0">
    @include('public_components.spinner')

    @include('library.components.hamburger')

    <!-- Content Start -->
    <div class="content">
        @include('library.components.navbar')

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Update Status</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Are you sure you want to update the status of this book? This action will mark the book as "returned" and
              make it available for other clients to borrow. Please ensure that the book has been properly checked for
              any damages or missing pages before updating the status.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn" style="background: #4564ff; color: white;" data-bs-dismiss="modal"
                id="updateBTN" onclick="updateStatus(this);">Save changes</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Sale & Revenue Start -->
      <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded-top p-4">
          <h3 class="text-dark">Manage Books</h3>
          <div class="input-group mb-3">
            <input type="text" class="form-control bg-secondary text-dark" placeholder="Search By ID"
              aria-label="Recipient's username" aria-describedby="button-addon2" id="bookId">
            <button class="btn btn-primary" type="button" id="button-addon2" onclick="searchById();">Search</button>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead class="table-dark">
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Copies</th>
                  <th>Author</th>
                  <th class="space">Borrowing count</th>
                  <th>Status</th>
                  <th class="space">Holder Info</th>
                </tr>
              </thead>
              <tbody id="tBody">
                <th style="color: red; background: orange;" colspan='7'>Search a book first</th>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Sale & Revenue End -->

      <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded-top p-4">
          <h3 class="text-dark">Search By Author</h3>
          <div class="input-group mb-3">
            <select class="form-select bg-secondary text-dark" id="author"
              aria-label="Example select with button addon">
              <option value="0">Select an author</option>
              @foreach ($authors as $author)
                <option>{{ $author }}</option>
              @endforeach
            </select>
            <button class="btn btn-primary" type="button" onclick="bookByAuthor();">Search</button>
          </div>
          <h6 class="text-dark">Books : <span id="booksCount">None</span> </h6>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead class="table-dark">
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody id="tBody2">
                <th style="color: red; background: orange;" colspan="3">Select a Author First</th>
              </tbody>
            </table>
          </div>
        </div>
      </div>


      <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded-top p-4">
          <h3 class="text-dark">Search By Book Title</h3>
          <div class="input-group mb-3">
            <select class="form-select bg-secondary text-dark" id="title" aria-label="Example select with button addon">
              <option value="0">Select a title</option>
              @foreach ($titles as $title)
                <option>{{ $title }}</option>
              @endforeach
            </select>
            <button class="btn btn-primary" type="button" onclick="bookByTitle();">Search</button>
          </div>
          <h6 class="text-dark">Copies : <span id="copiesCount">None</span> </h6>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead class="table-dark">
                <tr>
                  <th>ID</th>
                  <th>Author</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody id="tBody3">
                <th style="color: red; background: orange;" colspan="3">Select a Title First</th>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      @include('public_components.footer')
    </div>
    <!-- Content End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
  </div>

  <!-- JavaScript Libraries -->
  @include('public_components.js')
  <script>
    hamburger("search")
    function searchById() {
      let bookId = document.getElementById("bookId").value;

      const regex = /^[0-9]+$/;

      if (!regex.test(bookId)) {
        Swal.fire({
          icon: 'warning',
          title: 'WARNING',
          text: "Please Enter A Book ID First",
        });

        document.getElementById("tBody").innerHTML = '<th style="color: red; background: orange;" colspan="7">Search a book first</th>';
      }
      else {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
          if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            if (response == "invalid") {
              document.getElementById("tBody").innerHTML = '<th style="color: red; background: orange;" colspan="7">Book Not Found</th>';
            }
            else {
              try {
                response = JSON.parse(response);
                var row = document.createElement("tr");
                var id = document.createElement("td");
                var name = document.createElement("td");
                var copies = document.createElement("td");
                var author = document.createElement("td");
                var borrowCount = document.createElement("td");
                var status = document.createElement("td");
                var holder = document.createElement("td");

                id.innerHTML = response.id;
                name.innerHTML = response.title;
                copies.innerHTML = response.copies;
                author.innerHTML = response.author;
                author.classList.add("space");
                borrowCount.innerHTML = response.borrowingCount;
                if(response.available) {
                  status.innerHTML = "Available";
                } else {
                  status.innerHTML = "Unavailable";
                  status.style.backgroundColor = "red";
                  status.style.color = "white";
                  holder.innerHTML = response.holder_name + " - " + response.role;
                  holder.classList.add("space");
                  holder.dataset.id = response.borrowed_id;
                  if(response.late) {
                    holder.style.backgroundColor = "red";
                    holder.style.color = "white";
                  } else {
                    holder.style.backgroundColor = "green";
                    holder.style.color = "white";
                  }
                  holder.style.cursor = "pointer";
                  holder.onclick = function() {
                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function() {
                      if(xhr.readyState == 4 && xhr.status == 200) {
                        // sweet alert is response success
                        if(xhr.responseText == "success") {
                          Swal.fire({
                            icon: 'success',
                            title: 'SUCCESS',
                            text: "Book Returned Successfully",
                          });
                          searchById();
                        } else if(xhr.response == "invalid") {
                          Swal.fire({
                            icon: 'error',
                            title: 'ERROR',
                            text: "It seems like the book is already returned",
                          });
                        } else {
                          Swal.fire({
                            icon: 'error',
                            title: 'ERROR',
                            text: xhr.responseText,
                          });
                        }
                      }
                    }

                    xhr.open("GET", "{{ route('return.book', [':id']) }}".replace(':id', event.target.dataset.id), true);
                    xhr.send();
                  }
                }

                row.appendChild(id);
                row.appendChild(name);
                row.appendChild(copies);
                row.appendChild(author);
                row.appendChild(borrowCount);
                row.appendChild(status);
                row.appendChild(holder);

                document.getElementById("tBody").innerHTML = "";
                document.getElementById("tBody").appendChild(row);


              } catch (error) {
                Swal.fire({
                  icon: 'error',
                  title: 'ERROR',
                  text: "Something Went Wrong",
                });
              }
            }
          }
        }

        xhr.open("GET", "{{ route('search.book', [':id']) }}".replace(':id', bookId), true);
        xhr.send();
      }
    }

    function bookByAuthor() {
      var author = document.getElementById("author").value;

      if (author == "0") {
        Swal.fire({
          icon: 'warning',
          title: 'WARNING',
          text: "Select A Author First",
        });
      }
      else {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
          if (xhr.readyState == 4 && xhr.status == 200) {
            // handle response
            var tBody2 = document.getElementById("tBody2");
            var response = JSON.parse(xhr.responseText);
            if (response[0].status == "error") {
              document.getElementById("booksCount").innerHTML = '0';
              tBody2.innerHTML = "<tr><th colspan='3' style='background: orange; color: red;'>This Author Hasn't Any Book</th></tr>";
            }
            else {
              var names = ["id", "title", "status"]
              tBody2.innerHTML = '';
              document.getElementById("booksCount").innerHTML = response.length;
              for (let i = 0; i < response.length; i++) {
                var row = document.createElement("tr");
                for (let a = 0; a < names.length; a++) {
                  var col = document.createElement("td");
                  if (a == 2) {
                    if (response[i].book["status"] == "1") {
                      col.innerHTML = "Available";
                    }
                    else {
                      col.innerHTML = "Not Available";
                    }
                  }
                  else {
                    col.innerHTML = response[i].book[names[a]];
                  }
                  row.appendChild(col);
                }
                tBody2.appendChild(row);
              }
            }
          }
        }

        xhr.open("GET", "process/bookByAuthor.php?id=" + author + "", true);
        xhr.send();
      }
    }

    function bookByTitle() {
      var title = document.getElementById("title").value;

      if (title == '0') {
        Swal.fire({
          icon: 'warning',
          title: 'WARNING',
          text: "Select A Title First",
        });
      }
      else {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
          if (xhr.readyState == 4 && xhr.status == 200) {
            // handle response
            var tBody3 = document.getElementById("tBody3");
            var response = JSON.parse(xhr.responseText);
            if (response[0].status == "error") {
              document.getElementById("copiesCount").innerHTML = '0';
              tBody3.innerHTML = "<tr><th colspan='3' style='background: orange; color: red;'>No Any Books Exists</th></tr>";
            }
            else {
              var names = ["id", "author", "status"]
              tBody3.innerHTML = '';
              document.getElementById("copiesCount").innerHTML = response.length;
              for (let i = 0; i < response.length; i++) {
                var row = document.createElement("tr");
                for (let a = 0; a < names.length; a++) {
                  var col = document.createElement("td");
                  if (a == 2) {
                    if (response[i].book["status"] == "1") {
                      col.innerHTML = "Available";
                    }
                    else {
                      col.innerHTML = "Not Available";
                    }
                  }
                  else {
                    col.innerHTML = response[i].book[names[a]];
                  }
                  row.appendChild(col);
                }
                tBody3.appendChild(row);
              }
            }
          }
        }

        xhr.open("GET", "process/bookByTitle.php?id=" + title + "", true);
        xhr.send();
      }
    }
  </script>
</body>

</html>