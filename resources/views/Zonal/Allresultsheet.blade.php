<!DOCTYPE html>
<html lang="en">

<head>
    @include('zonal.components.head')
    <style>
        .space {
            white-space: nowrap;
        }
    </style>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        @include('public_components.spinner')

        @include('zonal.components.hamburger')

        <!-- Content Start -->
        <div class="content">
            @include('zonal.components.navbar')

            <!--Search Start-->
            <div class="container-fluid pt-4 px-4">
                <div class="col-sm-12 col-xl-12">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h3 class="mb-4 text-dark">Search</h3>            
                        <div class="row g-2">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-floating">
                                    <select class="form-select bg-secondary text-dark" id="term"
                                        aria-label="Floating label select example">
                                        <option selected value="0">Select a School</option>
                                        <option value="1">school 1</option>
                                        <option value="2">school 2</option>
                                        <option value="3">school 3</option>
                                    </select>
                                    <label for="floatingSelect">Term List</label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-floating">
                                    <select class="form-select bg-secondary text-dark" id="year"
                                        aria-label="Floating label select example">
                                        <option selected value="0">Select a Year</option>
                                        {{-- @foreach ($years as $year)
                                        <option>{{ $year }}</option>
                                        @endforeach --}}
                                    </select>
                                    <label for="floatingSelect">Year List</label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
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
                            <div class="col-sm-12 col-md-6">
                                <div class="form-floating">
                                    <select class="form-select bg-secondary text-dark" id="grade"
                                        aria-label="Floating label select example">
                                        <option selected value="0">Select a Grade</option>
                                        @for ($i=1; $i<14; $i++) <option>{{ $i }}</option>
                                            @endfor
                                    </select>
                                    <label for="floatingSelect">Grade List</label>
                                </div>
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto mt-3">
                                <button type="submit" class="btn btn-primary col-sm-12 col-xl-12">Search<i
                                        class="bi bi-search ms-2"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Search End-->


            <!--table Start-->
            <div class="container-fluid pt-4 px-4">
                <div class="col-sm-12 col-xl-12">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h3 class="mb-4 text-dark">Mark Details</h3>
                        <div class="table-responsive">
                            <table class="table text-start align-middle table-bordered table-hover mb-0"
                                id="studentTable">
                                <thead id="tableHead">
                                    <tr class="text-dark" id="headRow">
                                        <th scope="col">No</th>
                                        <th scope="col">class</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Sinhala</th>
                                        <th scope="col">Maths</th>
                                        <th scope="col">History</th>
                                        <th scope="col">Science</th>
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
            </div>
            <!--table End-->

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
            const headerRow = document.getElementById('headRow');
            const tableBody = document.getElementById("tableBody");
            const spinner = document.getElementById("spinner");
            tableBody.innerHTML = '';
            headerRow.innerHTML = '';

            if (year.value == 0 || year.value == 0 || grade.value == 0 || Myclass.value == 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'WARNING',
                    text: "Check All Selectors Before Search",
                });
            }
            else {
                spinner.classList.add("show");
                var form = new FormData();
                form.append("year", year.value);
                form.append("term", term.value);
                form.append("class", Myclass.value);
                form.append("grade", grade.value);

                var req = new XMLHttpRequest();
                var tbody = document.getElementById("tableBody");
                req.onreadystatechange = function () {
                    if (req.readyState == 4 && req.status == 200) {
                        var response = JSON.parse(req.responseText);

                        const Indexcol = document.createElement("th");
                        Indexcol.innerHTML = "Index Number";
                        Indexcol.classList.add("space");
                        headerRow.appendChild(Indexcol);

                        const NameCol = document.createElement("th");
                        NameCol.innerHTML = "Name";
                        headerRow.appendChild(NameCol);

                        response.subjects.forEach(subject => {
                            var subCol = document.createElement("th");
                            subCol.innerHTML = subject;
                            headerRow.appendChild(subCol);
                        });

                        const TotalCol = document.createElement("th");
                        TotalCol.innerHTML = "Total";
                        headerRow.appendChild(TotalCol);

                        const placeCol = document.createElement("th");
                        placeCol.innerHTML = "Place"
                        headerRow.appendChild(placeCol);

                        if (response.marks.length == 0) {
                            const columnCount = headerRow.cells.length;
                            var row = document.createElement("tr");
                            var col = document.createElement("th");
                            col.innerHTML = "No Mark To Show";
                            col.colSpan = columnCount;
                            col.style.color = "red";
                            col.style.backgroundColor = "orange"
                            row.appendChild(col);
                            tableBody.appendChild(row);
                        } else {
                            // console.log(response.marks);
                            for (let i = 0; i < Object.keys(response.marks).length; i++) {
                                const newRow = document.createElement('tr');

                                const index = document.createElement('td');
                                index.innerHTML = response.marks[i].index;
                                newRow.appendChild(index);

                                const name = document.createElement("td");
                                name.innerHTML = response.marks[i].name;
                                name.classList.add('space');
                                newRow.appendChild(name);

                                response.marks[i].marks.forEach(points => {
                                    var marks = document.createElement("td");
                                    marks.innerHTML = points.marks;
                                    if (points.marks < 40) {
                                        marks.style.color = "red";
                                    } else if (points.marks == 'ab') {
                                        marks.style.backgroundColor = "red";
                                        marks.style.color = "white";
                                        marks.style.fontWeight = "bold";
                                    }

                                    newRow.appendChild(marks);
                                });

                                const total = document.createElement("td");
                                total.innerHTML = response.marks[i].total;
                                newRow.appendChild(total);

                                const place = document.createElement("td");
                                place.innerHTML = i + 1;
                                newRow.appendChild(place);

                                tableBody.appendChild(newRow);
                            }
                        }

                        spinner.classList.remove("show");
                    }
                };

                req.open("POST", "{{ route('teacher.search.marks') }}");
                req.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
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