<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.components.head')
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        @include('public_components.spinner')


       @include('admin.components.sidebar')


        <!-- Content Start -->
        <div class="content">
            @include('admin.components.navbar')

            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="row g-2">

                        <div class="col-md-6 col-12">
                            <div class="form-floating">
                                <input class="form-control bg-secondary text-dark" id="teacherNic" type="text"
                                    placeholder="Index Number">
                                <label for="floatingSelectGrid">Search by NIC</label>
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="form-floating">
                                <input class="form-control bg-secondary text-dark" id="teacherName" type="text"
                                    placeholder="Index Number" onkeyup="teacherLiveSearch();">
                                <label for="floatingSelectGrid">Search by Name</label>
                                <div class="list-group" style="position: absolute; width: 100%; z-index: 100000;"
                                    id="item-container">
                                    <!-- suggestions append to here -->

                                </div>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-primary" onclick="searchTeacher();">Search</button>
                        </div>

                    </div>


                    <div class="col-12 col-md-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="bi bi-pie-chart-fill fa-2x text-dark"></i>
                            <div class="ms-3">
                                <p class="mb-2">Attendance</p>
                                <h6 class="mb-0 text-dark">none</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="bi bi-bag-dash-fill fa-2x text-dark"></i>
                            <div class="ms-3">
                                <p class="mb-2">Current class</p>
                                <h6 class="mb-0 text-dark" id="gradeClass">none</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#resignationModal">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="bi bi-calendar2-date-fill fa-2x text-dark"></i>
                            <div class="ms-3">
                                <p class="mb-2">Date Of Resignation</p>
                                <h6 class="mb-0 text-dark" id="resignation">none</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Sale & Revenue End -->

            <x-modal message="<p>Are you sure you want to remove this teacher from the school? This action cannot be
                                undone and will result in the removal of all associated data and records. Please confirm
                                your decision before proceeding.</p>"
                    title="Warning"
                    onConfirm="teacherResignation();"
                    id="resignationModal"
                    isCentered="false"/>

            <!-- Profile Start -->
            <div class="container-fluid pt-4 px-4">

                <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-dark">Teacher Details</h3>

                        <div class="card mb-4">

                            <!-- Account -->

                            <hr class="my-0" />
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="FullName" class="form-label">Full Name</label>
                                        <input class="form-control bg-secondary text-dark" type="text" id="fullName"
                                            name="FullName" value="Ex : John Doe" autofocus />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="N.I.C" class="form-label ">NIC</label>
                                        <input disabled class="form-control bg-secondary text-dark " type="text"
                                            name="Namewithinitials" id="nic" value="Ex : 90123415v" data-nic="0" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Address" class="form-label">Address</label>
                                        <input class="form-control bg-secondary text-dark" type="text" id="address"
                                            name="Address" value="Ex : 64/8 A, Jaya Mawatha,Colombo." />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Gender" class="form-label">Gender</label>
                                        <input disabled type="text" class="form-control  bg-secondary text-dark"
                                            id="gender" name="Gender" value="Ex : Male" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="phoneNumber">Phone Number</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text">LK (+94)</span>
                                            <input type="text" id="mobile" name="phoneNumber"
                                                class="form-control  bg-secondary text-dark" value="Ex: 771112223" />
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Email" class="form-label">Email</label>
                                        <input type="text" class="form-control  bg-secondary text-dark" id="email"
                                            name="Email" value="Ex : name@abc.com" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Nationality" class="form-label">Nationality</label>
                                        <input disabled class="form-control bg-secondary text-dark" type="text"
                                            id="nationality" name="" value="Ex : Sinhalese" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Religion" class="form-label">Religion</label>
                                        <input id="religion" disabled class="form-control bg-secondary text-dark"
                                            name="Religion" value="Ex : Buddhism" />
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="Religion" class="form-label">Qualifications</label>
                                        <input id="qualification" class="form-control bg-secondary text-dark"
                                            name="Religion" value="Ex : Bsc Hons In Software Enginnering" />
                                    </div>
                                    <hr>
                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#updateModal">Update</button>
                                </div>

                            <x-modal message="<p>Please note that updating a teacher's personal details can have
                                                    significant legal and administrative implications. Ensure that the
                                                    changes are accurate and necessary before proceeding. Any
                                                    unauthorized changes can result in legal and disciplinary action. Do
                                                    you wish to continue with this update?</p>"
                                        title="Warning"
                                        id="updateModal"
                                        onConfirm="updateTeacherData();"
                                        isCentered="false"/>

                                <div class="card mt-2">
                                    <h5 class="card-header text-primary">Subjects</h5>
                                    <div class="card-body">
                                        <div class="mb-3 col-12 mb-0">
                                            <div class="alert alert-warning">
                                                <ul id="subjectList">
                                                    <li style="font-weight: bolder;">
                                                        Sinhala
                                                    </li>
                                                    <li>
                                                        <h6 class="alert-heading fw-bold mb-1">Buddhist</h6>
                                                    </li>
                                                    <li>
                                                        <h6 class="alert-heading fw-bold mb-1">Mathhs</h6>
                                                    </li>
                                                    <li>
                                                        <h6 class="alert-heading fw-bold mb-1">History</h6>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Account -->
                        </div>

                    </div>
                </div>
            </div>
            <!-- Profile End -->


            <!-- Footer Start -->
            @include('public_components.footer')
            
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    @include('public_components.js')
    <script>
        hamburger("searchTeacher");
        function teacherLiveSearch() {
            document.getElementById("item-container").style.display = '';
            var name = document.getElementById("teacherName").value;

            if (name.trim() == '') {
                document.getElementById("item-container").innerHTML = '';
            }
            else {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // handle response
                        document.getElementById("item-container").innerHTML = '';
                        var response = JSON.parse(xhr.responseText);
                        for (let i = 0; i < response.length; i++) {
                            var item = document.createElement("button");
                            item.innerHTML = response[i].teacher['name'] + " " + "-" + " " + response[i].teacher['nic'];
                            item.classList.add("list-group-item");
                            item.classList.add("list-group-item-action");
                            item.classList.add("text-dark");
                            item.dataset.nic = response[i].teacher['nic'];
                            item.onclick = function () {
                                document.getElementById("teacherName").value = this.innerHTML;
                                document.getElementById("teacherName").dataset.nic = this.dataset.nic;
                                document.getElementById("item-container").style.display = 'none';
                            }
                            document.getElementById("item-container").appendChild(item);
                        }
                    }
                }

                xhr.open("GET", "process/teacherLiveSearch.php?name=" + name + "", true);
                xhr.send();
            }
        }

        function searchTeacher() {
            var name = document.getElementById("teacherName");
            var nic = document.getElementById("teacherNic");

            if (name.value.trim() != '' && nic.value.trim() != '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Sorry',
                    text: "You must fill in one text field at a time"
                });
                document.getElementById("nic").dataset.nic = 0;
            }
            else if (name.value.trim() == '' && nic.value.trim() == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Sorry',
                    text: "Before searching you need to fill one text field"
                });
                document.getElementById("nic").dataset.nic = 0;
            }
            else {
                document.getElementById("spinner").classList.add("show");
                var searchable = '';
                if (name.value.trim() == '') {
                    searchable = nic.value;
                }
                else {
                    searchable = name.dataset.nic;
                }
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var response = xhr.responseText;
                        if (response == "error") {
                            document.getElementById("spinner").classList.remove("show");
                            Swal.fire({
                                icon: 'warning',
                                title: 'ERROR',
                                text: "Invalid Information."
                            });
                            document.getElementById("nic").dataset.nic = 0;
                        }
                        else {
                            response = JSON.parse(response);
                            document.getElementById("nic").dataset.nic = response[0].teacher["nic"];
                            document.getElementById("fullName").value = response[0].teacher["full_name"];
                            document.getElementById("nic").value = response[0].teacher["nic"];
                            document.getElementById("address").value = response[0].teacher["address"];
                            document.getElementById("gender").value = response[0].teacher["gender"];
                            document.getElementById("mobile").value = response[0].teacher["contact_number"];
                            document.getElementById("email").value = response[0].teacher["email"];
                            document.getElementById("nationality").value = response[0].teacher["nationality"];
                            document.getElementById("religion").value = response[0].teacher["religion"];
                            document.getElementById("subjectList").innerHTML = '';
                            document.getElementById("qualification").value = response[0].teacher["qualification"];
                            document.getElementById("resignation").innerHTML = response[0].teacher["date_of_resignation"] == null ? 'none' : response[0].teacher["date_of_resignation"];
                            if (response[0].teacher["grade"] != null) {
                                document.getElementById("gradeClass").innerHTML = response[0].teacher["grade"] + "-" + response[0].teacher["class"];
                            }
                            else {
                                document.getElementById("gradeClass").innerHTML = 'none';
                            }
                            for (let i = 0; i < response.length; i++) {
                                var li = document.createElement("li");
                                li.style.fontWeight = "bolder";
                                li.innerHTML = response[i].teacher["subject"];
                                document.getElementById("subjectList").appendChild(li);
                            }
                            document.getElementById("spinner").classList.remove("show");
                        }
                    }
                }

                xhr.open("GET", "process/adminSearchTeacher.php?nic=" + searchable + "", true);
                xhr.send();
            }
        }

        function teacherResignation() {
            const nic = document.getElementById("nic");
            if (nic.dataset.nic == 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Sorry',
                    text: "Search a Teacher First"
                });
            }
            else {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // handle response
                        document.getElementById("resignation").innerHTML = xhr.responseText;
                    }
                }

                xhr.open("GET", "process/teacherResignation.php?nic=" + nic.dataset.nic + '', true);
                xhr.send();
            }
        }

        function updateTeacherData() {
            const nic = document.getElementById("nic");
            const name = document.getElementById("fullName");
            const address = document.getElementById("address");
            const mobile = document.getElementById("mobile");
            const email = document.getElementById("email");
            const qualification = document.getElementById("qualification")

            if (nic.dataset.nic == 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Sorry',
                    text: "Search a Teacher First"
                });
            }
            else {
                var form = new FormData();
                form.append("name", name.value);
                form.append("address", address.value);
                form.append("nic", nic.dataset.nic);
                form.append("mobile", mobile.value);
                form.append("email", email.value);
                form.append("qualification", qualification.value);

                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var response = xhr.responseText;
                        if (response == 'success') {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Teacher Details Updated',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                        else {
                            Swal.fire({
                                icon: 'warning',
                                title: 'WARNING',
                                text: "Please Double Check Updated Data"
                            });
                        }
                    }
                }

                xhr.open("POST", "process/updateTeacherData.php", true);
                xhr.send(form);
            }
        }
    </script>
</body>

</html>