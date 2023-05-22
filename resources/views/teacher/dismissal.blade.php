<!DOCTYPE html>
<html lang="en">

<head>
    @include('teacher.components.head')
    <style>
        .space {
            white-space: nowrap;
        }
    </style>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        @include('public_components.spinner')
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        @include('teacher.components.hamburger')
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('teacher.components.navbar')
            <!-- Navbar End -->


            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h3 class="mb-4 text-dark">Student short leaves</h3>
                            <div class="row" id="myForm">
                                <div class="alert alert-warning">
                                <span style="font-weight: bold;">WARNING :</span> Please note that sending a student home early due to sickness or other issues requires that the student be accompanied by their parent or guardian. Teachers who send students home early are responsible for ensuring that this requirement is met. Any issues that arise during the student's departure from school will be the responsibility of the teacher who sent them home.
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="Indexnumber" class="form-label">Student Index No</label>
                                    <input class="form-control bg-secondary text-dark" type="text" id="indexNumber"
                                        name="Indexnumber" value="" autofocus
                                        placeholder="Enter student Registration No" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">Parent Name</label>
                                    <input class="form-control bg-secondary text-dark" type="text" id="guardianName"
                                        name="name" value="" autofocus placeholder="Enter Parent Name" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="NIC" class="form-label">Parent NIC</label>
                                    <input class="form-control bg-secondary text-dark" type="text" name="guardianNic"
                                        id="guardianNic" value="" placeholder="Enter NIC" />
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="exampleFormControlTextarea1" class="form-label">Reason for
                                        Leave</label>
                                    <textarea class="form-control bg-secondary text-dark" id="reason" rows="3"
                                        placeholder="Description"></textarea>
                                </div>
                                <div class="d-grid">
                                    <button onclick="leaveStudent();" class="btn btn-primary"
                                        type="button">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form End -->


            <!-- Table start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h3 class="mb-4 text-dark">Short leaves List</h3>
                            <div class="row">
                                <div class="mb-3">
                                    <label for="Indexnumber" class="form-label">Search by Index No</label>
                                    <input class="form-control bg-secondary text-dark" type="text" id="studentIndex"
                                        name="Indexnumber" value="" autofocus placeholder="Enter student Index No" />
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-primary mb-4" onclick="searchLeave();">Search</button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered d-none" id="leavesTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Time</th>
                                            <th scope="col" class="space">Parent NIC</th>
                                            <th scope="col" class="space">Parent Name</th>
                                            <th scope="col">Reason</th>
                                            <th scope="col">Teacher</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table end -->

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
        hamburger("dismissal");

        function searchLeave() {
            const index = document.getElementById("studentIndex");
            const table = document.getElementById("leavesTable");
            const tableBody = document.getElementById("tableBody");

            table.classList.add("d-none");
            tableBody.innerHTML = "";

            if (index.value.trim() == '') {
                Swal.fire(
                    'ERROR',
                    'Please Enter A Registration Number And A Date',
                    'warning'
                );
            } else {

                var xhr = new XMLHttpRequest();
                xhr.onload = function () {
                    if(xhr.status == 200) {
                        var response = xhr.responseText;
                        if(response == "noData") {
                            Swal.fire(
                                'ERROR',
                                'No Data Found',
                                'warning'
                            );
                        } else {
                            table.classList.remove("d-none");
                            response = JSON.parse(response);
                            response.forEach(record => {
                                var row = document.createElement("tr");
                                var name = document.createElement("td");
                                var date = document.createElement("td");
                                var time = document.createElement("td");
                                var nic = document.createElement("td");
                                var parentName = document.createElement("td");
                                var reason = document.createElement("td");
                                var teacher = document.createElement("td");

                                name.innerHTML = record.name;
                                name.classList.add("space");
                                date.innerHTML = record.date;
                                time.innerHTML = record.time;
                                nic.innerHTML = record.guardian_nic;
                                parentName.innerHTML = record.guardian_name;
                                parentName.classList.add("space");
                                reason.innerHTML = record.reason;
                                reason.classList.add("space");
                                teacher.innerHTML = record.teacher_name;
                                teacher.classList.add("space");

                                row.appendChild(name);
                                row.appendChild(date);
                                row.appendChild(time);
                                row.appendChild(nic);
                                row.appendChild(parentName);
                                row.appendChild(reason);
                                row.appendChild(teacher);

                                tableBody.appendChild(row);
                            })
                        }
                    }
                }

                xhr.open("GET", "{{ route('search.dismiss.student', ':id') }}".replace(':id', index.value));
                xhr.send();
            }
        }

        function leaveStudent() {

            const myForm = document.getElementById("myForm");

            var inputs = myForm.querySelectorAll("input");
            var isValid = true;

            inputs.forEach(input => {
                if (input.value.trim() == '') {
                    input.classList.add("is-invalid");
                    isValid = false
                } else {
                    input.classList.remove("is-invalid");
                }
            });

            if (isValid) {
                const reason = document.getElementById("reason");
                if (reason.value.trim() == '') {
                    reason.classList.add("is-invalid");
                } else {
                    reason.classList.remove("is-invalid");
                    reason.classList.remove("is-invalid");
                    const index = document.getElementById("indexNumber");
                    const name = document.getElementById("guardianName");
                    const nic = document.getElementById("guardianNic");

                    var form = new FormData();
                    form.append("index", index.value);
                    form.append("name", name.value);
                    form.append("nic", nic.value);
                    form.append("reason", reason.value);

                    var xhr = new XMLHttpRequest();
                    xhr.onload = function() {
                        if (xhr.status == 200) {
                            var response = xhr.responseText;
                            if (response == "invalid_guardian") {
                                Swal.fire(
                                    'ATTENTION',
                                    'Guardian NIC Not Match With Records In The System, But Record Was Added',
                                    'warning'
                                );
                                myForm.forEach(input => {
                                    input.value = '';
                                });
                                reason.value = '';
                            } else if (response == "invalid_student") {
                                Swal.fire(
                                    'ERROR',
                                    'Invalid Student Index Number',
                                    'error'
                                );
                            } else if (response == "permission") {
                                Swal.fire(
                                    'ERROR',
                                    'You Do Not Have Permission To Do This',
                                    'error'
                                );
                            } else if (response == "success") {
                                Swal.fire(
                                    'SUCCESS',
                                    'Student Leave Recorded Successfully',
                                    'success'
                                );
                                myForm.forEach(input => {
                                    input.value = '';
                                });
                                reason.value = '';
                            } else {
                                Swal.fire(
                                    'ERROR',
                                    'Something Went Wrong',
                                    'error'
                                );
                            }
                        } else {
                            Swal.fire(
                                'ERROR',
                                'Something Went Wrong',
                                'error'
                            );
                        }
                    }

                    xhr.open("POST", "{{ route('dismiss.student') }}");
                    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
                    xhr.send(form);
                }

            }

        }
    </script>
</body>

</html>