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
                    <div class="col-sm-12 col-xl-4">
                        <div class="col-md">
                            <div class="form-floating">
                                <input class="form-control bg-secondary text-dark" id="year" type="text"
                                    placeholder="Year" onkeyup="searchClass();">
                                <label for="floatingSelectGrid">Year</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-4">
                        <div class="form-floating">
                            <select class="form-select bg-secondary text-dark" id="grade"
                                aria-label="Floating label select example" onchange="searchClass();">
                                <option selected value="-">Open this select menu</option>
                                @for ($i = 1; $i < 14; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            <label for="floatingSelectGrid">Grade</label>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-4">
                        <div class="form-floating">
                            <select class="form-select bg-secondary text-dark" id="class"
                                aria-label="Floating label select example" onchange="searchClass();">
                                <option selected value="0">Open this select menu</option>
                                <option>A</option>
                                <option>B</option>
                                <option>C</option>
                                <option>D</option>
                                <option>E</option>
                                <option>F</option>
                                <option>G</option>
                                <option>H</option>
                            </select>
                            <label for="floatingSelectGrid">Class</label>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="bi bi-capslock-fill fa-2x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Grade</p>
                                <h6 class="mb-0 text-dark" id="searchedGrade">none</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="bi bi-bar-chart-steps fa-2x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Class</p>
                                <h6 class="mb-0 text-dark" id="searchedClass">none</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="bi bi-file-person fa-2x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Students</p>
                                <h6 class="mb-0 text-dark" id="studentCount">none</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->

            <div class="container-fluid pt-4 px-4">
                <div class="col-12">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <img src="/img/animation.gif" class="col-md-5 d-sm-block d-none" style="width: 80px;" alt="">
                        <div class="ms-3 col-md-6 text-center">
                            <p class="mb-2">Automatically Generate Class</p>
                            <h6 class="mb-0 text-dark" id="">This is a beta function that can devide students
                                to the classes automatically</h6>
                        </div>
                        <div class="ms-3">
                            <button data-bs-toggle="modal" data-bs-target="#classModal" class="btn btn-success">Try
                                Now</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="classModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Generate Register</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-floating col-md-6">
                                    <select onchange="getSubjects(this)" class="form-select bg-secondary text-dark"
                                        id="gradesList" aria-label="Floating label select example">
                                        <option selected value="">Open this select menu</option>
                                        @for ($i = 1; $i < 14; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    <label for="floatingSelect">Select a grade</label>
                                </div>
                                <div class="form-floating mb-3 col-md-6">
                                    <input type="text" class="form-control bg-secondary text-dark" id="classs"
                                        placeholder="name@example.com">
                                    <label for="floatingInput" class="mx-2">Class</label>
                                </div>
                                <div class="form-floating mb-3 col-md-6">
                                    <input type="text" class="form-control bg-secondary text-dark" id="count"
                                        placeholder="name@example.com">
                                    <label for="floatingInput" class="mx-2">Student Count</label>
                                </div>
                                <div class="form-floating col-md-6">
                                    <select class="form-select bg-secondary text-dark" id="yearsList"
                                        aria-label="Floating label select example">
                                        <option selected value="">Open this select menu</option>

                                    </select>
                                    <label for="floatingSelect">Select a year</label>
                                </div>
                                <div class="form-floating col-md-6">
                                    <select class="form-select bg-secondary text-dark" id="subjectList"
                                        aria-label="Floating label select example">
                                        <option selected value="">Open this select menu</option>
                                        <option value="any">Class Can Be Contain Any Subject</option>
                                    </select>
                                    <label for="floatingSelect">Select a subject for filter students</label>
                                </div>
                                <div class="form-floating col-md-6">
                                    <select class="form-select bg-secondary text-dark" id="mediumList"
                                        aria-label="Floating label select example">
                                        <option selected value="">Open this select menu</option>
                                        <option value="any">Class Can Be Contain Any medium</option>
                                        <option>Sinhala</option>
                                        <option>English</option>
                                        <option>Tamil</option>
                                    </select>
                                    <label for="floatingSelect">Select a medium for filter students</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-warning" onclick="generateRegister()">Run
                                Process</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top rounded-bottom p-4">
                    <div class="mb-3 col-md-12">
                        <label class="text-primary">Please note that:-</label>
                        <p>This allows you to create a new class and a new Register for student in a new school term</p>
                        <label for="RegistrationNo" class="form-label">Student Search</label>
                        <input class="form-control bg-secondary text-dark" type="text" id="RegistrationNo"
                            name="RegistrationNo" placeholder="Registration No" />
                    </div>
                    <div class="d-grid col-12">
                        <button class="btn btn-primary" onclick="searchStudentForRegister();" type="button">Search<i
                                class="bi bi-search p-2 "></i></button>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <div class="col-12">
                        <h5 class="card-header text-dark">Student Details</h5>
                        <hr>
                        <div class="row">
                            <div class="mb-3 col-md-6" id="infoContainer">
                                <label for="Name" id="studentName" class="form-label">Student Name</label>
                                <input class="form-control bg-secondary text-dark" type="text" id="Name"
                                    name="Name" value="ex: Tharindu Nimesh" autofocus disabled />
                            </div>
                            <div class="mb-3 col-md-6" id="mediumContainer">
                                <label for="Name" class="form-label">Medium</label>
                                <input class="form-control bg-secondary text-dark" type="text" id="medium"
                                    name="Name" value="ex: Sinhala" autofocus disabled />
                            </div>
                            <div class="col-12" id="subjectContainer">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="basket subject" id="canBeChanged" class="form-label">Busket
                                            Subject
                                            I</label>
                                        <input class="form-control bg-secondary text-dark" type="text"
                                            id="busketsubject1" name="basket subject" value="ex: Commerce" autofocus
                                            disabled />
                                    </div>
                                    <div class="mb-3 col-md-6" id="subject2Container">
                                        <label for="Class" id="subject2Header" class="form-label">Busket Subject
                                            II</label>
                                        <input class="form-control bg-secondary text-dark" type="text"
                                            id="busketsubject2" name="Class" value="ex: Art" autofocus disabled />
                                    </div>
                                    <div class="mb-3 col-md-6" id="subject3Container">
                                        <label for="basket subject" id="subject3Header" class="form-label">Busket
                                            Subject
                                            III</label>
                                        <input class="form-control bg-secondary text-dark" type="text"
                                            id="busketsubject3" name="basket subject" value="ex: ICT" autofocus
                                            disabled />
                                    </div>
                                    <div class="mb-3 col-md-6" id="alScheme">
                                        <label for="basket subject" id="subject3Header"
                                            class="form-label">Scheme</label>
                                        <input class="form-control bg-secondary text-dark" type="text"
                                            id="scheme" name="basket subject" value="ex: Tech" autofocus
                                            disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-danger d-none" id="warning" style="color: red;">NOTE: No More
                                Information Available For This Student.</div>
                            <div class="d-grid col-12">
                                <button class="btn btn-primary" id="addButton" data-indexNo="0"
                                    onclick="addNewStudentToRegister();" type="button"><i
                                        class="bi bi-plus-circle p-2"></i>Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0 text-dark">Register</h6>
                    </div>
                    <div class="input-group mb-3 mt-3">
                        <input type="text" class="form-control bg-secondary text-dark"
                            placeholder="Enter Teacher NIC" aria-label="Recipient's username" id="teacherNIC"
                            aria-describedby="button-addon2">
                        <button class="btn btn-primary" onclick="addTeacherToClass();" type="button"
                            id="button-addon2">ADD</button>
                    </div>
                    <div class="row">
                        <div class="col-12 card-header text-dark mb-3">
                            <div class="row">
                                <div class="col-8 d-flex justify-content-start align-items-center">
                                    Class Teacher :&nbsp;&nbsp; <span id="teacherName"> None</span>
                                </div>
                                <div class="col-4">
                                    <button onclick="removeTeacher(this);" class="btn btn-danger d-none"
                                        id="removeTeacher">remove</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-warning">
                        <span style="font-weight:bold;">Attention : </span>If you added students now, please refresh
                        and check the table for up to date details
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Roll No</th>
                                    <th scope="col">Registration No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                <!--  <tr>
                                    <td>01</td>
                                    <td></td>
                                    <td></td>
                                    <td><button type="button" class="btn btn-primary">Remove</button></td>

                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->

            @include('public_components.footer')
        </div>
        <!-- Content End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    @include('public_components.js')
    <script>
        hamburger("manageRegister");

        var currentYear = new Date().getFullYear();

        // Get the next year
        var nextYear = currentYear + 1;

        // Update the HTML
        const currentOption = document.createElement("option");
        const nextOption = document.createElement("option");

        currentOption.text = currentYear;
        currentOption.value = currentYear;

        nextOption.text = nextYear;
        nextOption.value = nextYear;

        const Yearslist = document.getElementById("yearsList");
        Yearslist.appendChild(currentOption);
        Yearslist.appendChild(nextOption);

        function generateRegister() {
            document.getElementById("spinner").classList.add("show");
            const grade = document.getElementById("gradesList");
            const classs = document.getElementById("classs");
            const year = document.getElementById("yearsList");
            const subject = document.getElementById("subjectList");
            const medium = document.getElementById("mediumList");
            const count = document.getElementById("count");
            // validate all
            if (grade.value == '' || classs.value == '' || year.value == '' || subject.value == '' || count.value == '' || medium.value == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please fill all the fields!',
                })
                document.getElementById("spinner").classList.remove("show");
                return;
            }

            // send data to server using xhr
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "{{ route('generate.register') }}", true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
            xhr.onload = function() {
                if (this.status == 200) {
                    var response = JSON.parse(this.responseText);
                    if (response.status == 'no_students') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'No students found!',
                        })
                    } else if (response.status == 'not_enough') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Not enough students!',
                        })
                    } else if (response.status == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Register generated successfully!',
                        })
                        grade.value = '';
                        classs.value = '';
                        year.value = '';
                        subject.value = '';
                        count.value = '';
                        $("#classModal").modal("hide");

                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        })
                    }
                    document.getElementById("spinner").classList.remove("show");
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    })
                    document.getElementById("spinner").classList.remove("show");
                }
            }
            xhr.send(JSON.stringify({
                grade: grade.value,
                class: classs.value,
                year: year.value,
                subject: subject.value,
                count: count.value,
                medium: medium.value
            }));
        }

        function getSubjects(Grade) {
            var grade = Grade.value
            const options = document.getElementsByName("generatedSubject");
            while (options.length > 0) {
                options[0].remove();
            }
            var subjects = [];
            if (grade < 6) {
                subjects = [];
            } else if (grade < 10) {
                subjects = [
                    "Dancing",
                    "Art",
                    "Music",
                    "Drama"
                ];
            } else if (grade < 12) {
                subjects = [
                    "Business & Accounting Studies",
                    "Geography",
                    "Civic Education",
                    "Languages"
                ];
            } else if (grade < 14) {
                subjects = [
                    "Commerce",
                    "Art",
                    "Maths",
                    "Bio",
                    "Technology",
                    "NVQ"
                ];
            }

            subjects.forEach(subject => {
                var option = document.createElement("option");
                option.innerHTML = subject;
                option.setAttribute("name", "generatedSubject")
                document.getElementById("subjectList").appendChild(option);
            });
        }

        var tableRowCount = -1;

        function searchClass() {
            var year = document.getElementById("year");
            var grade = document.getElementById("grade");
            var studentClass = document.getElementById("class");
            const spinner = document.getElementById("spinner");

            var searchedGrade = document.getElementById("searchedGrade");
            var searchedClass = document.getElementById("searchedClass");
            var studentCount = document.getElementById("studentCount");
            var teacherName = document.getElementById("teacherName");
            var tablebody = document.getElementById('tableBody');
            const removeTeacher = document.getElementById("removeTeacher");

            var yearRegex = /^\d{4}$/;

            if (year.value.trim() == '' || grade.value == "0" || studentClass.value == "0") {
                searchedGrade.innerHTML = "none";
                searchedClass.innerHTML = "none";
                studentCount.innerHTML = "none";
                teacherName.innerHTML = "none";
                removeTeacher.classList.add("d-none");
                let allTRs = document.querySelectorAll("td")
                allTRs.forEach(el => el.style.display = "none")
            } else {
                if (yearRegex.test(year.value)) {
                    spinner.classList.add('show');
                    var req = new XMLHttpRequest();
                    var form = new FormData();

                    form.append("year", year.value);
                    form.append("grade", grade.value);
                    form.append("class", studentClass.value);

                    req.onreadystatechange = function() {
                        if (req.readyState == 4) {
                            if (req.status == 200) {
                                var response = JSON.parse(req.responseText);
                                if (response.classStatus == "newClass") {
                                    tablebody.innerHTML = "";
                                    searchedGrade.innerHTML = grade.value;
                                    searchedClass.innerHTML = studentClass.value;
                                    studentCount.innerHTML = "0";
                                    teacherName.innerHTML = "none";
                                    removeTeacher.classList.add("d-none");
                                    tableRowCount = 0;
                                } else {
                                    var students = response.students;
                                    searchedGrade.innerHTML = grade.value;
                                    searchedClass.innerHTML = studentClass.value;
                                    studentCount.innerHTML = students.length;
                                    try {
                                        teacherName.innerHTML = response.teacher.full_name;
                                        removeTeacher.classList.remove("d-none");
                                        removeTeacher.dataset.teacher = response.teacher._id;
                                    } catch (error) {
                                        teacherName.innerHTML = "This Class Doesn't have A Teacher";
                                    }

                                    tablebody.innerHTML = "";
                                    for (let i = 0; i < students.length; i++) {
                                        var row = document.createElement("tr");
                                        var numberCol = document.createElement("td");
                                        var indexCol = document.createElement("td");
                                        var nameCol = document.createElement("td");
                                        var buttonCol = document.createElement("td");
                                        var button = document.createElement("button");

                                        row.id = 'student' + students[i]._id;
                                        numberCol.innerHTML = i + 1;
                                        indexCol.innerHTML = students[i].index_number;
                                        nameCol.innerHTML = students[i].initial_name;

                                        button.classList = "btn btn-danger";
                                        button.innerHTML = "remove";
                                        button.dataset.sid = students[i]._id;
                                        button.onclick = function(event) {
                                            var sid = event.target.dataset.sid;
                                            var removeForm = new FormData();
                                            removeForm.append("studentId", sid);
                                            removeForm.append("year", year.value);

                                            var xhr = new XMLHttpRequest();
                                            xhr.onreadystatechange = function() {
                                                if (xhr.readyState == 4 && xhr.status == 200) {
                                                    var res = xhr.responseText;
                                                    if (res == 'success') {
                                                        document.getElementById('student' + sid).classList.add(
                                                            'd-none');
                                                    } else {
                                                        Swal.fire({
                                                            icon: 'info',
                                                            title: 'Oops!',
                                                            text: 'Something Went Wrong'
                                                        })
                                                    }
                                                }
                                            }

                                            xhr.open("post", "{{ route('remove.student.from.register') }}");
                                            xhr.setRequestHeader('X-CSRF-TOKEN',
                                                document.querySelector('meta[name="csrf-token"]').content);
                                            xhr.send(removeForm);
                                        }

                                        buttonCol.appendChild(button);
                                        row.appendChild(numberCol);
                                        row.appendChild(indexCol);
                                        row.appendChild(nameCol);
                                        row.appendChild(buttonCol);
                                        tableBody.appendChild(row);
                                    }
                                }
                                spinner.classList.remove('show');
                            }
                        }
                    }
                    req.open("POST", "{{ route('search.register') }}");
                    req.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
                    req.send(form);
                }
            }
        }

        function searchStudentForRegister() {
            const spinner = document.getElementById("spinner");
            spinner.classList.add("show");

            var indexNumber = document.getElementById("RegistrationNo");
            var addButton = document.getElementById("addButton");

            const name = document.getElementById("Name");
            const bucket1 = document.getElementById("busketsubject1");
            const bucket2 = document.getElementById("busketsubject2");
            const bucket3 = document.getElementById("busketsubject3");
            const scheme = document.getElementById("scheme");
            const label = document.getElementById('canBeChanged');
            const studentContainer = document.getElementById("studentContainer");
            const subjectContainer = document.getElementById("subjectContainer");
            const alScheme = document.getElementById("alScheme");
            const warning = document.getElementById("warning");
            const subject2Container = document.getElementById("subject2Container");
            const subject3Container = document.getElementById("subject3Container");
            const medium = document.getElementById("medium");
            const mediumContainer = document.getElementById("mediumContainer");
            const infoContainer = document.getElementById("infoContainer");

            // hide everything
            subjectContainer.classList.add("d-none");
            subject2Container.classList.add("d-none");
            subject3Container.classList.add("d-none");
            alScheme.classList.add("d-none");
            warning.classList.add("d-none");
            mediumContainer.classList.add("d-none");

            // resize info container
            infoContainer.classList.add("col-md-6");

            if (!indexNumber.value.trim() == '') {
                var req = new XMLHttpRequest();
                req.onreadystatechange = function() {
                    if (req.readyState == 4) {
                        if (req.status == 200) {
                            // output will handle here
                            var response = req.responseText;
                            if (response == 'invalid') {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'WARNING',
                                    text: "Invalid Registration Number"
                                });
                                name.value = "Ex: Tharindu Nimesh";
                                if (addButton.hasAttribute("data-index")) {
                                    addButton.removeAttribute("data-index");
                                }
                            } else {
                                response = JSON.parse(response);
                                if (response.subjects != null) {
                                    subjectContainer.classList.remove("d-none");
                                    mediumContainer.classList.remove("d-none");
                                    bucket2.classList.remove("d-none");
                                    bucket3.classList.remove("d-none");
                                    label.innerHTML = "Busket Subject I";
                                    name.value = response.initial_name;

                                    var subjects = response.subjects;
                                    if (subjects.al_scheme != null) {
                                        alScheme.classList.remove("d-none");
                                        subject2Container.classList.remove("d-none");
                                        subject3Container.classList.remove("d-none");
                                        bucket1.value = subjects.al_subject_1;
                                        bucket2.value = subjects.al_subject_2;
                                        bucket3.value = subjects.al_subject_3;
                                        scheme.value = subjects.al_scheme;
                                        medium.value = subjects.al_medium;
                                    } else if (subjects.ol_subject_1 != null) {
                                        subject2Container.classList.remove("d-none");
                                        subject3Container.classList.remove("d-none");
                                        bucket1.value = subjects.ol_subject_1;
                                        bucket2.value = subjects.ol_subject_2;
                                        bucket3.value = subjects.ol_subject_3;
                                        medium.value = subjects.ol_medium;
                                    } else if (subjects.aesthetics_subject != null) {
                                        label.innerHTML = "Aesthetics Subject";
                                        bucket1.value = subjects.aesthetics_subject;
                                        medium.value = subjects.medium;
                                    }
                                } else {
                                    name.value = response.initial_name;
                                    warning.classList.remove("d-none");
                                    mediumContainer.classList.add("d-none");
                                    infoContainer.classList.remove("col-md-6");
                                }
                                addButton.dataset.index = response.index_number;
                            }
                            spinner.classList.remove("show");
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: "Internel Server Error",
                                footer: "<a href='http://wa.me/94701189971'>Contact Developers Here</a>"
                            });
                        }
                        spinner.classList.remove("show");
                    }
                }

                req.open("GET", "{{ route('search.student', ':id') }}".replace(':id', indexNumber.value.trim()));
                req.send();
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'WARNING',
                    text: 'You Must Enter Registration Number'
                })
                spinner.classList.remove("show");

                if (addButton.hasAttribute("data-index")) {
                    addButton.removeAttribute("data-index");
                }
            }
        }

        function addNewStudentToRegister() {
            const button = document.getElementById("addButton");
            const spinner = document.getElementById("spinner");
            if (button.hasAttribute("data-index")) {
                var year = document.getElementById("year");
                var grade = document.getElementById("grade");
                var studentClass = document.getElementById("class");

                var yearRegex = /^\d{4}$/;
                if (yearRegex.test(year.value) & grade.value != "0" & studentClass.value != "0") {
                    spinner.classList.add("show");
                    var req = new XMLHttpRequest();
                    var form = new FormData();

                    form.append("year", year.value);
                    form.append("grade", grade.value);
                    form.append("class", studentClass.value);
                    form.append("indexNumber", button.dataset.index);

                    req.onreadystatechange = function() {
                        if (req.readyState == 4) {
                            if (req.status == 200) {
                                // output handle here
                                var response = req.responseText;
                                if (response == 'success') {
                                    Swal.fire({
                                        position: 'top-end',
                                        icon: 'success',
                                        title: 'Student Added To The Class',
                                        showConfirmButton: false,
                                        timer: 1500
                                    })
                                } else {
                                    console.log(response);
                                    Swal.fire({
                                        icon: 'warning',
                                        title: 'WARNING',
                                        text: 'This Student Already In ' + response + ' Given Year'
                                    })
                                }
                                spinner.classList.remove("show");
                            }
                        }
                    }

                    req.open("POST", "{{ route('add.student.to.register') }}");
                    req.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
                    req.send(form);
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'WARNING',
                        text: 'Select Year, Grade And Class Before Add A Student'
                    })
                }
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'WARNING',
                    text: 'You Must Search A Student First'
                })
            }
        }

        function addTeacherToClass() {
            var year = document.getElementById("year");
            var grade = document.getElementById("grade");
            var studentClass = document.getElementById("class");
            var nic = document.getElementById("teacherNIC");

            var yearRegex = /^\d{4}$/;
            if (yearRegex.test(year.value) & grade.value != "0" & studentClass.value != "0" & nic.value.trim() != '') {
                var req = new XMLHttpRequest();

                var form = new FormData();

                form.append("year", year.value);
                form.append("grade", grade.value);
                form.append("class", studentClass.value);
                form.append("nic", nic.value);

                req.onreadystatechange = function() {
                    if (req.readyState == 4) {
                        if (req.status == 200) {
                            // output handle here
                            var response = JSON.parse(req.responseText);
                            if (response.status == 'success') {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Student Added To The Class',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                document.getElementById("teacherName").innerHTML = response.teacher;
                            } else if (response.status == 'exist') {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'ERROR',
                                    text: 'This Teacher Already In A Class: ' + response.class + ''
                                })
                            } else if (response.status == 'invalid') {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'WARNING',
                                    text: 'Invalid Teacher NIC'
                                })
                            }
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: "Internel Server Error",
                                footer: "<a href='http://wa.me/94701189971'>Contact Developers Here</a>"
                            });
                        }
                    }
                }

                req.open("POST", "{{ route('add.teacher.to.class') }}");
                req.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
                req.send(form);
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'WARNING',
                    text: 'Select Year, Grade And Class Before Add A Teacher'
                })
            }
        }

        function removeTeacher(Button) {
            var year = document.getElementById("year");
            var tid = Button.dataset.teacher;

            var form = new FormData();
            form.append("year", year.value);
            form.append("teacherId", tid);

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = xhr.responseText;
                    if (response == 'success') {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Teacher Removed From The Class',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        document.getElementById("teacherName").innerHTML = "This Class Doesn't Have A Teacher";
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: "Internel Server Error",
                            footer: "<a href='http://wa.me/94701189971'>Contact Developers Here</a>"
                        });
                    }
                }
            }

            xhr.open("POST", "{{ route('remove.teacher.from.register') }}");
            xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
            xhr.send(form);
        }
    </script>
</body>

</html>
