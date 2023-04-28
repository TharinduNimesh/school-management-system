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
        @include('public_components.spinner')
        @include('teacher.components.hamburger')
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            @include('teacher.components.navbar')

            <!-- Widget Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4 bg-secondary mt-1 px-4 pt-2 pb-3 rounded-5">
                    <div class="col-12">
                        <h3 class="text-dark">Upload New Assignments</h3>
                        <form id="uploadForm">
                            <div class="row mt-4">
                                <div class="form-floating col-md-6 mt-3">
                                    <select class="form-select bg-secondary text-dark" id="assignmentGrade" name="grade" aria-label="Floating label select example">
                                        <option value="0" selected>
                                            Open this select menu
                                        </option>
                                        @for($i=1; $i <= 13; $i++) <option>{{ $i }}</option>
                                            @endfor
                                    </select>
                                    <label class="px-3" for="floatingSelect">Select A Grade</label>
                                </div>

                                <div class="form-floating col-md-6 mt-3">
                                    <select class="form-select bg-secondary text-dark" id="assignmentClass" name="class" aria-label="Floating label select example">
                                        <option value="0" selected>
                                            Open this select menu
                                        </option>
                                        @php $classes = ["A", "B", "C", "D", "E",
                                        "F", "G", "H"] @endphp
                                        @foreach($classes as $class)
                                        <option>{{ $class }}</option>
                                        @endforeach
                                    </select>
                                    <label class="px-3" for="floatingSelect">Select A Class</label>
                                </div>

                                <div class="form-floating col-md-6 mt-3">
                                    <select class="form-select bg-secondary text-dark" id="assignmentSubject" name="subject" aria-label="Floating label select example">
                                        <option value="0" selected>
                                            Open this select menu
                                        </option>
                                        <option>English</option>
                                        <option>Sinhala</option>
                                        <option>Science</option>
                                    </select>
                                    <label class="px-3" for="floatingSelect">Select A Subject</label>
                                </div>

                                <div class="form-floating col-md-6 mt-3">
                                    <input type="text" class="form-control bg-secondary text-dark" id="assignmentHeading" name="heading" placeholder="name@example.com" />
                                    <label class="px-3" for="floatingInput">Assignment Heading</label>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mt-3">
                                        <input type="file" class="form-control bg-secondary text-dark" id="assignmentFile" name="file" accept=".pdf,.doc,.docx" />
                                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mt-3">
                                        <input type="date" class="form-control bg-secondary text-dark" placeholder="Username" aria-label="Username" id="startingDate" name="startDate" />
                                        <span class="input-group-text">To</span>
                                        <input type="date" class="form-control bg-secondary text-dark" placeholder="Server" aria-label="Server" id="endDate" name="endDate" />
                                    </div>
                                </div>

                                <div class="form-floating mt-3">
                                    <textarea class="form-control bg-secondary text-dark" placeholder="Leave a comment here" id="assignmentDescription" name="description" style="height: 100px"></textarea>
                                    <label class="px-3 pt-2" for="floatingTextarea2">Description</label>
                                </div>

                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button class="btn btn-primary mt-3" type="button" onclick="submitAssignment();">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <hr />
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4 bg-secondary mt-1 px-4 pt-2 pb-3 rounded-5">
                    <h3 class="font-weight-bold text-dark">
                        Submited Assignments
                    </h3>

                    <form action="{{ route('search.assignment') }}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <select id="grade" class="form-select bg-secondary text-dark">
                                <option selected value="0">Select A Grade</option>
                                @for ($i=1; $i<=13; $i++) <option>{{ $i }}</option>
                                    @endfor
                            </select>
                            <span class="input-group-text" style="font-weight: bolder;">-</span>
                            <select id="class" class="form-select bg-secondary text-dark">
                                <option selected value="0">Select A Class</option>
                                @foreach ($classes as $class)
                                <option>{{ $class }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-grid gap-2 col-6 mx-auto mb-2" style="margin-top: -5px">
                            <button class="btn btn-primary" onclick="searchAssignment();" type="button">
                                Search
                            </button>
                        </div>

                    </form>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">Student name</span>
                        </div>
                        <input type="text" class="form-control bg-secondary text-dark" id="searching" aria-describedby="basic-addon3" onkeyup="searchStudent();" />
                    </div>
                    <div class="col-12 table-responsive">
                        <table id="studentTable" class="table table-hover table-bordered table-responsive rounded-5">
                            <thead>
                                <tr>
                                    <th class="space">No</th>
                                    <th class="space">Student Name</th>
                                    <th class="space">Subject</th>
                                    <th class="space">Submited date time</th>
                                    <th class="space">Assignment Document</th>
                                    <th class="space">Assignment Marks</th>
                                    <th class="space">Submit Marks</th>
                                </tr>
                            </thead>
                            <tbody id="outputTable">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Widget End -->

            @include('public_components.footer')
        </div>
        <!-- Content End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    @include('public_components.js')
    <script>
        hamburger("assignments");

        function searchAssignment() {
            const studentGrade = document.getElementById("grade");
            const studentClass = document.getElementById("class");
            const spinner = document.getElementById("spinner");
            spinner.classList.add("show");

            var tableBody = document.querySelector("tbody");
            tableBody.innerHTML = '';

            if(studentClass.value == '0' || studentGrade.value == '0') {
                Swal.fire({
                    icon: "warning",
                    title: "WARNING",
                    text: "Please Select A Grade And Class",
                });
                spinner.classList.remove("show");
            } else {
                var form = new FormData();
                form.append("grade", studentGrade.value);
                form.append("class", studentClass.value);

                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if(xhr.readyState == 4 && xhr.status == 200) {
                        var response = JSON.parse(xhr.responseText);
                        if(response.len > 0) {
                            for(let i = 0; i < response.len; i++) {
                                
                            // create a new table row element
                            var newRow = document.createElement("tr");

                            if(response.details[i].status == "late") {
                                newRow.style.backgroundColor = "#faa5a5";
                                newRow.style.color = "black";
                            }

                            // create a new table header cell element with the "No" text
                            var noHeader = document.createElement("th");
                            noHeader.textContent = i + 1;
                            noHeader.classList.add("space");

                            // create a new table header cell element with the "Tharindu" text
                            var nameHeader = document.createElement("th");
                            nameHeader.textContent = response.details[i].name;
                            nameHeader.classList.add("space");

                            // create a new table header cell element with the "English" text
                            var subjectHeader = document.createElement("th");
                            subjectHeader.textContent = response.details[i].subject;
                            subjectHeader.classList.add("space");

                            // create a new table header cell element with the "2023-12-11" text
                            var dateHeader = document.createElement("th");
                            dateHeader.textContent = response.details[i].datetime;
                            dateHeader.classList.add("space");

                            // create a new table header cell element with a download button
                            var downloadHeader = document.createElement("th");
                            downloadHeader.classList.add("space");
                            var downloadLink = document.createElement("a");

                            downloadLink.href = response.details[i].url;
                            downloadLink.textContent = "Download";
                            downloadLink.classList.add("btn", "btn-success");
                            downloadHeader.appendChild(downloadLink);

                            // create a new table header cell element with an input field
                            var inputHeader = document.createElement("th");
                            inputHeader.classList.add("space");
                            var inputField = document.createElement("input");
                            inputField.classList.add("form-control", "bg-secondary", "text-dark");
                            inputHeader.appendChild(inputField);

                            // create a new table header cell element with the "10" text
                            var scoreHeader = document.createElement("th");
                            var submitButton = document.createElement("button");
                            submitButton.innerHTML  = "Submit";
                            submitButton.classList.add("btn", "btn-warning");
                            scoreHeader.classList.add("space");

                            if(response.details[i].marks != 'pending') {
                                inputField.setAttribute("disabled", true);
                                inputField.value = response.details[i].marks;
                                submitButton.classList.add("disabled");
                            } else {
                                inputField.id = "input" + response.details[i].submission_id;
                                submitButton.dataset.id = response.details[i].submission_id;
                                submitButton.onclick = function(event) {
                                    var id = event.target.dataset.id;
                                    var regex = /^10(\.0+)?|^(\d(\.\d+)?)$/;
                                    const marks = document.getElementById("input" + id);
                                    if(regex.test(marks.value)) {
                                        var updateForm = new FormData();
                                        updateForm.append("id", id);
                                        updateForm.append("marks", marks.value);
                                        var req = new XMLHttpRequest();
                                        req.onreadystatechange = function() {
                                            if(req.readyState == 4 && req.status == 200) {
                                                event.target.classList.add("disabled");
                                                marks.setAttribute("disabled", true);
                                                Swal.fire({
                                                    position: "top-end",
                                                    icon: "success",
                                                    title: "Marks Added For The Assignment",
                                                    showConfirmButton: false,
                                                    timer: 1500,
                                                });
                                            }
                                        }

                                        req.open("POST", "{{ route('add.marks.assignment') }}");
                                        req.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
                                        req.send(updateForm);
                                    } else {
                                        Swal.fire({
                                            icon: "warning",
                                            title: "WARNING",
                                            text: "Marks Must Be In 0 to 10",
                                        });
                                    }
                                    var updateForm = new FormData();
                                    updateForm.append("id", id);

                                }
                            }

                            scoreHeader.appendChild(submitButton);

                            // append all the header cells to the row element
                            newRow.appendChild(noHeader);
                            newRow.appendChild(nameHeader);
                            newRow.appendChild(subjectHeader);
                            newRow.appendChild(dateHeader);
                            newRow.appendChild(downloadHeader);
                            newRow.appendChild(inputHeader);
                            newRow.appendChild(scoreHeader);

                            // append the row element to the table body
                            tableBody.appendChild(newRow);
                            }
                        }
                        spinner.classList.remove("show");
                    }
                }

                xhr.open("POST", "{{ route('search.assignment') }}");
                xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
                xhr.send(form);
            }
        }

        function submitAssignment() {
            var assignmentGrade =
                document.getElementById("assignmentGrade");
            var assignmentClass =
                document.getElementById("assignmentClass");
            var assignmentSubject =
                document.getElementById("assignmentSubject");
            var assignmentHeading =
                document.getElementById("assignmentHeading");
            var assignmentDescription = document.getElementById(
                "assignmentDescription"
            );
            var assignmentFile = document.getElementById("assignmentFile");
            var startingDate = document.getElementById("startingDate");
            var endDate = document.getElementById("endDate");
            const spinner = document.getElementById("spinner");

            if (assignmentGrade.value == "0") {
                Swal.fire({
                    icon: "warning",
                    title: "Oops...",
                    text: "It's Look Like You Aren't Select A Grade",
                });
            } else {
                if (assignmentClass.value == "0") {
                    Swal.fire({
                        icon: "warning",
                        title: "Oops...",
                        text: "It's Look Like You Aren't Select A Class",
                    });
                } else {
                    if (assignmentSubject.value == "0") {
                        Swal.fire({
                            icon: "warning",
                            title: "Oops...",
                            text: "It's Look Like You Aren't Select A Subject",
                        });
                    } else {
                        if (assignmentHeading.value.trim() == "") {
                            Swal.fire({
                                icon: "warning",
                                title: "Oops...",
                                text: "It's Look Like You Aren't Fill Assignment Heading",
                            });
                        } else if (
                            assignmentDescription.value.trim() == ""
                        ) {
                            Swal.fire({
                                icon: "warning",
                                title: "Oops...",
                                text: "It's Look Like You Aren't Fill Assignment Description",
                            });
                        } else if (assignmentFile.value == "") {
                            Swal.fire({
                                icon: "warning",
                                title: "Oops...",
                                text: "It's Look Like You Aren't Attach Assignment File",
                            });
                        } else if (startingDate.value == "") {
                            Swal.fire({
                                icon: "warning",
                                title: "Oops...",
                                text: "It's Look Like You Aren't Fill Assignment Starting Date",
                            });
                        } else if (endDate.value == "") {
                            Swal.fire({
                                icon: "warning",
                                title: "Oops...",
                                text: "It's Look Like You Aren't Fill Assignment Ending Date",
                            });
                        } else {
                            var req = new XMLHttpRequest();
                            var uploadForm = document.getElementById("uploadForm");
                            var form = new FormData(uploadForm);
                            spinner.classList.add("show");

                            req.onreadystatechange = function() {
                                // add debugging part here
                                if (req.readyState == 4) {
                                    if (req.status == 200) {
                                        var response = req.responseText;
                                        if (response == 'fileNotSaved') {
                                            Swal.fire({
                                                icon: "error",
                                                title: "Error",
                                                text: "Error While Saving File",
                                                footer: "<a href='http://wa.me/94701189971'>Contact Developers Here</a>",
                                            });
                                        } else if (response == "dbError") {
                                            Swal.fire({
                                                icon: "error",
                                                title: "Error",
                                                text: "Error While Saving on Database",
                                                footer: "<a href='http://wa.me/94701189971'>Contact Developers Here</a>",
                                            });
                                        } else if (response == 'success') {
                                            Swal.fire({
                                                position: "top-end",
                                                icon: "success",
                                                title: "Assignment Uploaded Successfully",
                                                showConfirmButton: false,
                                                timer: 1500,
                                            });
                                        }
                                    } else {
                                        Swal.fire({
                                            icon: "error",
                                            title: "Error",
                                            text: "Internel Server Error",
                                            footer: "<a href='http://wa.me/94701189971'>Contact Developers Here</a>",
                                        });
                                    }
                                    spinner.classList.remove("show");
                                }
                            };

                            req.open(
                                "POST",
                                "{{ route('add.assignment') }}"
                            );
                            req.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
                            req.send(form);
                        }
                    }
                }
            }
        }

        function searchStudent() {
            let input, filter, table, tr, td, txtValue;

            // initialize variables

            input = document.getElementById("searching");
            filter = input.value.toUpperCase();
            table = document.getElementById("studentTable");
            tr = table.getElementsByTagName("tr");

            for (let i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        function addAssignmentMarks(event) {
            var button = event.target;
            var id = button.getAttribute("data-marks");
            var dbId = button.getAttribute("data-dbid");

            var marksInput = document.getElementById("marks" + id);

            if (marksInput.value.trim() == "") {
                Swal.fire({
                    icon: "info",
                    title: "WARNING",
                    text: "Please Enter Marks And Press Submit",
                });
            } else {
                var marks = marksInput.value;
                var r = new XMLHttpRequest();

                r.onreadystatechange = function() {
                    if (r.readyState == 4) {
                        if (r.status == 200) {
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: "Marks Added Successfully",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Error",
                                text: "Internel Server Error",
                                footer: "<a href='http://wa.me/94701189971'>Contact Developers Here</a>",
                            });
                        }
                    }
                };

                r.open(
                    "GET",
                    "process/assignmentMarks.php?marks=" +
                    marks +
                    "&dbid=" +
                    dbId +
                    "",
                    true
                );
                r.send();
            }
        }
    </script>
</body>

</html>