<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.components.head')
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        @include('public_components.spinner')
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        @include('admin.components.sidebar')
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('admin.components.navbar')
            <!-- Navbar End -->


            <!-- Search Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded p-4">
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating">
                                <input class="form-control bg-secondary text-dark" id="grade" type="text" placeholder="Grade">
                                <label for="floatingSelectGrid">Grade</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input class="form-control bg-secondary text-dark" id="class" type="text" placeholder="Class">
                                <label for="floatingSelectGrid">Class</label>
                            </div>
                        </div>
                        <div>
                            <button type="button" onclick="searchRecord();" class="btn btn-primary col-12">Search<i class="bi bi-search ms-2"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Search End -->



            <!-- Summery Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded p-4">
                    <div class="row g-2">
                        <h3 class="text-dark">Summary</h3>
                        <div class="table-responsive" id="summaryTable">
                            <table class="table table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Period</th>
                                    </tr>
                                </thead>
                                <tbody id="summaryBody">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Summery End -->

            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded p-4">
                    <div class="row g-2">
                        <h3 class="text-dark">Weekly report</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Period</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Teacher</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Feedbacks</th>
                                    </tr>
                                </thead>
                                <tbody id="reportBody">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->


            <!-- Footer Start -->
            @include('public_components.footer')
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <div class="modal fade" tabindex="-1" id="feedbackModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark">Feedback</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Rating</th>
                                <th scope="col">Comment</th>
                            </tr>
                        </thead>
                        <tbody >

                        </tbody>
                   </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    @include('public_components.js')
    <!-- Template Javascript -->

    <script>
        function searchRecord() {
            document.getElementById("spinner").classList.add("show"); 
            var grade = document.getElementById("grade").value;
            var classs = document.getElementById("class").value;
            var gradeRegex = /^[0-9]{1,2}$/;
            var classRegex = /^[A-Ha-h]{1}$/;
            document.getElementById("summaryBody").innerHTML = "";
            document.getElementById("reportBody").innerHTML = "";

            if (gradeRegex.test(grade) && classRegex.test(classs)) {
                $.ajax({
                    url: "{{ route('search.class.record') }}",
                    type: "POST",
                    data: {
                        grade: grade,
                        class: classs,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        const days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                        var subjects = Object.keys(response.count);
                        subjects.forEach(subject => {
                            var row = document.createElement("tr");
                            var subjectName = document.createElement("th");
                            subjectName.setAttribute("scope", "row");
                            subjectName.innerHTML = subject;
                            row.appendChild(subjectName);
                            var period = document.createElement("th");
                            period.setAttribute("scope", "row");
                            period.innerHTML = response.count[subject];
                            row.appendChild(period);
                            document.getElementById("summaryBody").appendChild(row);
                        });

                        var index = 0;
                        days.forEach(date => {
                            // create table body of report table
                            var row = document.createElement("tr");
                            var day = document.createElement("th");
                            row.classList.add("text-center", "bg-info", "text-dark");
                            day.setAttribute("colspan", "5");
                            day.setAttribute("class", "text-center");
                            day.innerHTML = date;
                            row.appendChild(day);
                            document.getElementById("reportBody").appendChild(row);
                            // create body of report table

                            response.records[index].forEach(record => {
                                var row = document.createElement("tr");
                                row.colSpan = 5;
                                var period = document.createElement("th");
                                period.setAttribute("scope", "row");
                                period.innerHTML = record.period_no;
                                row.appendChild(period);
                                var subject = document.createElement("th");
                                subject.setAttribute("scope", "row");
                                subject.innerHTML = record.subject;
                                row.appendChild(subject);
                                var teacher = document.createElement("th");
                                teacher.setAttribute("scope", "row");
                                teacher.innerHTML = record.name;
                                row.appendChild(teacher);
                                var description = document.createElement("th");
                                description.setAttribute("scope", "row");
                                description.innerHTML = record.description;
                                row.appendChild(description);
                                var feedback = document.createElement("th");
                                feedback.setAttribute("scope", "row");
                                var button = document.createElement("button");
                                button.setAttribute("type", "button");
                                button.setAttribute("class", "btn btn-success btn-sm");
                                button.dataset.id = record._id;
                                button.innerHTML = "view";
                                button.onclick = function() {
                                    $.ajax({
                                        url: "{{ route('get.feedbacks') }}",
                                        type: "POST",
                                        data: {
                                            id: record._id,
                                            _token: '{{ csrf_token() }}'
                                        },
                                        success: function(response) {
                                            // create row
                                            document.getElementById("feedbackModal").querySelector("tbody").innerHTML = "";
                                            response.forEach((feedback, index) => {
                                                var row = document.createElement("tr");
                                                var no = document.createElement("th");
                                                no.setAttribute("scope", "row");
                                                no.innerHTML = index + 1;
                                                row.appendChild(no);
                                                var rating = document.createElement("th");
                                                rating.setAttribute("scope", "row");
                                                rating.innerHTML = feedback.rating;
                                                row.appendChild(rating);
                                                var comment = document.createElement("th");
                                                comment.setAttribute("scope", "row");
                                                comment.innerHTML = feedback.comment;
                                                row.appendChild(comment);
                                                document.getElementById("feedbackModal").querySelector("tbody").appendChild(row);
                                            });
                                            $("#feedbackModal").modal("show");
                                        },
                                    });
                                }
                                feedback.appendChild(button);
                                row.appendChild(feedback);
                                document.getElementById("reportBody").appendChild(row);
                            });
                            index++;
                        });
                        document.getElementById("spinner").classList.remove("show"); 
                    },
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please enter valid grade and class!',
                })
            document.getElementById("spinner").classList.remove("show"); 
            }
        }
    </script>
</body>

</html>