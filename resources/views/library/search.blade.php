<!DOCTYPE html>
<html lang="en">

<head>
    @include('library.components.head')

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
                  <th>Borrowing count</th>
                  <th>Status</th>
                  <th>Holder Info</th>
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
            // handle response 
            var response = JSON.parse(xhr.responseText);
            var tbody = document.getElementById("tBody");
            if (response.status == 'error') {
              tbody.innerHTML = '';
              var row = document.createElement("tr");
              var col = document.createElement("th");
              col.colSpan = 7;
              col.innerHTML = 'There are no books with this ID'
              col.style.color = "red";
              col.style.backgroundColor = "orange";
              row.appendChild(col);
              tbody.appendChild(row)
            }
            else if (response.status == 'success') {
              tbody.innerHTML = '';
              var colNames = ["id", "name", "copies", "author", "count", "st"];
              var row = document.createElement("tr");
              for (let i = 0; i < 7; i++) {
                var col = document.createElement("th");
                var cName = colNames[i];
                if (cName == 'copies') {
                  col.innerHTML = response.copies;
                  row.appendChild(col);
                  continue;
                }
                if (i == 6) {
                  col.innerHTML = response.late;
                  if (response.late != 'none') {
                    col.style.cursor = "pointer";
                    col.setAttribute("data-bs-toggle", "modal");
                    col.setAttribute("data-bs-target", "#exampleModal");
                    col.id = "holder" + response.borrowId;
                    document.getElementById("updateBTN").setAttribute("data-borrow-id", response.borrowId);
                    document.getElementById("updateBTN").setAttribute("data-borrow-person", response.borrowPerson);
                    document.getElementById("updateBTN").setAttribute("data-book-id", response.bookId);
                  }
                  if (response.lateStatus == 'Yes') {
                    col.style.backgroundColor = "red";
                    col.style.color = "white";
                  }
                  row.appendChild(col);
                  continue;
                }
                if (cName == 'st') {
                  if (response.book[cName] == '0') {
                    col.innerHTML = 'Not Available';
                  }
                  else {
                    col.innerHTML = 'Available';
                  }
                }
                else {
                  col.innerHTML = response.book[cName];
                }
                row.appendChild(col);
              }
              tbody.appendChild(row);
            }
          }
        }

        xhr.open("GET", "process/bookById.php?id=" + bookId + "", true);
        xhr.send();
      }
    }

    function updateStatus(Button) {
      let borrowId = Button.dataset.borrowId;
      let borrowPerson = Button.dataset.borrowPerson;
      let bookId = Button.dataset.bookId;

      var xhr = new XMLHttpRequest();
      var form = new FormData();
      form.append("id", borrowId);
      form.append("person", borrowPerson);
      form.append("bookId", bookId);

      xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
          // handle response 
          var response = xhr.responseText;
          if (response == "success") {
            Swal.fire({
              position: 'top-end',
              icon: 'success',
              title: 'Book Status Changed',
              showConfirmButton: false,
              timer: 1500
            });
            document.getElementById("holder" + borrowId).innerHTML = "none";
          }
        }
      }

      xhr.open("POST", "process/updateStatus.php", true);
      xhr.send(form);
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