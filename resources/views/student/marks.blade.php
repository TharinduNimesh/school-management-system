<!DOCTYPE html>
<html lang="en">

<head>
    @include('student.components.head')
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        @include('public_components.spinner')

        @include('student.components.hamburger')


        <!-- Content Start -->
        <div class="content">

            @include('student.components.navbar')

            <!-- marks Start -->
            <div class="container-fluid pt-4 px-4" style="min-height: 80vh;">

                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="input-group  mb-3 mt-3">
                            <label class="input-group-text" for="inputGroupSelect01">Select a Year</label>
                            <select class="form-select bg-secondary text-dark" id="selectedYear">
                                <option selected value="selected">Choose a Year...</option>
                                @foreach($years as $year)
                                    <option>{{ $year }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="input-group mb-3 mt-3 ">
                            <label class="input-group-text" for="inputGroupSelect01">Select a Term</label>
                            <select class="form-select bg-secondary text-dark" id="selectedTerm">
                                <option selected value="selected">Choose a term...</option>
                                <option value="1">First Term</option>
                                <option value="2">Second Term</option>
                                <option value="3">Third Term</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row d-grid">
                    <button type="button" id="search" class="btn btn-primary mb-3 mt-3">Search</button>
                </div>
                <div class="marks-container" id="marks-container">
                    <!-- Marks will appear here -->
                    

                </div>
            </div>


            @include('public_components.footer')
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top z-1"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    @include('public_components.js')
    <script>
        hamburger('marks');

        $("#search").click(function () {
            var year = document.getElementById("selectedYear").value;
            var term = document.getElementById("selectedTerm").value;
            const spinner = document.getElementById("spinner");
            spinner.classList.add('show');
            const container = document.getElementById("marks-container");
            container.innerHTML = '';

            if ((year == "selected") | (term == "selected")) {
                Swal.fire({
                    icon: "warning",
                    title: "WARNING",
                    text: "Please Select A Year And A Term",
                });
                spinner.classList.remove('show');
            } else {
                var form = new FormData();
                form.append("year", year);
                form.append("term", term)

                var request = new XMLHttpRequest();
                request.onreadystatechange = function () {
                    if ((request.readyState == 4) & (request.status == 200)) {
                        var response = request.responseText;
                        if(response == 'noData') {
                            Swal.fire({
                                icon: "warning",
                                title: "WARNING",
                                text: "There Are No Marks For Selected Year And Term",
                            });
                        } else {
                            try {
                                response = JSON.parse(response);
                                    response.marks.forEach(data => {
                                        var col1 = document.createElement("div");
                                        col1.style.height = "50px";
                                        col1.style.borderTopLeftRadius = "8px";
                                        col1.style.borderBottomLeftRadius = "8px";
                                        col1.style.color = "white";
                                        col1.style.fontWeight = "bold";
                                        col1.style.fontSize = "1.2rem";
                                        col1.classList.add("col-md-4", "col-6", "offset-md-2", "d-flex", "justify-content-center", "align-items-center", "bg-dark", "border");
                                        col1.innerText = data.subject;

                                        // Create the second column
                                        var col2 = document.createElement("div");
                                        col2.style.height = "50px";
                                        col2.style.borderTopRightRadius = "8px";
                                        col2.style.borderBottomRightRadius = "8px";
                                        col2.style.backgroundColor = "rgb(216, 216, 216)";
                                        col2.style.color = "black";
                                        col2.style.fontWeight = "bold";
                                        col2.style.fontSize = "1.2rem";
                                        col2.classList.add("col-md-4", "col-6", "d-flex", "justify-content-center", "align-items-center", "border");
                                        col2.innerText = data.marks;

                                        // Create the row and add the columns
                                        var row = document.createElement("div");
                                        row.classList.add("row", "mt-2");
                                        row.appendChild(col1);
                                        row.appendChild(col2);

                                        container.appendChild(row);
                                    });                      
                                    
                                    var col3 = document.createElement("div");
                                    col3.style.height = "50px";
                                    col3.style.borderTopLeftRadius = "8px";
                                    col3.style.borderBottomLeftRadius = "8px";
                                    col3.style.color = "white";
                                    col3.style.fontWeight = "bold";
                                    col3.style.fontSize = "1.2rem";
                                    col3.classList.add("col-md-4", "col-6", "offset-md-2", "d-flex", "justify-content-center", "align-items-center", "bg-dark", "border");
                                    col3.innerText = "Total";

                                    var col4 = document.createElement("div");
                                    col4.style.height = "50px";
                                    col4.style.borderTopRightRadius = "8px";
                                    col4.style.borderBottomRightRadius = "8px";
                                    col4.style.backgroundColor = "rgb(216, 216, 216)";
                                    col4.style.color = "black";
                                    col4.style.fontWeight = "bold";
                                    col4.style.fontSize = "1.2rem";
                                    col4.classList.add("col-md-4", "col-6", "d-flex", "justify-content-center", "align-items-center", "border");
                                    col4.innerText = response.total;

                                    var totalRow = document.createElement("div");
                                    totalRow.classList.add("row", "mt-2");
                                    totalRow.appendChild(col3);
                                    totalRow.appendChild(col4);

                                    container.appendChild(totalRow);

                                    var col5 = document.createElement("div");
                                    col5.style.height = "50px";
                                    col5.style.borderTopLeftRadius = "8px";
                                    col5.style.borderBottomLeftRadius = "8px";
                                    col5.style.color = "white";
                                    col5.style.fontWeight = "bold";
                                    col5.style.fontSize = "1.2rem";
                                    col5.classList.add("col-md-4", "col-6", "offset-md-2", "d-flex", "justify-content-center", "align-items-center", "bg-dark", "border");
                                    col5.innerText = "Place";

                                    var col6 = document.createElement("div");
                                    col6.style.height = "50px";
                                    col6.style.borderTopRightRadius = "8px";
                                    col6.style.borderBottomRightRadius = "8px";
                                    col6.style.backgroundColor = "rgb(216, 216, 216)";
                                    col6.style.color = "black";
                                    col6.style.fontWeight = "bold";
                                    col6.style.fontSize = "1.2rem";
                                    col6.classList.add("col-md-4", "col-6", "d-flex", "justify-content-center", "align-items-center", "border");
                                    col6.innerText = response.place;

                                    var placeRow = document.createElement("div");
                                    placeRow.classList.add("row", "mt-2");
                                    placeRow.appendChild(col5);
                                    placeRow.appendChild(col6);

                                    container.appendChild(placeRow);

                                    var col7 = document.createElement("div");
                                    col7.style.height = "50px";
                                    col7.style.borderTopLeftRadius = "8px";
                                    col7.style.borderBottomLeftRadius = "8px";
                                    col7.style.color = "white";
                                    col7.style.fontWeight = "bold";
                                    col7.style.fontSize = "1.2rem";
                                    col7.classList.add("col-md-4", "col-6", "offset-md-2", "d-flex", "justify-content-center", "align-items-center", "bg-dark", "border");
                                    col7.innerText = "Average";

                                    var col8 = document.createElement("div");
                                    col8.style.height = "50px";
                                    col8.style.borderTopRightRadius = "8px";
                                    col8.style.borderBottomRightRadius = "8px";
                                    col8.style.backgroundColor = "rgb(216, 216, 216)";
                                    col8.style.color = "black";
                                    col8.style.fontWeight = "bold";
                                    col8.style.fontSize = "1.2rem";
                                    col8.classList.add("col-md-4", "col-6", "d-flex", "justify-content-center", "align-items-center", "border");
                                    col8.innerText = response.average;

                                    var averageRow = document.createElement("div");
                                    averageRow.classList.add("row", "mt-2");
                                    averageRow.appendChild(col7);
                                    averageRow.appendChild(col8);

                                    container.appendChild(averageRow);

                                } catch (error) {
                                    Swal.fire({
                                        icon: "error",
                                        title: "Internel Server Error",
                                        text: "SomeThing Went Wrong",
                                    });
                                }

                            }
                        spinner.classList.remove('show');
                    }
                };
                request.open(
                    "POST",
                    "{{ route('student.search.marks') }}"
                );
                request.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
                request.send(form);
            }
        });
    </script>
</body>

</html>