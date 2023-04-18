<!DOCTYPE html>
<html lang="en">

<head>
    @include('teacher.components.head')
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        @include('public_components.spinner')

        @include('teacher.components.hamburger')

        <!-- Content Start -->
        <div class="content">
            @include('teacher.components.navbar')

            <!--table start-->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h3 class="mb-0 text-dark">Marks Summary</h3>
                    </div>
                    <div class="row p-3 align-items-center">
                        <div class="col-6">
                            <div class="form-floating">
                                <select class="form-select bg-secondary text-dark" id="year"
                                    aria-label="Floating label select example">
                                    <option selected value="0">Select a Year</option>
                                    <option>2022</option>
                                    <option>2023</option>
                                    <option>2024</option>
                                </select>
                                <label for="floatingSelect">Year List</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating">
                                <select class="form-select bg-secondary text-dark" id="term"
                                    aria-label="Floating label select example">
                                    <option selected value="0">Select a Term</option>
                                    <option value="1">First Term</option>
                                    <option value="2">Second Term</option>
                                    <option value="3">Third Term</option>
                                </select>
                                <label for="floatingSelect">Term List</label>
                            </div>
                        </div>
                    </div>
                    <div class="row p-3 align-items-center">
                        <div class="col-6">
                            <div class="form-floating">
                                <select class="form-select bg-secondary text-dark" id="grade"
                                    aria-label="Floating label select example">
                                    <option selected value="0">Select a Grade</option>
                                    @for ($i=1; $i<14; $i++)
                                        <option>{{ $i }}</option>
                                    @endfor
                                </select>
                                <label for="floatingSelect">Grade List</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating">
                                <select class="form-select bg-secondary text-dark" id="class"
                                    aria-label="Floating label select example">
                                    <option selected value="0">Select a Class</option>
                                    @php
                                        $classes = ["A", "B", "C", "D", "E", "F", "G", "H"];
                                    @endphp

                                    @foreach ($classes as $class)
                                        <option>{{ $class }}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">Class List</label>
                            </div>
                        </div>
                        <div class="d-grid gap-2 pt-2">
                            <button class="btn btn-primary" onclick="searchResult();" type="button">Search</button>
                        </div>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control bg-secondary text-dark" id="searching"
                            placeholder="name@example.com" onkeyup="filterStudents();">
                        <label for="floatingInput">Student Name</label>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0" id="studentTable">
                            <thead id="tableHead">
                                <tr class="text-dark">
                                    <th scope="col">Index No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Sinhala</th>
                                    <th scope="col">Maths</th>
                                    <th scope="col">History</th>
                                    <th scope="col">Science</th>
                                    <th scope="col">Total Marks</th>
                                    <th scope="col">Place</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                <tr style="background: orange; color: black;">
                                    <td colspan="8">Search For Details</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--table end-->

            @include('public_components.footer')
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

        @include('public_components.js')
    <script>
        hamburger("result");
        function searchResult() {
            var year = document.getElementById("year");
            var term = document.getElementById("term");
            var grade = document.getElementById("grade");
            var Myclass = document.getElementById("class");

            if (year.value == 0 || year.value == 0 || grade.value == 0 || Myclass.value == 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'WARNING',
                    text: "Check All Selectors Before Search",
                });
            }
            else {
                var form = new FormData();
                form.append("year", year.value);
                form.append("term", term.value);
                form.append("class", Myclass.value);
                form.append("grade", grade.value);

                var kidTable = ["index_number", "name", "Buddhism", "Sinhala", "Maths", "English", "Environment", "Tamil", "Total", "Place"];
                var middleTable = ["index_number", "name", "Buddhism", "Sinhala", "Maths", "English", "Science", "Tamil", "History", "Geography", "Health", "Civics", "ART", "PTS", "Total", "Place"];
                var olTable = ["index_number", "name", "Sinhala", "Maths", "English", "Science", "Buddhism", "History", "Bucket_1", "Bucket_2", "Bucket_3", "Total", "Place"];
                var alTable = ["index_number", "name", "Bucket 1", "Bucket 2", "Bucket 3", "English", "GIT", "Total", "Place"];

                var selected = 0;
                if (grade.value <= 5) {
                    selected = kidTable;
                }
                else if (grade.value <= 9) {
                    selected = middleTable;
                }
                else if (grade.value <= 11) {
                    selected = olTable;
                }
                else if (grade.value <= 13) {
                    selected = alTable;
                }
                else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'ERROR',
                        text: "Refresh And Try Again",
                    });
                }
                var req = new XMLHttpRequest();
                var tbody = document.getElementById("tableBody");
                req.onreadystatechange = function () {
                    if (req.readyState == 4 && req.status == 200) {
                        var response = JSON.parse(req.responseText);
                        if (response.status == 'error') {
                            tbody.innerHTML = '';
                            var row = document.createElement("tr");
                            var col = document.createElement("td");
                            row.style.background = "orange";
                            row.style.textAlign = "center";
                            col.colSpan = selected.length;
                            col.innerHTML = "Data Not Exists";
                            row.appendChild(col);
                            tbody.appendChild(row);
                        }
                        else if (response.status == 'success') {
                            tbody.innerHTML = '';

                            var thead = document.getElementById("tableHead");
                            var headingRow = document.createElement("tr");
                            for (let a = 0; a < selected.length; a++) {
                                let headingColumn = document.createElement("th");
                                headingColumn.innerHTML = selected[a];
                                headingRow.appendChild(headingColumn);
                            }
                            thead.innerHTML = '';
                            thead.appendChild(headingRow);

                            for (let i = 0; i < response.data.length; i++) {
                                var row = document.createElement("tr");
                                for (let c = 0; c < selected.length; c++) {
                                    var cols = document.createElement("td");
                                    if (c == selected.length - 1) {
                                        cols.innerHTML = i + 1;
                                    }
                                    else {
                                        let subject = selected[c].toLowerCase();
                                        cols.innerHTML = response.data[i][subject];
                                        if(response.data[i][subject] < 40) {
                                            cols.style.color = 'red';
                                        }
                                        if (subject == "name") { 
                                            cols.style.whiteSpace = "nowrap";
                                        }
                                    }
                                    row.appendChild(cols);
                                }
                                tbody.appendChild(row);
                            }

                        }
                    }
                };

                req.open("POST", "process/resultSearch.php", true);
                req.send(form);
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
    </script>
</body>

</html>