<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DarkPan - Bootstrap 5 Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-light" style="width: 3rem; height: 3rem; " role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3 nscroll bg-secondary" style="border-right: black 2px solid; border-top-right-radius: 8px; border-bottom-right-radius: 8px;">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="dashboard.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary text-center hide-text">Sri Dharmaloka</h3>
                    <h3 class="text-primary text-center hide-text">Collage</h3>
                </a>

                <div class="d-flex align-items-center ms-4 mb-4 flex-column">
                    <div class="d-flex align-items-center justify-content-center w-100">
                        <img src="img/badge.png" class="schoolBadge"  style="height: 190px;">
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="teacherDashboard.html" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="markAttendance.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Mark Attendance</a>
                    <a href="addMarks.html" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Add Marks</a>
                    <a href="teacherTimeTable.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Time Table</a>
                    <a href="searchStudent.html" class="nav-item nav-link active"><i class="bi bi-search me-2"></i>Search Student</a>
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
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0 text-dark">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0 text-dark">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0 text-dark">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0 text-dark">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0 text-dark">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0 text-dark">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="d-none d-lg-inline-flex"><?php echo $_SESSION['initialName']; ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="profile-student.php" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item" onclick="logOut();">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="row g-2">
                        
                        <div class="col-md-6 col-12">
                            <div class="form-floating">
                                <input class="form-control bg-secondary text-dark" id="searchIndex" type="text"
                                    placeholder="Index Number">
                                <label for="floatingSelectGrid">Search by index number</label>
                            </div>
                        </div>
    
                        <div class="col-md">
                            <div class="form-floating">
                                <input class="form-control bg-secondary text-dark" id="typing" type="text"
                                    placeholder="Index Number" data-index="" onkeyup="studentLiveSearch();">
                                <label for="floatingSelectGrid">Search by name</label>
                                <div class="list-group" style="position: absolute; width: 100%; z-index: 100000;"
                                    id="item-container">
                                    <!-- suggestions append to here -->
    
                                </div>
                            </div>
                        </div>
    
                        <div class="d-grid">
                            <button class="btn btn-primary" onclick="searchStudent();">Search</button>
                        </div>

                    </div>
                   
                </div>
            </div>
            <!-- Sale & Revenue End -->

            <!-- Profile Start -->
            <div class="container-fluid pt-4 px-4">
                <h4 class="fw-bold py-3 mb-4"><span class="text-dark fw-light">Student profile</span></h4>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"></div>

                <div class="row">
                    <div class="col-md-12">
                        

                        <div class="card mb-4">
                            <h5 class="card-header text-dark">Student Details</h5>
                            <!-- Account -->
                            <div class="card-body">
                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS6ZWr_9VvengJe1hQ903aoAToFqnuMijQVww&usqp=CAU"
                                        alt="user-avatar" height="100" width="100" />
                                    <div class="button-wrapper">
                                        
                    
                                    </div>
                                </div>
                            </div>
                            <hr class="my-0" />
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="Namewithinitials" class="form-label ">Name with initials</label>
                                        <input class="form-control bg-secondary text-dark "disabled type="text" name="Namewithinitials"
                                            id="Namewithinitials" value="S.L.D.John Doe" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Indexnumber" class="form-label">Index number</label>
                                        <input disabled class="form-control  bg-secondary text-dark" type="text" id="studentIndexNumber" name="Indexnumber"
                                            value="23059" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Encrollclass" class="form-label">Current Grade</label>
                                        <input disabled id="currentGrade" class="form-control  bg-secondary text-dark" name="Encrollclass"
                                            value="6" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Encrollclass" class="form-label">Current Class</label>
                                        <input disabled id="currentClass" class="form-control  bg-secondary text-dark" name="Encrollclass"
                                            value="F" />
                                    </div>
                                 </div>
                                <div class="mt-2">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                      Add Student
                                    </button>
                                </div>
                            </div>
                            <!-- /Account -->
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- Profile End -->

            
            <div class="container-fluid pt-4 px-4 footerGroup">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            Designed By <a href="https://eversoft.cf">EverSoft IT Solutions</a>
                            <br>
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

    <!-- Template Javascript -->
    <script src="js/multiple.js"></script>

    <script>
        function studentSearch(){
            const index = document.getElementById("searchIndex");
            const name = document.getElementById("typing");

            if (index.value.trim() == '' && name.value.trim() == '' || index.value.trim() != '' && name.value.trim() != '') {
            Swal.fire({
                icon: 'warning',
                title: 'WARNING',
                text: 'You must fill in one text field at a time'
            });
           }else{
            var studentIndex;
            if (name.value.trim() != "") {
                studentIndex = name.dataset.index;
            } else {
                studentIndex = index.value;
            }

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.status == "error") {
                        Swal.fire({
                            icon: 'warning',
                            title: 'WARNING',
                            text: 'Invalid Index Number'
                        });
                    } else if (response.status == "permission") {
                        Swal.fire({
                            icon: 'error',
                            title: 'ERROR',
                            text: 'Permission Denied'
                        });
                    } else {
                        document.getElementById("initialName").value = response.student["initial_name"];
                        document.getElementById("studentIndexNumber").value = response.student["index_number"];
                        document.getElementById("currentClass").value = response.student["current_class"];
                        document.getElementById("currentGrade").value = response.student["current_grade"];
                       
                    }
                }
            }

            xhr.open("GET", "process/searchStudent.php?index=" + studentIndex + "", true);
            xhr.send();
        }
        }
    </script>
</body>

</html>