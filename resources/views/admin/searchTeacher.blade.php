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

            <x-modal
                message="<p>Are you sure you want to remove this teacher from the school? This action cannot be
                                undone and will result in the removal of all associated data and records. Please confirm
                                your decision before proceeding.</p>"
                title="Warning" onConfirm="teacherResignation();" id="resignationModal" isCentered="false" />

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
                                            name="Namewithinitials" id="nic" value="Ex : 90123415v"
                                            data-nic="0" />
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
                                        <input type="text" class="form-control  bg-secondary text-dark"
                                            id="email" name="Email" value="Ex : name@abc.com" />
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

                                <x-modal
                                    message="<p>Please note that updating a teacher's personal details can have
                                                    significant legal and administrative implications. Ensure that the
                                                    changes are accurate and necessary before proceeding. Any
                                                    unauthorized changes can result in legal and disciplinary action. Do
                                                    you wish to continue with this update?</p>"
                                    title="Warning" id="updateModal" onConfirm="updateTeacherData();"
                                    isCentered="false" />
                            </div>
                            <!-- /Account -->
                        </div>

                    </div>
                </div>
            </div>
            <!-- Profile End -->

            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h3 class="mb-0 text-dark">List Subject</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="subjectBody">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h3 class="mb-0 text-dark">Casual/Sick Leaves Details</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Reason</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody id="leavesBody">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h3 class="mb-0 text-dark">Short Leaves Details</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Reason</th>
                                    <th scope="col">Date</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody id="shortLeavesBody">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


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
            } else {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // handle response
                        document.getElementById("item-container").innerHTML = '';
                        var response = JSON.parse(xhr.responseText);
                        response.forEach(teacher => {
                            var item = document.createElement("button");
                            item.innerHTML = teacher.first_name + " " + teacher.last_name + "-" + teacher.nic;
                            item.classList.add("list-group-item");
                            item.classList.add("list-group-item-action");
                            item.classList.add("text-dark");
                            item.dataset.nic = teacher.nic;
                            item.onclick = function() {
                                document.getElementById("teacherName").value = this.innerHTML;
                                document.getElementById("teacherName").dataset.nic = this.dataset.nic;
                                document.getElementById("item-container").style.display = 'none';
                            }
                            document.getElementById("item-container").appendChild(item);
                        });
                    }
                }

                xhr.open("GET", "{{ route('live.search.teacher', ':id') }}".replace(':id', name), true);
                xhr.send();
            }
        }

        function searchTeacher() {
            var name = document.getElementById("teacherName");
            var nic = document.getElementById("teacherNic");
            // clearn all tables and set sample values to input
            document.getElementById("subjectBody").innerHTML = '';
            document.getElementById("leavesBody").innerHTML = '';
            document.getElementById("shortLeavesBody").innerHTML = '';

            document.getElementById("fullName").value = "Ex: John Doe";
            document.getElementById("nic").value = "Ex: 701122334v";
            document.getElementById("nic").dataset.nic = "";
            document.getElementById("address").value = "Ex: No 1, Galle Road, Colombo 03";
            document.getElementById("gender").value = "Ex: Male";
            document.getElementById("mobile").value = "Ex: 0712345678";
            document.getElementById("email").value = "Ex: abc@gmail.com";
            document.getElementById("nationality").value = "Ex: Sri Lankan";
            document.getElementById("religion").value = "Ex: Buddhist";
            document.getElementById("qualification").value = "Ex: BSc in Computer Science";

            document.getElementById("resignation").innerHTML = 'none';
            document.getElementById("gradeClass").innerHTML = 'none';

            if (name.value.trim() != '' && nic.value.trim() != '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Sorry',
                    text: "You must fill in one text field at a time"
                });
                document.getElementById("nic").dataset.nic = 0;
            } else if (name.value.trim() == '' && nic.value.trim() == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Sorry',
                    text: "Before searching you need to fill one text field"
                });
                document.getElementById("nic").dataset.nic = 0;
            } else {
                document.getElementById("spinner").classList.add("show");
                var searchable = '';
                if (name.value.trim() == '') {
                    searchable = nic.value;
                } else {
                    searchable = name.dataset.nic;
                }
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var response = xhr.responseText;
                        if (response == "Invalid") {
                            document.getElementById("spinner").classList.remove("show");
                            Swal.fire({
                                icon: 'warning',
                                title: 'ERROR',
                                text: "Invalid Information."
                            });
                            document.getElementById("nic").dataset.nic = 0;
                        } else {
                            response = JSON.parse(response);
                            document.getElementById("gradeClass").innerHTML = response.class == null ? "Not Assigned" : response.class.grade + " - " + response.class.class;
                            document.getElementById("resignation").innerHTML = response.teacher.resigned_at == null ? "Not Resigned" : response.teacher.resigned_at;

                            document.getElementById("fullName").value = response.teacher.full_name;
                            document.getElementById("nic").value = response.teacher.nic;
                            document.getElementById("nic").dataset.nic = response.teacher.nic;
                            document.getElementById("address").value = response.teacher.address;
                            document.getElementById("gender").value = response.teacher.gender;
                            document.getElementById("mobile").value = response.teacher.mobile;
                            document.getElementById("email").value = response.teacher.email;
                            document.getElementById("nationality").value = response.teacher.nationality;
                            document.getElementById("religion").value = response.teacher.religion;
                            document.getElementById("qualification").value = response.teacher.qualifications;
                            const subjects = [];
                            var num = 1;
                            response.teacher.subjects.forEach((subject, index) => {
                                if (!subjects.includes(subject.subject)) {

                                    var row = document.createElement("tr");
                                    var no = document.createElement("td");
                                    var subjectName = document.createElement("td");
                                    var action = document.createElement("td");
                                    var moreButton = document.createElement("button");

                                    no.innerHTML = num;
                                    subjectName.innerHTML = subject.subject;
                                    moreButton.innerHTML = "More";
                                    moreButton.classList.add("btn");
                                    moreButton.classList.add("btn-success");
                                    moreButton.classList.add("btn-sm");
                                    moreButton.classList.add("text-white");
                                    moreButton.dataset.subject = subject.subject;
                                    moreButton.dataset.teacher = response.teacher.nic;

                                    row.appendChild(no);
                                    row.appendChild(subjectName);
                                    action.appendChild(moreButton);
                                    row.appendChild(action);

                                    document.getElementById("subjectBody").appendChild(row);
                                    subjects.push(subject.subject);
                                    num++;
                                }
                            });

                            response.leaves.forEach((leave, index) => {
                                var row = document.createElement("tr");
                                var no = document.createElement("td");
                                var reason = document.createElement("td");
                                var date = document.createElement("td");

                                no.innerHTML = index + 1;
                                reason.innerHTML = leave.reason;
                                date.innerHTML = leave.date;

                                row.appendChild(no);
                                row.appendChild(reason);
                                row.appendChild(date);

                                document.getElementById("leavesBody").appendChild(row);
                            });

                            response.shortLeaves.forEach((leaves, index) => {
                                var row = document.createElement("tr");
                                var no = document.createElement("td");
                                var reason = document.createElement("td");
                                var date = document.createElement("td");
                                var time = document.createElement("td");

                                no.innerHTML = index + 1;
                                reason.innerHTML = leaves.reason;
                                date.innerHTML = leaves.date;
                                time.innerHTML = leaves.time;

                                row.appendChild(no);
                                row.appendChild(reason);
                                row.appendChild(date);
                                row.appendChild(time);

                                document.getElementById("shortLeavesBody").appendChild(row);
                            });
                        }
                        document.getElementById("spinner").classList.remove("show");
                    }
                }

                xhr.open("GET", "{{ route('search.teacher.all.details', ':nic') }}".replace(':nic', searchable));
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
            } else {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
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
            } else {
                var form = new FormData();
                form.append("name", name.value);
                form.append("address", address.value);
                form.append("nic", nic.dataset.nic);
                form.append("mobile", mobile.value);
                form.append("email", email.value);
                form.append("qualification", qualification.value);

                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
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
                        } else {
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
