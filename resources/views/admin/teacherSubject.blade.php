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


            <!--Button Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h3 class="text-dark">Search Teacher</h3>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control bg-secondary text-dark"
                                    placeholder="Search By NIC" aria-label="Recipient's username"
                                    aria-describedby="button-addon2" id="bookId">
                                <button class="btn btn-primary" type="button" id="button-addon2"
                                    onclick="searchById();">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Button End -->


            <!--Teacher Details start-->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <div class="row">

                        <h5 class="card-header text-dark">Teacher Details</h5>
                        <hr>
                        <div class="mb-3 col-md-6">
                            <label for="Name" class="form-label">Name</label>
                            <input class="form-control bg-secondary text-dark" type="text" id="name" name="Name"
                                value="" autofocus disabled />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="Grade" class="form-label">Contact No</label>
                            <input class="form-control bg-secondary text-dark" type="text" id="mobile" name="Grade"
                                value="" autofocus disabled />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="basketsubject" class="form-label">Appointed Subject</label>
                            <input class="form-control bg-secondary text-dark" type="text" id="nic" name="basketsubject"
                                value="" autofocus disabled />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="basket subject" class="form-label">Email</label>
                            <input class="form-control bg-secondary text-dark" type="text" id="email"
                                name="basket subject" value="" autofocus disabled />
                        </div>
                        <div class="mb-3 col-12">
                            <label for="basket subject" class="form-label">Qualification</label>
                            <textarea class="form-control bg-secondary text-dark" id="exampleFormControlTextarea1"
                                rows="1" disabled></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <!--Teacher Details end-->


            <!-- Table start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h3 class="mb-0 text-dark">List Subject</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="col">01</th>
                                    <th scope="col">science</th>
                                    <th scope="col"><button type="button" class="btn btn-primary btn-sm">Remove</button>
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Table end -->


            <!-- Add subject start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded p-4">
                    <h3 class="text-dark">Add Subject</h3>
                    <select class="form-select bg-secondary mb-5" aria-label="Select">
                        <option selected>Open this select menu</option>
                        <option value="1">Sinhala</option>
                        <option value="2">Maths</option>
                        <option value="3">History</option>
                    </select>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Grade</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="col">Grade 01</th>
                                    <th scope="col"><input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col">Grade 02</th>
                                    <th scope="col"><input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col">Grade 03</th>
                                    <th scope="col"><input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col">Grade 04</th>
                                    <th scope="col"><input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col">Grade 05</th>
                                    <th scope="col"><input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col">Grade 06</th>
                                    <th scope="col"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col">Grade 07</th>
                                    <th scope="col"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col">Grade 08</th>
                                    <th scope="col"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col">Grade 09</th>
                                    <th scope="col"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col">Grade 10</th>
                                    <th scope="col"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col">Grade 11</th>
                                    <th scope="col"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col">Grade 12</th>
                                    <th scope="col"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col">Grade 13</th>
                                    <th scope="col"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="button" class="btn btn-primary mt-4 col-12">Submit</button>
                </div>
            </div>
            <!-- Add subject end -->


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
        function searchTeacher() {
            var nic = document.getElementById('teacherNIC');

            if (nic.value.trim() == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'WARNING',
                    text: 'Please Fill The NIC Number'
                })
                document.getElementById('name').value = "";
                document.getElementById('nic').value = "";
                document.getElementById('mobile').value = "";
                document.getElementById('email').value = "";
            }
            else {
                var form = new FormData();
                form.append("nic", nic.value);

                var req = new XMLHttpRequest();

                req.onreadystatechange = function () {
                    if (req.readyState == 4) {
                        if (req.status == 200) {
                            var response = req.responseText;
                            if (response == "Invalid") {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'WARNING',
                                    text: 'Invalid NIC Number'
                                })
                                document.getElementById('name').value = "";
                                document.getElementById('nic').value = "";
                                document.getElementById('mobile').value = "";
                                document.getElementById('email').value = "";
                            }
                            else {
                                response = JSON.parse(response);
                                document.getElementById('name').value = response.teacher.full_name;
                                document.getElementById('nic').value = response.teacher.nic;
                                document.getElementById('mobile').value = "0" + response.teacher.contact_number;
                                document.getElementById('email').value = response.teacher.email;
                                document.getElementById("subjectList").value = response.subject;
                            }
                        }
                        else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: "Internel Server Error",
                                footer: "<a href='http://wa.me/94701189971'>Contact Developers Here</a>"
                            });
                            document.getElementById('name').value = "";
                            document.getElementById('nic').value = "";
                            document.getElementById('mobile').value = "";
                            document.getElementById('email').value = "";
                        }
                    }
                }

                req.open("POST", "process/searchTeacher.php", true);
                req.send(form);
            }
        }


        function saveSubject() {
            var nic = document.getElementById('teacherNIC');

            if (nic.value.trim() == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'WARNING',
                    text: 'Please Fill The NIC Number'
                })
            }
            else {
                var nic = nic.value;
                var selectedSubjects = [];
                var checkboxes = document.getElementsByName("subjects[]");
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].checked) {
                        selectedSubjects.push(checkboxes[i].value);
                    }
                }

                var form = new FormData();
                form.append("nic", nic);
                form.append("selectedSubjects", JSON.stringify(selectedSubjects));
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        console.log(this.responseText);
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Subjects Added Successfully',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                };
                xhttp.open("POST", "process/saveSubject.php", true);
                xhttp.send(form);

            }
        }
    </script>
</body>

</html>