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
                                <option>2022</option>
                                <option>2023</option>
                                <option>2024</option>
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

            if ((year == "selected") | (term == "selected")) {
                Swal.fire({
                    icon: "warning",
                    title: "WARNING",
                    text: "Please Select A Year And A Term",
                });
            } else {
                var request = new XMLHttpRequest();
                request.onreadystatechange = function () {
                    if ((request.readyState == 4) & (request.status == 200)) {
                        if (request.responseText == "error") {
                            document.getElementById("marks-container").innerHTML = "";
                            Swal.fire({
                                icon: "warning",
                                title: "WARNING",
                                text: "Invalid Year And Term",
                            });
                        } else {
                            document.getElementById("marks-container").innerHTML =
                                request.responseText;
                        }
                    }
                };
                request.open(
                    "GET",
                    "process/searchMarks.php?year=" + year + "&term=" + term + "",
                    true
                );
                request.send();
            }
        });
    </script>
</body>

</html>