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

        .space {
            white-space: nowrap;
        }
    </style>

</head>

<body style="background:#f2f2f2;">
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
                        <div class="bg-secondary rounded p-4">
                            <h3 class="mb-4 text-dark">ADD MARKS</h3>

                            <div class="row">
                                <div class="col-12 col-md-6 mt-1 mb-3">
                                    <div class="input-group">
                                        <label class="input-group-text" for="inputGroupSelect01">Select a Year</label>
                                        <select class="form-select bg-secondary text-dark" onchange="getStudents();" id="marksYear">
                                            <option selected value="0">Choose a Year...</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 mt-1 mb-3">
                                    <div class="input-group">
                                        <label class="input-group-text" for="inputGroupSelect01">Select a Term</label>
                                        <select class="form-select bg-secondary text-dark" onchange="getStudents();" id="marksTerm">
                                            <option selected value="0">Choose a Term...</option>
                                            <option value="1">First Term</option>
                                            <option value="2">Second Term</option>
                                            <option value="3">Third Term</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control bg-secondary text-dark" id="searching" onkeyup="filterStudents();" placeholder="name@example.com">
                                <label for="floatingInput">Search by student Name</label>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered" id="studentTable">
                                    <thead class="table-dark" id="tHead">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Name</th>
                                            @foreach ($subjects as $subject)
                                            <th scope="col">{{ $subject }}</th>
                                            @endforeach
                                            <th scope="col">Submit</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tBody">
                                        @foreach ($students as $key => $student)
                                        <tr id="row{{ $student['_id'] }}">
                                            <th>{{ $key + 1 }}</th>
                                            <td class="space">{{ $student["initial_name"] }}</td>
                                            @foreach ($subjects as $subject)
                                            <td>
                                                <input type="number" id="{{ $student['_id'] . $subject }}" />
                                            </td>
                                            @endforeach
                                            <td>
                                                <button class="btn btn-success" data-id="{{ $student['_id'] }}" onclick="addMarks(this);">Add</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="bg-secondary rounded p-4 mt-3">
                            <div class="col-12">
                                <div class="row">
                                    <h3 class="text-dark">Modify Marks</h3>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6 mt-md-0 col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control bg-secondary text-dark" id="index" placeholder="name@example.com">
                                            <label for="floatingInput">Student Registration Number</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mt-md-0 mt-3">
                                        <div class="form-floating">
                                            <select class="form-select bg-secondary text-dark" onchange="getSubjects();" id="year" aria-label="Floating label select example">
                                                <option selected value="0">Open this select menu</option>

                                            </select>
                                            <label for="floatingSelect">Select A Year</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mt-md-0 mt-3">
                                        <div class="form-floating">
                                            <select class="form-select bg-secondary text-dark" id="term" aria-label="Floating label select example">
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
                                            <select class="form-select bg-secondary text-dark" id="subjectList" aria-label="Floating label select example">
                                                <option selected value="0">Open this select menu</option>

                                            </select>
                                            <label for="floatingSelect">Select A Subject</label>
                                        </div>
                                    </div>

                                    <div class="d-grid gap-2 col-6 mx-auto mt-3">
                                        <button class="btn btn-primary" type="button" onclick="searchMarks();">Search</button>
                                    </div>

                                    <div class="row mt-3 d-none" id="resultContainer">
                                        <h6 class="text-dark">Searched Result</h6>
                                        <div class="col-12 col-md-6 mb-3 mb-md-0">
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text">Current Marks</span>
                                                <input type="text" id="currentMarks" class="form-control bg-secondary text-dark" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping" value="Ex: 65" disabled>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text">Enter New Marks</span>
                                                <input type="text" id="newMarks" class="form-control bg-secondary text-dark" aria-label="Username" aria-describedby="addon-wrapping" placeholder="Ex: 80">
                                            </div>
                                        </div>
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                                            <button class="btn btn-outline-danger me-md-2" type="button" data-id="0" id="updateButton" data-subject='0' onclick="updateMarks();">Update</button>
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
        var subjects = @json($subjects);

        var currentDate = new Date();
        var currentYear = currentDate.getFullYear();

        var pastYearoption = document.createElement('option');
        pastYearoption.innerHTML = currentYear - 1;
        const extraPastYear = document.createElement('option');
        extraPastYear.innerHTML = currentYear - 1;

        var currentYearOption = document.createElement('option');
        currentYearOption.innerHTML = currentYear;
        const extraCurrentYear = document.createElement("option");
        extraCurrentYear.innerHTML = currentYear;

        var selecter = document.getElementById("marksYear");
        selecter.appendChild(extraPastYear);
        selecter.appendChild(extraCurrentYear);

        const yearList = document.getElementById("year");
        yearList.appendChild(pastYearoption);
        yearList.appendChild(currentYearOption);

        const subjectList = document.getElementById("subjectList");
        subjects.forEach(subject => {
            var item = document.createElement("option");
            item.innerHTML = subject;
            subjectList.appendChild(item);
        });

        function getSubjects() {
            const year = document.getElementById("year");
            if(year.value != "0") {
                var form = new FormData();
                form.append("year", year.value);
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if(xhr.readyState == 4 && xhr.status == 200) {
                        var subjects = JSON.parse(xhr.responseText);
                        subjectList.innerHTML = '';
                        const row = document.createElement("option");
                        row.innerHTML = "Open this select menu";
                        subjectList.appendChild(row);
                        subjects.forEach(subject => {
                            var item = document.createElement("option");
                            item.innerHTML = subject;
                            subjectList.appendChild(item);
                        });
                    }
                }

                xhr.open("POST", "{{ route('get.subjects') }}");
                xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
                xhr.send(form);
            }
        }
        function updateMarks() {
            const button = document.getElementById("updateButton");
            const newMarks = document.getElementById("newMarks");

            if (newMarks.value < 0 || newMarks.value > 100 || newMarks.value.trim() == '') {
                Swal.fire(
                    'WARNING',
                    'Please Enter Correct Marks',
                    'warning'
                );
                newMarks.classList.add('is-invalid');
            } else {
                newMarks.classList.remove('is-invalid');
                var form = new FormData();
                form.append("id", button.dataset.id);
                form.append("subject", button.dataset.subject);
                form.append("marks", newMarks.value);
                form.append("currentMarks", document.getElementById("currentMarks").value);

                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
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

                xhr.open("POST", "{{ route('update.marks') }}");
                xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
                xhr.send(form);
            }

        }

        function getStudents() {
            let term = document.getElementById("marksTerm").value;
            let year = document.getElementById("marksYear").value;
            const spinner = document.getElementById("spinner");

            if (term != 0 && year != 0) {
                var form = new FormData();
                form.append("year", year);
                form.append("term", term);
                spinner.classList.add("show");

                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4) {
                        if (xhr.status == 200) {
                            // handle output
                            var response = JSON.parse(xhr.responseText);
                            if (response.students.length <= 0) {
                                document.getElementById("tBody").innerHTML = '';
                                let SelectATermRow = document.createElement("tr");
                                let SelectTermCol = document.createElement("th");
                                SelectTermCol.innerHTML = "There's No UnMarked Students To Add Marks";
                                SelectTermCol.style.color = "red";
                                SelectTermCol.colSpan = subjects.length + 3;
                                SelectATermRow.style.backgroundColor = "orange";
                                SelectATermRow.appendChild(SelectTermCol);
                                document.getElementById("tBody").appendChild(SelectATermRow);
                            } else {
                                document.getElementById('tBody').innerHTML = '';
                                let num = 1;
                                response.students.forEach(student => {
                                    document.getElementById("tHead").innerHTML = '';

                                    const newRow = document.createElement("tr");
                                    newRow.id = 'row' + student["_id"];

                                    const headRow = document.createElement("tr");

                                    const NoCol = document.createElement("th");
                                    const NoHead = document.createElement("th");
                                    NoHead.innerHTML = "No";
                                    NoCol.innerHTML = num;
                                    newRow.appendChild(NoCol);
                                    headRow.appendChild(NoHead);

                                    const nameCol = document.createElement("td");
                                    const nameHead = document.createElement("th");
                                    nameCol.innerHTML = student.initial_name;
                                    nameCol.classList.add('space');
                                    nameHead.innerHTML = "Name";
                                    newRow.appendChild(nameCol);
                                    headRow.appendChild(nameHead);

                                    response.subjects.forEach(subject => {
                                        var subjectCol = document.createElement("td");
                                        var subjectHead = document.createElement("th");
                                        subjectHead.innerHTML = subject;

                                        var subjectInput = document.createElement("input");
                                        subjectInput.id = student._id + subject;
                                        subjectCol.appendChild(subjectInput);
                                        headRow.appendChild(subjectHead);
                                        newRow.appendChild(subjectCol);
                                    });

                                    const buttonCol = document.createElement("td");
                                    const buttonHead = document.createElement("th");
                                    buttonHead.innerHTML = "Submit";
                                    const button = document.createElement("button")
                                    button.classList.add("btn", "btn-success");
                                    button.innerHTML = 'add';
                                    button.dataset.id = student["_id"];
                                    button.onclick = function() {
                                        addMarks(this);
                                    }

                                    buttonCol.appendChild(button);
                                    newRow.appendChild(buttonCol);
                                    headRow.appendChild(buttonHead);

                                    document.getElementById('tBody').appendChild(newRow);
                                    document.getElementById("tHead").appendChild(headRow);
                                    subjects = response.subjects;
                                    num = num + 1;
                                });
                            }
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
                };

                xhr.open("POST", "{{ route('filter.student.for.marks') }}");
                xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
                xhr.send(form);
            } else {
                document.getElementById("tBody").innerHTML = '';
                let SelectATermRow = document.createElement("tr");
                let SelectTermCol = document.createElement("th");
                SelectTermCol.innerHTML = "Please Select A Year And Term";
                SelectTermCol.style.color = "red";
                SelectTermCol.colSpan = subjects.length + 3;
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
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        function addMarks(Button) {
            var id = Button.dataset.id;
            var year = document.getElementById("marksYear").value;
            var term = document.getElementById("marksTerm").value;

            if (year == '0' || term == '0') {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: "Please Select Year And Term",
                });
            } else {
                isFilled = true;
                var marksRegex = /^(?:100(?:\.0{1,2})?|\d{1,2}(?:\.\d{1,2})?)$/;
                const marksObject = {
                    "id": id,
                    "subjects": subjects,
                    "year": year,
                    "term": term,
                };
                subjects.forEach(subject => {
                    var marks = document.getElementById(id + subject).value;
                    if (!marksRegex.test(marks)) {
                        isFilled = false;
                    } else {
                        marksObject[subject] = marks
                    }
                });

                if (isFilled) {
                    var xhr = new XMLHttpRequest();
                    var form = new FormData();
                    form.append("data", JSON.stringify(marksObject));

                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            document.getElementById("row" + id).classList.add("d-none");
                        }
                    }

                    xhr.open("POST", "{{ route('add.marks') }}");
                    xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
                    xhr.send(form);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: "Please Double Check Marks again",
                    });
                }
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
            } else {
                var form = new FormData();
                form.append('index', index.value);
                form.append('year', year.value);
                form.append('term', term.value);
                form.append('subject', subject.value);

                const container = document.getElementById("resultContainer");

                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.status == "noData") {
                            Swal.fire(
                                'ERROR',
                                'No Data With Given Details',
                                'error'
                            )
                            container.classList.add("d-none");
                        } else {
                            container.classList.remove('d-none');
                            document.getElementById("currentMarks").value = response.marks;
                            document.getElementById("updateButton").dataset.id = response.id;
                            document.getElementById("updateButton").dataset.subject = subject.value;
                        }
                    }
                }

                xhr.open("POST", "{{ route('get.marks.for.update') }}");
                xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
                xhr.send(form);
            }
        }
    </script>
</body>

</html>