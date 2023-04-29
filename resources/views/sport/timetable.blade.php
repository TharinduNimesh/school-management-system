<?php

session_start();
if(!isset($_SESSION["libAdminNic"])) {
  header("location: library.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Library - Sri Dharmaloka College</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="keywords" />
  <meta content="" name="description" />

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon" />

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
    rel="stylesheet" />

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

  <!-- Libraries Stylesheet -->
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
  <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet" />

  <!-- Template Stylesheet -->
  <link href="css/style.css" rel="stylesheet" />
</head>

<body onload="listAuthors(); listTitles();">
  <div class="container-fluid position-relative d-flex p-0">
    <!-- Spinner Start -->
    <div id="spinner"
      class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
      <div class="spinner-border text-secondary" style="width: 3rem; height: 3rem" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
    <!-- Spinner End -->

    <!-- Sidebar Start -->
    <div class="sidebar pe-4 pb-3 nscroll bg-secondary" style="
          border-right: black 2px solid;
          border-top-right-radius: 8px;
          border-bottom-right-radius: 8px;
        ">
      <nav class="navbar bg-secondary navbar-dark">
        <a href="libDashboard.php" class="navbar-brand mx-4 mb-3">
          <h3 class="text-primary text-center hide-text">Sri Dharmaloka</h3>
          <h3 class="text-primary text-center hide-text">College</h3>
        </a>

        <div class="d-flex align-items-center ms-4 mb-4 flex-column">
          <div class="d-flex align-items-center justify-content-center w-100">
            <img src="img/badge.png" class="schoolBadge" style="height: 190px" />
          </div>
        </div>
        <div class="navbar-nav w-100">
          <a href="libDashboard.php" class="nav-item nav-link"><i
              class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
          <a href="addBook.php" class="nav-item nav-link active"><i
              class="bi bi-book-half me-2"></i>Add Books</a>
          <a href="libSearch.php" class="nav-item nav-link"><i class="bi bi-gear-wide-connected me-2"></i>Manage Books</a>
          <a href="borrowBook.php" class="nav-item nav-link"><i class="bi bi-collection me-2"></i>Borrow Books</a>
          <a href="lateList.php" class="nav-item nav-link"><i class="bi bi-card-list me-2"></i>Late List</a>
          
        </div>
      </nav>
    </div>
    <!-- Sidebar End -->

    <!-- Content Start -->
    <div class="content">
      <!-- Navbar Start -->
      <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
        <a href="dashboard.php" class="navbar-brand d-flex d-lg-none me-4">
          <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
        </a>
        <a href="#" class="sidebar-toggler flex-shrink-0">
          <i class="fa fa-bars"></i>
        </a>
        <div class="navbar-nav align-items-center ms-auto">
          <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
              <i class="fa fa-envelope me-lg-2"></i>
              <span class="d-none d-lg-inline-flex">Messages</span>
              <!-- copy -->
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
              <a href="#" class="dropdown-item">
                <div class="d-flex align-items-center">
                  <div class="ms-2">
                    <span class="fw-normal mb-0 text-dark">You Have No Any Messages</span>
                  </div>
                </div>
              </a>
              <hr class="dropdown-divider" />
            </div>
          </div>
          <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
              <i class="fa fa-bell me-lg-2"></i>
              <span class="d-none d-lg-inline-flex">Notifications</span>
              <!-- copy -->
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
              <a href="#" class="dropdown-item">
                <span class="fw-normal mb-0 text-dark">You have no Any Notifications</span>
              </a>
              <hr class="dropdown-divider" />
            </div>
          </div>
          <button class="btn btn-outline-primary ms-5" onclick="logOut();">
            LogOut
          </button>
        </div>
      </nav>
      <!-- Navbar End -->
            <!-- Navbar End -->


            <!-- Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded h-100 p-3">
                    <h3 class="mb-4 text-dark">Coach Add Sport Timetable</h3>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control bg-secondary text-dark" id="bookId"
                            placeholder="name@example.com">
                        <label for="floatingInput">Coach's Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control bg-secondary text-dark" id="bookId"
                            placeholder="name@example.com">
                        <label for="floatingInput">Coach's NIC</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control bg-secondary text-dark" id="bookId"
                            placeholder="name@example.com">
                        <label for="floatingInput">Sport Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control bg-secondary text-dark" id="bookId"
                            placeholder="name@example.com">
                        <label for="floatingInput">Venue</label>
                    </div>
                 
                    
                    <select class="form-control bg-secondary text-dark" aria-label="Select day of the week">
                        <option selected>"Click here" to select day of the week</option>
                        <option value="Sunday">Sunday</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                      </select>
                      <br>
                      <label for="start-time">Start Time:</label><input type="time" id="start-time" name="start-time" value="00:00" min="08:00" max="17:00"><label for="end-time">End Time:</label><input type="time" id="end-time" name="end-time" value="00:00" min="00:00" max="24:00">
                      <br><br>
                      <h5 class=" text-dark">More Information</h5>
                    <div class="form-floating">
                        <textarea class="form-control bg-secondary text-dark" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Type here...</label>
                      </div> 
                   <br>
                   
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-primary" type="button" onclick="addNewBook();">Submit</button>
                    </div>
                </div>
            </div>
            <!-- End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            Designed By <a href="https://eversoft.cf">Eversoft IT Solutions</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
        function addNewTitle() {
            var newTitle = document.getElementById("newTitle").value;
            if (newTitle.trim() == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: "It's Look Like You Aren't Fill Text Field"
                });
            }
            else {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4) {
                        if (xhr.status == 200) {
                            // handle response
                            var response = xhr.responseText;
                            if (response == 'success') {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'New Title Added',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                listTitles();
                            }
                            else {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Oops...',
                                    text: "It's Look Like Title Already exist.",
                                    footer: "Please Refresh And Try Again"
                                });
                            }
                        }
                        else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: "Internel Server Error",
                                footer: "<a href='http://wa.me/94701189971'>Contact Developers Here</a>"
                            });
                        }
                    }
                };

                xhr.open("GET", "process/addNewTitle.php?title=" + newTitle + "", true);
                xhr.send();
            }
        }

        function listTitles() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "process/listTitles.php", false);
            xhr.send();

            var response = JSON.parse(xhr.responseText);
            if (response[0].status == 'success') {
                document.getElementById("selectTitles").innerHTML = "<option selected value='0'>Select A Title</option>";
                for (var i = 0; i < response.length; i++) {
                    var option = document.createElement("option");
                    option.innerHTML = response[i].title;
                    option.value = response[i].id;
                    document.getElementById("selectTitles").appendChild(option);
                }
            }
        }

        function addNewAuthor() {
            var newAuthor = document.getElementById("newAuthor").value;
            if (newAuthor.trim() == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: "It's Look Like You Aren't Fill Text Field"
                });
            }
            else {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4) {
                        if (xhr.status == 200) {
                            // handle response
                            var response = xhr.responseText;
                            if (response == 'success') {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'New Author Added',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                listAuthors();
                            }
                            else {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Oops...',
                                    text: "It's Look Like Title Already exist.",
                                    footer: "Please Refresh And Try Again"
                                });
                            }
                        }
                        else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: "Internel Server Error",
                                footer: "<a href='http://wa.me/94701189971'>Contact Developers Here</a>"
                            });
                        }
                    }
                };

                xhr.open("GET", "process/addNewAuthor.php?author=" + newAuthor + "", true);
                xhr.send();
            }
        }

        function listAuthors() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "process/listAuthors.php", false);
            xhr.send();

            var response = JSON.parse(xhr.responseText);
            if (response[0].status == 'success') {
                document.getElementById("selectAuthors").innerHTML = "<option selected value='0'>Select A Author</option>";
                for (var i = 0; i < response.length; i++) {
                    var option = document.createElement("option");
                    option.innerHTML = response[i].title;
                    option.value = response[i].id;
                    document.getElementById("selectAuthors").appendChild(option);
                }
            }
        }

        function addNewBook() {
            var id = document.getElementById("bookId").value;
            var title = document.getElementById("selectTitles").value;
            var author = document.getElementById("selectAuthors").value;
            var regex = /^[0-9]+$/;

            if (regex.test(id) == '' || title == '0' || author == '0') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: "It's Look Like You Haven't Fill All Text Fields.",
                });
            }
            else {
                var xhr = new XMLHttpRequest();
                var form = new FormData();
                form.append("id", id);
                form.append("title", title);
                form.append("author", author);

                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var response = xhr.responseText;
                        if (response == 'success') {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'New Book Added',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                        else {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Oops...',
                                text: "It's Look Like A book Already Exist With That Id",
                            });
                        }
                    }
                }

                xhr.open("POST", "process/addNewBooks.php", true);
                xhr.send(form);
            }
        }

    </script>
</body>

</html>