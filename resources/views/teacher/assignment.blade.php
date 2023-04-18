<!DOCTYPE html>
<html lang="en">

<head>
    @include('teacher.components.head')
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
                    <div class="col-12 ">
                        <h3 class="font-weight-bold text-dark">Set And Submit Assingments</h3>

                        <form>
                            <div class="form-group mt-3">
                                <label for="exampleFormControlSelect1">Select Grade</label>
                                <select class="form-control text-dark" id="assignmentGrade">
                                    <option value="0">Select A Grade</option>
                                        <option selected value="0">Select a Grade</option>
                                    @for ($i=1; $i<14; $i++)
                                        <option>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="exampleFormControlSelect1">Select Class</label>
                                <select class="form-control text-dark" id="assignmentClass">
                                    <option selected value="0">Select a Class</option>
                                    @php
                                        $classes = ["A", "B", "C", "D", "E", "F", "G", "H"];
                                    @endphp

                                    @foreach ($classes as $class)
                                        <option>{{ $class }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="exampleFormControlSelect1">Select Subject</label>
                                <select class="form-control text-dark" id="assignmentSubject">
                                    <option value="0">Select A Subject</option>
                                    <!-- subject need to add here from db -->
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="exampleFormControlInput1">Assingment Heading</label>
                                <input type="text" class="form-control bg-secondary text-dark" id="assignmentHeading"
                                    placeholder="Assingment Heading">
                            </div>
                            <div class="form-group mt-3">
                                <label for="exampleFormControlInput1">Assingment Code</label>
                                <input type="text" class="form-control bg-secondary text-dark" id="assignmentCode"
                                    placeholder="Assingment Code">
                            </div>
                            <div class="form-group mt-3">
                                <label for="exampleFormControlTextarea1">Assingment description</label>
                                <textarea class="form-control bg-secondary text-dark" id="assignmentDescription"
                                    rows="3"></textarea>
                            </div>
                            <form>
                                <div class="form-group mt-3">
                                    <label for="exampleFormControlFile1">Assingment Document</label>
                                    <input type="file" class="form-control-file" id="assignmentFile">
                                </div>
                                <div class="input-group mb-3 mt-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-secondary text-dark" id="basic-addon1">Starting
                                            Date</span>
                                    </div>
                                    <input type="date" class="form-control bg-secondary text-dark"
                                        placeholder="Username" aria-label="Username" aria-describedby="basic-addon1"
                                        id="startingDate">
                                </div>
                                <div class="input-group mb-3 mt-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text  bg-secondary text-dark" id="basic-addon1">Closing
                                            Date</span>
                                    </div>
                                    <input type="date" class="form-control  bg-secondary text-dark"
                                        placeholder="Username" aria-label="Username" aria-describedby="basic-addon1"
                                        id="endDate">
                                </div>
                                <button onclick="submitAssignment();" type="button"
                                    class="btn btn-primary btn-lg btn-block">Upload
                                    Assingment</button>
                            </form>
                        </form>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4 bg-secondary mt-1 px-4 pt-2 pb-3 rounded-5">

                    <h3 class="font-weight-bold text-dark">Submited Assingments</h3>

                    <select
                        class="form-control bg-secondary text-dark custom-select custom-select-lg col-12 col-sm-5 mb-3 ms-1"
                        id="searchByGrade">
                            <option selected value="0">Select a Grade</option>
                        @for ($i=1; $i<14; $i++)
                            <option>{{ $i }}</option>
                        @endfor
                    </select>

                    <select
                        class="form-control bg-secondary text-dark custom-select custom-select-lg col-12 col-sm-5 mb-3 ms-1"
                        id="searchByClass">
                        <option value="0">Select A Class</option>
                        @foreach ($classes as $class)
                            <option>{{ $class }}</option>
                        @endforeach
                    </select>

                    <div class="d-grid gap-2 col-6 mx-auto mb-2" style="margin-top: -5px;">
                        <button class="btn btn-primary" type="button" onclick="searchAssignment();">Search</button>
                    </div>


                    <div class="input-group mb-3 ">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">Student name</span>
                        </div>
                        <input type="text" class="form-control bg-secondary text-dark " id="searching"
                            aria-describedby="basic-addon3" onkeyup="searchStudent();">
                    </div>
                    <div class="col-12  table-responsive ">
                        <table id="studentTable" class="table table-striped table-bordered table-responsive rounded-5">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Student_Name</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Submited_date_time</th>
                                    <th scope="col">Assingment_code</th>
                                    <th scope="col">Assingment_Document</th>
                                    <th scope="col">Assingment_Marks</th>
                                    <th scope="col">Submit_Marks</th>
                                </tr>
                            </thead>
                            <tbody id="outputTable">
                                 <tr>
                                    <th scope="row">1</th>
                                    <td>Tharindu</td>
                                    <td>English</td>
                                    <td>12/31 11.59</td>
                                    <td>@12345</td>
                                    <td><button type="button" class="btn btn-primary">Download</button></td>
                                    <td><input type="text" class="form-control bg-secondary text-dark"
                                            placeholder="Add Marks"></td>
                                    <td><button type="button" class="btn btn-primary">Submit</button></td>
                                </tr>
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
        hamburger('assignments')
        function submitAssignment() {
            var assignmentGrade = document.getElementById('assignmentGrade');
            var assignmentClass = document.getElementById('assignmentClass');
            var assignmentSubject = document.getElementById('assignmentSubject');
            var assignmentHeading = document.getElementById('assignmentHeading');
            var assignmentCode = document.getElementById('assignmentCode');
            var assignmentDescription = document.getElementById('assignmentDescription');
            var assignmentFile = document.getElementById('assignmentFile');
            var startingDate = document.getElementById('startingDate');
            var endDate = document.getElementById('endDate');

            if (assignmentGrade.value == "0") {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: "It's Look Like You Aren't Select A Grade"
                });
            }
            else {
                if (assignmentClass.value == "0") {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: "It's Look Like You Aren't Select A Class"
                    });
                }
                else {
                    if (assignmentSubject.value == "0") {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Oops...',
                            text: "It's Look Like You Aren't Select A Subject"
                        });
                    }
                    else {
                        if (assignmentHeading.value.trim() == "") {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Oops...',
                                text: "It's Look Like You Aren't Fill Assignment Heading"
                            });
                        }
                        else if (assignmentCode.value.trim() == "") {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Oops...',
                                text: "It's Look Like You Aren't Fill Assignment Code"
                            });
                        }
                        else if (assignmentDescription.value.trim() == "") {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Oops...',
                                text: "It's Look Like You Aren't Fill Assignment Description"
                            });
                        }
                        else if (assignmentFile.value == "") {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Oops...',
                                text: "It's Look Like You Aren't Attach Assignment File"
                            });
                        }
                        else if (startingDate.value == "") {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Oops...',
                                text: "It's Look Like You Aren't Fill Assignment Starting Date"
                            });
                        }
                        else if (endDate.value == "") {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Oops...',
                                text: "It's Look Like You Aren't Fill Assignment Ending Date"
                            });
                        }
                        else {
                            var req = new XMLHttpRequest();

                            var form = new FormData();

                            form.append("assignmentGrade", assignmentGrade.value);
                            form.append("assignmentClass", assignmentClass.value);
                            form.append("assignmentSubject", assignmentSubject.value);
                            form.append("assignmentHeading", assignmentHeading.value);
                            form.append("assignmentCode", assignmentCode.value);
                            form.append("assignmentDescription", assignmentDescription.value);
                            form.append("assignmentFile", assignmentFile.files[0]);
                            form.append("startingDate", startingDate.value);
                            form.append("endDate", endDate.value);

                            req.onreadystatechange = function () {
                                // add debugging part here
                                if (req.readyState == 4) {
                                    if (req.status == 200) {
                                        if (req.responseText == 'error') {
                                            Swal.fire({
                                                icon: 'warning',
                                                title: 'Sorry..',
                                                text: "You can upload only PDF files"
                                            });
                                        }
                                        else if (req.responseText == 'notMoved') {
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Error',
                                                text: "Internel Server Error",
                                                footer: "<a href='http://wa.me/94701189971'>Contact Developers Here</a>"
                                            });
                                        }
                                        else {
                                            Swal.fire({
                                                position: 'top-end',
                                                icon: 'success',
                                                title: 'Assignment Submited Successfully',
                                                showConfirmButton: false,
                                                timer: 1500
                                            })
                                        }
                                    }
                                    else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Error',
                                            text: "Internel Server Error",
                                            footer: "<a href='http://wa.me/94701189971'>Contact Developers Here</a>"
                                        });
                                    }
                                }

                            }

                            req.open("POST", "process/saveAssignment.php", true);
                            req.send(form);
                        }
                    }
                }
            }

        }

        function searchAssignment() {
            var selectGrade = document.getElementById("searchByGrade");
            var selectClass = document.getElementById("searchByClass");

            if (selectClass.value == 0 | selectGrade.value == 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'WARNING',
                    text: "You Must Select A Grade And Class First"
                });
            }
            else {

                var f = new FormData();
                f.append("grade", selectGrade.value);
                f.append("class", selectClass.value);

                var req = new XMLHttpRequest();
                req.onreadystatechange = function () {
                    if (req.readyState == 4) {
                        if (req.status == 200) {
                            // manage output here
                            var r = req.responseText;
                            if (r == "noData") {
                                document.getElementById('outputTable').innerHTML = '';
                                Swal.fire({
                                    icon: 'info',
                                    title: 'WARNING',
                                    text: "DATA NOT EXIST"
                                });
                            }
                            else {
                                document.getElementById('outputTable').innerHTML = r;
                            }
                        }
                        else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: "Internel Server Error",
                                footer: "<a href='http://wa.me/94701189971'>Contact Developers Here</a>"
                            });
                        }
                    }
                }

                req.open("POST", "process/searchAssignment.php", true);
                req.send(f);
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
                    }
                    else {
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

            if (marksInput.value.trim() == '') {
                Swal.fire({
                    icon: 'info',
                    title: 'WARNING',
                    text: "Please Enter Marks And Press Submit"
                });
            }
            else {
                var marks = marksInput.value;
                var r = new XMLHttpRequest();

                r.onreadystatechange = function () {
                    if (r.readyState == 4) {
                        if (r.status == 200) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Marks Added Successfully',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                        else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: "Internel Server Error",
                                footer: "<a href='http://wa.me/94701189971'>Contact Developers Here</a>"
                            });
                        }
                    }
                }

                r.open("GET", "process/assignmentMarks.php?marks=" + marks + "&dbid=" + dbId + "", true);
                r.send();
            }
        }
    </script>
</body>

</html>