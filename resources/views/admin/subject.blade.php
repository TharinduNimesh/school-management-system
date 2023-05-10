<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.components.head')
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        @include('public_components.spinner')
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        @include('admin.components.sidebar')
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('admin.components.navbar')
            <!-- Navbar End -->


            <!-- Search Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded p-4">
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating">
                                <input class="form-control bg-secondary text-dark" id="floatingSelectGrid" type="text" placeholder="Grade">
                                <label for="floatingSelectGrid">Grade</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input class="form-control bg-secondary text-dark" id="floatingSelectGrid" type="text" placeholder="Class">
                                <label for="floatingSelectGrid">Class</label>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary col-12">Search<i
                                    class="bi bi-search ms-2"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Search End -->


            <!-- Summery Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded p-4">
                    <div class="row g-2">
                        <h3 class="text-dark">Summary</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Period</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="col">Maths</th>
                                        <th scope="col">08</th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Sinhala</th>
                                        <th scope="col">05</th>
                                    </tr>
                                    <tr>
                                        <th scope="col">History</th>
                                        <th scope="col">08</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Summery End -->


            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded p-4">
                    <div class="row g-2">
                        <h3 class="text-dark">Weekly report</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="5" class="text-center">Monday</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="col">Period</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Teacher</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    <tr>
                                        <th scope="row">Test</th>
                                        <th scope="row">Test</th>
                                        <th scope="row">Test</th>
                                        <th scope="row">Test</th>
                                        <th scope="row"><button type="button"
                                                class="btn btn-primary btn-sm">Reviews</button></th>
                                    </tr>
                                    <tr>
                                        <th scope="row">Test</th>
                                        <th scope="row">Test</th>
                                        <th scope="row">Test</th>
                                        <th scope="row">Test</th>
                                        <th scope="row"><button type="button"
                                                class="btn btn-primary btn-sm">Reviews</button></th>
                                    </tr>
                                    <tr>
                                        <th colspan="5" class="text-center">Monday</th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Period</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Teacher</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    <tr>
                                        <th scope="row">Test</th>
                                        <th scope="row">Test</th>
                                        <th scope="row">Test</th>
                                        <th scope="row">Test</th>
                                        <th scope="row"><button type="button"
                                                class="btn btn-primary btn-sm">Reviews</button></th>
                                    </tr>
                                    <tr>
                                        <th scope="row">Test</th>
                                        <th scope="row">Test</th>
                                        <th scope="row">Test</th>
                                        <th scope="row">Test</th>
                                        <th scope="row"><button type="button"
                                                class="btn btn-primary btn-sm">Reviews</button></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->


            <!-- Footer Start -->
            @include('public_components.footer')
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    @include('public_components.js')
    <!-- Template Javascript -->

    <script>
        function searchStudent() {
            const index = document.getElementById("searchByName");
            const name = document.getElementById("searchByIndex");

            if (index.value.trim() == '' && name.value.trim() == '' || index.value.trim() != '' && name.value.trim() != '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'WARNING',
                    text: 'You must fill in one text field at a time'
                });
            } else {
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
                            document.getElementById("NameResult").value = response.student["initial_name"];
                            document.getElementById("classGradeResult").value = response.student["current_grade" + "-" + "current_class"];

                        }
                    }
                }

                xhr.open("GET", "process/searchStudent.php?index=" + studentIndex + "", true);
                xhr.send();
            }
        }

        function addAward() {
            const awardName = document.getElementById("awardName");
            const awardYear = document.getElementById("awardYear");
            const WinningPlace = document.getElementById("WinningPlace");
            const discription = document.getElementById("discription");
        }
    </script>


</body>

</html>