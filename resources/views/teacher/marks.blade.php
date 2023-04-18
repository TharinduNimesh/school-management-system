<!DOCTYPE html>
<html lang="en">

<head>
    @include('teacher.components.head')
    <script>
        function teacherDoesNotHaveAClass() {
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: "It's Look Like You Don't Have Permission"
            })
        }
    </script>
    <style>
        table input {
            width: 80px;
        }
    </style>

</head>

<body onload="loadSubjects(); listSubject();" style="background:#f2f2f2;">
    <div class="container-fluid position-relative d-flex p-0">
        @include('public_components.spinner')

        @include('teacher.components.hamburger')
        <!-- Content Start -->
        <div class="content">
            @include('teacher.components.navbar')

            <!-- marks Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row">
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h3 class="mb-4 text-dark">ADD MARKS</h3>

                            <div class="row">
                                <div class="col-12 col-md-6 mt-1 mb-3">
                                    <div class="input-group">
                                        <label class="input-group-text" for="inputGroupSelect01">Select a Year</label>
                                        <select class="form-select bg-secondary text-dark" id="marksYear"
                                            onchange="getStudents();">
                                            <option selected value="0">Choose a Year...</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 mt-1 mb-3">
                                    <div class="input-group">
                                        <label class="input-group-text" for="inputGroupSelect01">Select a Term</label>
                                        <select class="form-select bg-secondary text-dark" id="marksTerm"
                                            onchange="getStudents();">
                                            <option selected value="0">Choose a Term...</option>
                                            <option value="1">First Term</option>
                                            <option value="2">Second Term</option>
                                            <option value="3">Third Term</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control bg-secondary text-dark" id="searching"
                                    onkeyup="filterStudents();" placeholder="name@example.com">
                                <label for="floatingInput">Search by student Name</label>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered" id="studentTable">
                                    <thead class="table-dark" id="tHead">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Sinhala</th>
                                            <th scope="col">English</th>
                                            <th scope="col">Submit</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tBody">

                                    </tbody>
                                </table>
                            </div>

                            <div class="col-12 mt-5">
                                <div class="row">
                                    <h3 class="text-dark">Modify Marks</h3>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6 mt-md-0 col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control bg-secondary text-dark" id="index"
                                                placeholder="name@example.com">
                                            <label for="floatingInput">Student Registration Number</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mt-md-0 mt-3">
                                        <div class="form-floating">
                                            <select class="form-select bg-secondary text-dark" id="year"
                                                aria-label="Floating label select example">
                                                <option selected value="0">Open this select menu</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                            </select>
                                            <label for="floatingSelect">Select A Year</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mt-md-0 mt-3">
                                        <div class="form-floating">
                                            <select class="form-select bg-secondary text-dark" id="term"
                                                aria-label="Floating label select example">
                                                <option selected value="0">Open this select menu</option>
                                                <option value="1">First Term</option>
                                                <option value="2">Second Term</option>
                                                <option value="3">Third Term</option>
                                            </select>
                                            <label for="floatingSelect">Select A Term</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mt-md-0 mt-3">
                                        <div class="form-floating">
                                            <select class="form-select bg-secondary text-dark" id="subjectList"
                                                aria-label="Floating label select example">
                                                <option selected value="0">Open this select menu</option>

                                            </select>
                                            <label for="floatingSelect">Select A Subject</label>
                                        </div>
                                    </div>

                                    <div class="d-grid gap-2 col-6 mx-auto mt-3">
                                        <button class="btn btn-primary" type="button"
                                            onclick="searchMarks();">Search</button>
                                    </div>

                                    <div class="row mt-3 d-none" id="resultContainer">
                                        <h6 class="text-dark">Searched Result</h6>
                                        <div class="col-12 col-md-6 mb-3 mb-md-0">
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text">Current Marks</span>
                                                <input type="text" id="currentMarks"
                                                    class="form-control bg-secondary text-dark" placeholder="Username"
                                                    aria-label="Username" aria-describedby="addon-wrapping"
                                                    value="Ex: 65" disabled>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text">Enter New Marks</span>
                                                <input type="text"  id="newMarks" class="form-control bg-secondary text-dark"
                                                    aria-label="Username" aria-describedby="addon-wrapping"
                                                    placeholder="Ex: 80">
                                            </div>
                                        </div>
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                                            <button class="btn btn-outline-danger me-md-2" type="button" data-id="0"
                                                id="updateButton" data-subject='0'
                                                onclick="updateMarks();">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form End -->

            @include('public_components.footer')
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    </div>

    @include('public_components.js')
    <script>
        hamburger('marks');
        function updateMarks() {
            const button = document.getElementById("updateButton");
            const newMarks = document.getElementById("newMarks");
            
            if (newMarks.value < 0 || newMarks.value > 100) {
                Swal.fire(
                    'WARNING',
                    'Please Enter Correct Marks',
                    'warning'
                );
                newMarks.classList.add('is-invalid');
            }
            else {
                newMarks.classList.remove('is-invalid');
                var form = new FormData();
                form.append("id", button.dataset.id);
                form.append("subject", button.dataset.subject);
                form.append("marks", newMarks.value);
                form.append("currentMarks", document.getElementById("currentMarks").value);
                form.append("total", button.dataset.total);

                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // handle response
                        document.getElementById("resultContainer").classList.add("d-none");
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Marks Updated Successfully',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                }

                xhr.open("POST", "process/updateMarks.php", true);
                xhr.send(form);
            }

        }

        var lengthForTable;
        var subjects;
        function loadSubjects() {
            let kids = ["No", "Name", "Sinhala", "Maths", "English", "Tamil", "Buddhism", "Environment", "Submit"];
            let middle = ["No", "Name", "Sinhala", "Maths", "English", "Science", "Tamil", "Buddhism", "History", "Geography", "Esthetics", "Civics", "Health", "PTS", "Submit"];
            let ol = ["No", "Name", "Sinhala", "Maths", "English", "Science", "Buddhism", "History", "Bucket1", "Bucket2", "Bucket3", "Submit"];
            let al = ["No", "Name", "Bucket1", "Bucket2", "Bucket3", "English", "GIT", "Submit"];

            let tHead = document.getElementById("tHead");
            tHead.innerHTML = '';
            let row = document.createElement("tr");
            var myRow;
            if (grade <= 5) {
                myRow = kids;
            }
            else if (grade <= 9) {
                myRow = middle;
            }
            else if (grade <= 11) {
                myRow = ol;
            }
            else if (grade <= 13) {
                myRow = al;
            }
            lengthForTable = myRow.length;
            subjects = myRow;
            for (let i = 0; i < myRow.length; i++) {
                let col = document.createElement("th");
                col.innerHTML = myRow[i];
                row.appendChild(col);
            }
            tHead.appendChild(row);
            let SelectATermRow = document.createElement("tr");
            let SelectTermCol = document.createElement("th");
            SelectTermCol.innerHTML = "Please Select A Year And Term";
            SelectTermCol.style.color = "red";
            SelectTermCol.colSpan = myRow.length;
            SelectATermRow.style.backgroundColor = "orange";
            SelectATermRow.appendChild(SelectTermCol);
            document.getElementById("tBody").appendChild(SelectATermRow);
        }

        function getStudents() {
            let term = document.getElementById("marksTerm").value;
            let year = document.getElementById("marksYear").value;
            if (term != 0 && year != 0) {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4) {
                        if (xhr.status == 200) {
                            // handle output
                            let response = JSON.parse(xhr.responseText);
                            if (response[0].status == 'success') {
                                document.getElementById("tBody").innerHTML = '';
                                for (let i = 0; i < response.length; i++) {
                                    let row = document.createElement("tr");
                                    row.id = 'row' + response[i].data.id;
                                    for (let a = 0; a < lengthForTable; a++) {
                                        var col = document.createElement("td");
                                        col.classList.add("text-dark");
                                        if (a == 0) {
                                            col.innerHTML = i + 1;
                                        }
                                        else if (a == 1) {
                                            col.style.whiteSpace = "nowrap";
                                            col.innerHTML = response[i].data.full_name;
                                        }
                                        else if (a == lengthForTable - 1) {
                                            var btn = document.createElement("button");
                                            btn.classList.add("btn");
                                            btn.classList.add("btn-primary");
                                            btn.innerHTML = "Add";
                                            btn.dataset.did = response[i].data.id;
                                            btn.onclick = function () {
                                                addMarks(this);
                                            };
                                            col.appendChild(btn);
                                        }
                                        else {
                                            var input = document.createElement("input");
                                            input.type = "number";
                                            input.id = subjects[a] + response[i].data.id;
                                            col.appendChild(input);
                                        }
                                        row.appendChild(col);
                                    }
                                    document.getElementById("tBody").appendChild(row);
                                }
                            }
                            else {
                                document.getElementById("tBody").innerHTML = '';
                                let SelectATermRow = document.createElement("tr");
                                let SelectTermCol = document.createElement("th");
                                SelectTermCol.innerHTML = "You Cannot Add Marks For Selected Year And Term";
                                SelectTermCol.style.color = "red";
                                SelectTermCol.colSpan = lengthForTable;
                                SelectATermRow.style.backgroundColor = "orange";
                                SelectATermRow.appendChild(SelectTermCol);
                                document.getElementById("tBody").appendChild(SelectATermRow);
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
                };

                xhr.open("GET", "process/searchByTerm.php?term=" + term + "&year=" + year + "", true);
                xhr.send();
            }
            else {
                document.getElementById("tBody").innerHTML = '';
                let SelectATermRow = document.createElement("tr");
                let SelectTermCol = document.createElement("th");
                SelectTermCol.innerHTML = "Please Select A Year And Term";
                SelectTermCol.style.color = "red";
                SelectTermCol.colSpan = lengthForTable;
                SelectATermRow.style.backgroundColor = "orange";
                SelectATermRow.appendChild(SelectTermCol);
                document.getElementById("tBody").appendChild(SelectATermRow);
            }
        }

        function filterStudents() {
            let input, filter, table, tr, td, txtValue;

            // initialize variables

            input = document.getElementById("searching");
            filter = input.value.toUpperCase();
            table = document.getElementById("studentTable");
            tr = table.getElementsByTagName("tr");

            for (let i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
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

        function addMarks(Button) {
            var did = Button.dataset.did;
            var term = document.getElementById("marksTerm").value;

            var kidsSubjects = ["Sinhala", "Maths", "English", "Tamil", "Buddhism", "Environment"];
            var middleSubjects = ["Sinhala", "Maths", "English", "Science", "Tamil", "Buddhism", "History", "Geography", "Esthetics", "Civics", "Health", "PTS"];
            var olSubjects = ["Sinhala", "Maths", "English", "Science", "Buddhism", "History", "Bucket1", "Bucket2", "Bucket3"];
            var alSubjects = ["Bucket1", "Bucket2", "Bucket3", "English", "GIT", "General_knowledge"];

            var SubjectRow;
            if (grade <= 5) {
                SubjectRow = kidsSubjects;
            }
            else if (grade <= 9) {
                SubjectRow = middleSubjects;
            }
            else if (grade <= 11) {
                SubjectRow = olSubjects;
            }
            else if (grade <= 13) {
                SubjectRow = alSubjects;
            }

            var requestOBJ = {
                "detailsId": did,
                "term": term,
            };
            var filled = true;
            try {
                for (var i = 0; i < SubjectRow.length; i++) {
                    var subject = document.getElementById(SubjectRow[i] + did);
                    var regex = /^(100|\d?\d(\.\d+)?)$/;
                    if (subject.value == '' || subject.value < 0 || !regex.test(subject.value)) {
                        filled = false;
                    }
                    else {
                        requestOBJ[SubjectRow[i].toLowerCase()] = subject.value;
                    }
                }
            }
            catch {
                alert("Error");
            }

            if (filled) {
                var json = JSON.stringify(requestOBJ);
                var xhr = new XMLHttpRequest();
                var form = new FormData();
                form.append("json", json);

                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        document.getElementById("row" + did).classList.add("d-none");
                    }
                }

                xhr.open("POST", "process/saveMarks.php", true);
                xhr.send(form);
            }
            else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: "Please Double Check Marks again",
                });
            }
        }

        function listSubject() {
            var kidsSubjects = ["Sinhala", "Maths", "English", "Tamil", "Buddhism", "Environment"];
            var middleSubjects = ["Sinhala", "Maths", "English", "Science", "Tamil", "Buddhism", "History", "Geography", "Esthetics", "Civics", "Health", "PTS"];
            var olSubjects = ["Sinhala", "Maths", "English", "Science", "Buddhism", "History", "Bucket1", "Bucket2", "Bucket3"];
            var alSubjects = ["Bucket1", "Bucket2", "Bucket3", "English", "GIT", "General_knowledge"];

            var SubjectRow;
            if (grade <= 5) {
                SubjectRow = kidsSubjects;
            }
            else if (grade <= 9) {
                SubjectRow = middleSubjects;
            }
            else if (grade <= 11) {
                SubjectRow = olSubjects;
            }
            else if (grade <= 13) {
                SubjectRow = alSubjects;
            }

            for (let i = 0; i < SubjectRow.length; i++) {
                var option = document.createElement("option");
                option.value = SubjectRow[i];
                option.innerHTML = SubjectRow[i];
                document.getElementById("subjectList").appendChild(option)
            }
        }

        function searchMarks() {
            const index = document.getElementById("index");
            const year = document.getElementById("year");
            const term = document.getElementById("term")
            const subject = document.getElementById("subjectList");

            if (index.value.trim() == '' || year.value == '0' || term.value == '0' || subject.value == '') {
                Swal.fire(
                    'WARNING',
                    'Please fill all text field before searching',
                    'warning'
                )
            }
            else {
                var form = new FormData();
                form.append('index', index.value);
                form.append('year', year.value);
                form.append('term', term.value);
                form.append('subject', subject.value.toLowerCase());

                const container = document.getElementById("resultContainer");

                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.status == "noData") {
                            Swal.fire(
                                'ERROR',
                                'No Data With Given Details',
                                'error'
                            )
                            container.classList.add("d-none");
                        }
                        else {
                            container.classList.remove('d-none');
                            document.getElementById("currentMarks").value = response.marks;
                            document.getElementById("updateButton").dataset.id = response.id;
                            document.getElementById("updateButton").dataset.subject = subject.value.toLowerCase();
                            document.getElementById("updateButton").dataset.total = response.total;
                        }
                    }
                }

                xhr.open("POST", "process/searchMarksToUpdate.php", true);
                xhr.send(form);
            }
        }
    </script>
</body>

</html>