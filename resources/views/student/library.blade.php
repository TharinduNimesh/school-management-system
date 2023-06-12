<!DOCTYPE html>
<html lang="en">

<head>
    @include('student.components.head')
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        @include('public_components.spinner')
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        @include('student.components.hamburger')
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('student.components.navbar')
            <!-- Navbar End -->


            <!-- Book Title Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="col-sm-12 col-xl-12">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h3 class="mb-4 text-dark">Search By Book Title</h3>
                        <div class="row g-2">
                            <div class="mb-3 col-md-6">
                                <div class="input-group mb-3 mt-3">
                                    <select class="form-select text-dark bg-secondary" id="inputGroupSelect01">
                                        <option selected> Select a Title </option>
                                        <option value="1">A</option>
                                        <option value="2">B</option>
                                        <option value="3">C</option>
                                        <option value="3">D</option>
                                        <option value="3">E</option>
                                        <option value="3">F</option>
                                        <option value="3">G</option>
                                        <option value="3">H</option>
                                    </select>
                                </div>
                                <div class="mt-2">
                                    <button type="button" class="btn btn-primary" id="searchBtn"
                                        onclick="gradeTenRequest();">
                                        Request
                                    </button>
                                </div>
                                <table class="table table-dark table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Author </th>
                                            <th scope="col">Status </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Book Title End -->

            
            <!-- Profile Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <!-- Account search start-->
                            <hr class="my-0" />
                            <div class="card-body">
                                <h5 class="card-header text-dark">Search By Book Title</h5>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <div class="input-group mb-3 mt-3">

                                            <select class="form-select text-dark bg-secondary" id="inputGroupSelect01">
                                                <option selected> Select a Title </option>
                                                <option value="1">A</option>
                                                <option value="2">B</option>
                                                <option value="3">C</option>
                                                <option value="3">D</option>
                                                <option value="3">E</option>
                                                <option value="3">F</option>
                                                <option value="3">G</option>
                                                <option value="3">H</option>
                                            </select>
                                        </div>
                                        <div class="mt-2">
                                            <button type="button" class="btn btn-primary" id="searchBtn"
                                                onclick="gradeTenRequest();">
                                                Request
                                            </button>
                                        </div>

                                    </div>


                                </div>
                                <table class="table table-dark table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Author </th>
                                            <th scope="col">Status </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                            <!-- /Account search end -->
                        </div>

                        <div class="card mb-4">
                            <h5 class="card-header text-dark">Search By Author</h5>
                            <!-- search result start-->
                            <div class="card mb-4">
                                <!-- Account search start-->
                                <hr class="my-0" />
                                <div class="card-body">
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <div class="input-group mb-3 mt-3">

                                                <select class="form-select text-dark bg-secondary"
                                                    id="inputGroupSelect01">
                                                    <option selected> Select By Author </option>
                                                    <option value="1">A</option>
                                                    <option value="2">B</option>
                                                    <option value="3">C</option>
                                                    <option value="3">D</option>
                                                    <option value="3">E</option>
                                                    <option value="3">F</option>
                                                    <option value="3">G</option>
                                                    <option value="3">H</option>
                                                </select>
                                            </div>
                                            <div class="mt-2">
                                                <button type="button" class="btn btn-primary" id="searchBtn"
                                                    onclick="gradeTenRequest();">
                                                    Request
                                                </button>
                                            </div>

                                        </div>


                                    </div>
                                    <table class="table table-dark table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Name </th>
                                                <th scope="col">Status </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                                <!-- /Account search end -->
                            </div>
                            <!-- /search result end -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Profile End -->


            <!-- Footer End -->
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