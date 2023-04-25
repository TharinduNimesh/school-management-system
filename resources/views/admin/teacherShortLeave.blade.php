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


            <!-- Short Leaves Start -->
            <div class="container-fluid pt-4 px-4" style="overflow-x: hidden; min-height: 80vh;">
                <div class="row bg-secondary p-3">
                    <h3 class="text-dark">Teacher Short Leaves</h3>
                    <hr />
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="alert alert-success">
                                <span style="font-weight: bold; color: #0b6103">ATTENTION :</span>
                                Please note that each teacher is entitled to a maximum of 2
                                short leaves per month. Any additional short leave requests
                                will need to be approved by the administration. It is
                                important to plan ahead and use these short leaves judiciously
                                to ensure that they do not negatively impact classroom
                                instruction.
                            </div>
                            <hr>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('add.short.leaves') }}" method="POST">
                            @csrf
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" style="width: 120px" id="basic-addon1">Teacher NIC</span>
                                    <input type="text" class="form-control text-dark bg-secondary"
                                        placeholder="Enter Teacher National Identity Card Number" aria-label="Username"
                                        aria-describedby="basic-addon1" name="nic" />
                                </div>
                            </div>
    
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" style="width: 120px" id="basic-addon1">Reason</span>
                                    <input type="text" class="form-control text-dark bg-secondary"
                                        placeholder="Enter A Description About Leaving Reason" aria-label="Username"
                                        aria-describedby="basic-addon1" name="reason" />
                                </div>
                            </div>
    
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button class="btn btn-primary" type="submit" onclick="submit();">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row bg-secondary p-3 mt-4">
                    <h4 class="text-dark">Search Teacher Short Leaves</h4>
                    <hr />
                    @if(isset($search_errors))
                        <div class="alert alert-danger">
                            @foreach ($search_errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                    <div class="col-12">
                        <form action="{{ route('search.short.leaves') }}">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control bg-secondary text-dark"
                                placeholder="Search By Teacher NIC" aria-label="Recipient's username"
                                aria-describedby="button-addon2" name="nic" />
                                <button class="btn btn-outline-primary" type="submit"
                                    id="button-addon2">
                                    Search
                                </button>
                        </div>
                    </form>

                    @if (isset($name))
                        <div class="table-responsive" id="shortLeaveContainer">
                            <p class="text-dark text-center">
                                <span style="font-weight: bold" id="teacherNameOnLeaves">Tharindu Nimesh</span>'s Short
                                Leave Report
                            </p>
                            <table class="table table-bordered table-hover">
                                <thead class="table-dark">
                                    <th>No</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Reason</th>
                                </thead>

                                <tbody id="tableBody">
                                    <tr>
                                        <td>01</td>
                                        <td>2023-04-20</td>
                                        <td>10:40</td>
                                        <td>he have an exam </td>
                                    </tr> 
                                </tbody>
                            </table>
                        </div>
                    @endif
                    </div>
                </div>
            </div>
            <!-- Short Leaves End -->


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
        hamburger("teacherShortLeave");
        function search() {
            const nic = document.getElementById("searchNic");
            const tableContainer = document.getElementById("shortLeaveContainer");

            if (nic.value.trim() == "") {
                nic.classList.add("is-invalid");
                tableContainer.classList.add("d-none");
            } else {
                nic.classList.remove("is-invalid");
                var form = new FormData();
                form.append("nic", nic.value);

                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // handle response
                        var response = JSON.parse(xhr.responseText);
                        const teacherName = document.getElementById(
                            "teacherNameOnLeaves"
                        );
                        const tbody = document.getElementById("tableBody");
                        if (response[0].status == "invalidTeacher") {
                            Swal.fire({
                                icon: "warning",
                                title: "WARNING",
                                text: "Invalid Teacher NIC Please Recheck And Try Again",
                            });
                            tableContainer.classList.add("d-none");
                        } else if (response[0].status == "noLeaves") {
                            tbody.innerHTML = '';
                            tableContainer.classList.remove("d-none");
                            teacherName.innerHTML =
                                response[0].data["first_name"] +
                                " " +
                                response[0].data["last_name"];
                            var row = document.createElement("tr");
                            var col = document.createElement("th");
                            col.colSpan = 4;
                            col.style.color = "red";
                            col.style.backgroundColor = "orange";
                            col.innerHTML =
                                "This Teacher Doesn't Have Get Any Short Leaves";
                            row.appendChild(col);
                            tbody.appendChild(row);
                        } else {
                            tableContainer.classList.remove("d-none");
                            tbody.innerHTML = '';
                            teacherName.innerHTML =
                                response[0].data["first_name"] +
                                " " +
                                response[0].data["last_name"];
                            for (let i = 0; i < response.length; i++) {
                                // Create a new table row element
                                var row = document.createElement("tr");

                                // Create a new table data element for the first column
                                var column1 = document.createElement("td");
                                column1.textContent = i + 1;

                                // Create a new table data element for the second column
                                var column2 = document.createElement("td");
                                column2.textContent = response[i].data["date"];

                                // Create a new table data element for the third column
                                var column3 = document.createElement("td");
                                column3.textContent = response[i].data["time"];

                                // Create a new table data element for the fourth column
                                var column4 = document.createElement("td");
                                column4.textContent = response[i].data["reason"];

                                // Append the columns to the row in the correct order
                                row.appendChild(column1);
                                row.appendChild(column2);
                                row.appendChild(column3);
                                row.appendChild(column4);

                                // Append the row to the table
                                tbody.appendChild(row);
                            }
                        }
                    }
                };

                xhr.open("POST", "process/searchTeacherShortLeaves.php", true);
                xhr.send(form);
            }
        }

        function submit() {
            const nic = document.getElementById("teacherNic");
            const reason = document.getElementById("reason");

            if (nic.value.trim() == "" || reason.value.trim() == "") {
                Swal.fire({
                    icon: "warning",
                    title: "WARNING",
                    text: "Please Fill Both NIC And Reason",
                });
            } else {
                var form = new FormData();
                form.append("nic", nic.value);
                form.append("reason", reason.value);

                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status) {
                        var response = xhr.responseText;
                        if (response == "invalidTeacher") {
                            Swal.fire({
                                icon: "warning",
                                title: "WARNING",
                                text: "Invalid Teacher NIC Please Recheck And Try Again",
                            });
                        } else if (response == "maximum") {
                            Swal.fire({
                                icon: "warning",
                                title: "WARNING",
                                text: "This Teacher Has Get Maximum Number Of Short Leaves At This Month",
                            });
                        } else if (response == "success") {
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: "Record Added Successfully",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    }
                };

                xhr.open("POST", "process/teacherShortLeave.php", true);
                xhr.send(form);
            }
        }
    </script>
</body>

</html>