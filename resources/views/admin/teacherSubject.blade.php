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
                                    aria-describedby="button-addon2" id="teacherId">
                                <button class="btn btn-primary" type="button" id="button-addon2"
                                    onclick="searchTeacher();">Search</button>
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
                            <input class="form-control bg-secondary text-dark" type="text" id="teacherName"
                                name="Name" value="" autofocus disabled />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="Grade" class="form-label">Contact No</label>
                            <input class="form-control bg-secondary text-dark" type="text" id="teacherContactNo"
                                name="Grade" value="" autofocus disabled />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="basketsubject" class="form-label">Appointed Subject</label>
                            <input class="form-control bg-secondary text-dark" type="text"
                                id="teacherAppointedSubject" name="basketsubject" value="" autofocus disabled />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="basket subject" class="form-label">Email</label>
                            <input class="form-control bg-secondary text-dark" type="text" id="teacherEmail"
                                name="basket subject" value="" autofocus disabled />
                        </div>
                        <div class="mb-3 col-12">
                            <label for="basket subject" class="form-label">Qualification</label>
                            <textarea class="form-control bg-secondary text-dark" id="teacherQualification" rows="1" disabled></textarea>
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
                                    <th scope="col"><button type="button"
                                            class="btn btn-primary btn-sm">Remove</button>
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
                                    <th scope="col"><input class="form-check-input" type="checkbox"
                                            id="flexSwitchCheckDefault">
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col">Grade 02</th>
                                    <th scope="col"><input class="form-check-input" type="checkbox"
                                            id="flexSwitchCheckDefault">
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col">Grade 03</th>
                                    <th scope="col"><input class="form-check-input" type="checkbox"
                                            id="flexSwitchCheckDefault">
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col">Grade 04</th>
                                    <th scope="col"><input class="form-check-input" type="checkbox"
                                            id="flexSwitchCheckDefault">
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col">Grade 05</th>
                                    <th scope="col"><input class="form-check-input" type="checkbox"
                                            id="flexSwitchCheckDefault">
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col">Grade 06</th>
                                    <th scope="col"><input class="form-check-input" type="checkbox"
                                            value="" id="flexCheckDefault">
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col">Grade 07</th>
                                    <th scope="col"><input class="form-check-input" type="checkbox"
                                            value="" id="flexCheckDefault">
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col">Grade 08</th>
                                    <th scope="col"><input class="form-check-input" type="checkbox"
                                            value="" id="flexCheckDefault">
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col">Grade 09</th>
                                    <th scope="col"><input class="form-check-input" type="checkbox"
                                            value="" id="flexCheckDefault">
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col">Grade 10</th>
                                    <th scope="col"><input class="form-check-input" type="checkbox"
                                            value="" id="flexCheckDefault">
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col">Grade 11</th>
                                    <th scope="col"><input class="form-check-input" type="checkbox"
                                            value="" id="flexCheckDefault">
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col">Grade 12</th>
                                    <th scope="col"><input class="form-check-input" type="checkbox"
                                            value="" id="flexCheckDefault">
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col">Grade 13</th>
                                    <th scope="col"><input class="form-check-input" type="checkbox"
                                            value="" id="flexCheckDefault">
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
        hamburger("teacherSubject");
        // function searchTeacher to send data to controller
        function searchTeacher() {
            document.getElementById("spinner").classList.add("show");
            var teacherId = document.getElementById("teacherId").value;
            var teacherName = document.getElementById("teacherName");
            var teacherEmail = document.getElementById("teacherEmail");
            var teacherContact = document.getElementById("teacherContactNo");
            var teacherQualification = document.getElementById("teacherQualification");
            var teacherAppointedSubject = document.getElementById("teacherAppointedSubject");

            // check teacher id is empty or not
            if (teacherId == "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please enter Teacher NIC!',
                })
                teacherName.value = "Ex: John Doe";
                teacherEmail.value = "Ex: abc@gmail.com";
                teacherContact.value = "Ex: 0771234567";
                teacherAppointedSubject.value = "Ex: Maths";
                teacherQualification.value = "Ex: BSc in Computer Science";
                document.getElementById("spinner").classList.remove("show");
                return;
            }

            var teacherData = {
                nic: teacherId
            };

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "{{ route('search.teacher') }}",
                data: teacherData,
                success: function(response) {
                    console.log(response);
                    if (response != "Invalid") {
                        teacherName.value = response.full_name;
                        teacherEmail.value = response.email;
                        teacherContact.value = response.mobile;
                        teacherAppointedSubject.value = response.appointed_subject;
                        teacherQualification.value = response.qualifications;
                    } else if (response == "Invalid") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Invalid Teacher NIC!',
                        })
                        teacherName.value = "Ex: John Doe";
                        teacherEmail.value = "Ex: abc@gmail.com";
                        teacherContact.value = "Ex: 0771234567";
                        teacherAppointedSubject.value = "Ex: Maths";
                        teacherQualification.value = "Ex: BSc in Computer Science";
                    }
                }
                document.getElementById("spinner").classList.remove("show");
            });
        }
    </script>
</body>

</html>
