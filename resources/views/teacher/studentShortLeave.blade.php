<!DOCTYPE html>
<html lang="en">

<head>
    @include('teacher.components.head')
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
                                <div class="mb-3 col-md-6">
                                    <label for="Indexnumber" class="form-label">Search by Index No</label>
                                    <input class="form-control bg-secondary text-dark" type="text" id="studentIndex"
                                        name="Indexnumber" value="" autofocus placeholder="Enter student Index No" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="Date" class="form-label">Date</label>
                                    <input class="form-control bg-secondary text-dark" type="date" name="Date" id="date"
                                        value="" placeholder="Enter Date" />
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
                                            <th scope="col">Time</th>
                                            <th scope="col">Parent NIC</th>
                                            <th scope="col">Parent Name</th>
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
        function searchLeave() {
            const index = document.getElementById("studentIndex");
            const date = document.getElementById("date");
            const table = document.getElementById("leavesTable");

            if (index.value.trim() == '' || date.value == '') {
                Swal.fire(
                    'ERROR',
                    'Please Enter A Registration Number And A Date',
                    'warning'
                );
                table.classList.add("d-none");
            } else {
                var form = new FormData();
                form.append("index", index.value);
                form.append("date", date.value);

                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // handle response
                        const tbody = document.getElementById("tableBody");
                        var response = JSON.parse(xhr.responseText);
                        console.log(response);

                        if (response.status == "noData") {
                            Swal.fire(
                                'Sorry',
                                'No Data To Display For This Registration Number And Date',
                                'question'
                            );
                            table.classList.add("d-none");
                        } else {
                            tbody.innerHTML = '';
                            table.classList.remove("d-none");
                            const newRow = document.createElement("tr");

                            const nameCell = document.createElement("th");
                            nameCell.setAttribute("scope", "row");
                            nameCell.textContent = response.data["student"];

                            const timeCell = document.createElement("td");
                            timeCell.textContent = response.data["time"];

                            const idCell = document.createElement("td");
                            idCell.textContent = response.data["guardian_nic"];

                            const surnameCell = document.createElement("td");
                            surnameCell.textContent = response.data["guardian_name"];

                            const bla1Cell = document.createElement("td");
                            bla1Cell.textContent = response.data["reason"];

                            const bla2Cell = document.createElement("td");
                            bla2Cell.textContent = response.data["teacher"];

                            // append the cells to the new row
                            newRow.appendChild(nameCell);
                            newRow.appendChild(timeCell);
                            newRow.appendChild(idCell);
                            newRow.appendChild(surnameCell);
                            newRow.appendChild(bla1Cell);
                            newRow.appendChild(bla2Cell);

                            tbody.appendChild(newRow);
                        }

                    }
                }

                xhr.open("POST", "process/searchStudentShortLeaves.php", true);
                xhr.send(form);
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

                    const obj = {
                        "index": index.value,
                        "name": name.value,
                        "nic": nic.value,
                        "reason": reason.value,
                    }
                    var form = new FormData();
                    form.append("form", JSON.stringify(obj));

                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState == 4 && xhr.sstatus == 200) {
                            // handle response
                            var response = JSON.parse(xhr.responseText);
                            if (response.status == 'invalidIndex') {
                                Swal.fire(
                                    'ERROR',
                                    'The Registration Number That You Given Is Invalid',
                                    'error'
                                );
                            } else if (response.status == 'invalidParent') {
                                Swal.fire(
                                    'ERROR',
                                    'Record Added Successfully, But Parent\'s NIC Number Seems Invalid',
                                    'error'
                                );
                            } else {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Record Added Successfully',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }

                            inputs.forEach(input => {
                                input.value = '';
                            });
                        }
                    }

                    xhr.open("POST", "process/leaveAStudent.php", true);
                    xhr.send(form);
                }

            }

        }
    </script>
</body>

</html>