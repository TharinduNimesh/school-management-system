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


            <!--Button Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h3 class="text-dark">Search Teacher</h3>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control bg-secondary text-dark"
                                    placeholder="Search By NIC" aria-label="Recipient's username"
                                    aria-describedby="button-addon2" id="teacherId">
                                <button class="btn btn-primary" type="button" id="button-addon2"
                                    onclick="searchTeacher();">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Button End -->


            <!--Teacher Details start-->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <div class="row">

                        <h5 class="card-header text-dark">Teacher Details</h5>
                        <hr>
                        <div class="mb-3 col-md-6">
                            <label for="Name" class="form-label">Name</label>
                            <input class="form-control bg-secondary text-dark" type="text" id="teacherName"
                                name="Name" value="Ex: John Doe" autofocus disabled />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="Grade" class="form-label">Contact No</label>
                            <input class="form-control bg-secondary text-dark" type="text" id="teacherContactNo"
                                name="Grade" value="Ex: 0771234567" autofocus disabled />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="basketsubject" class="form-label">Appointed Subject</label>
                            <input class="form-control bg-secondary text-dark" type="text"
                                id="teacherAppointedSubject" value="Ex: Maths" autofocus disabled />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="basket subject" class="form-label">Email</label>
                            <input class="form-control bg-secondary text-dark" type="text" id="teacherEmail"
                                name="basket subject" value="Ex: abc@gmail.com" autofocus disabled />
                        </div>
                        <div class="mb-3 col-12">
                            <label for="basket subject" class="form-label">Qualification</label>
                            <textarea class="form-control bg-secondary text-dark" placeholder="Ex: BSc in Computer Science"
                                id="teacherQualification" rows="1" disabled></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <!--Teacher Details end-->

            <div class="modal fade" tabindex="-1" id="gradeModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark">Grades Of <span id="clickedSubject"></span></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-hover table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Grade</th>
                                        <th scope="col">Remove</th>
                                    </tr>
                                </thead>
                                <tbody id="gradeBody">

                                </tbody>
                            </table>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-danger me-md-2" id="removeAllButton" onclick="removeAll();" type="button">Remove All</button>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Table start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h3 class="mb-0 text-dark">List Subject</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="subjectBody">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Table end -->


            <!-- Add subject start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded p-4">
                    <h3 class="text-dark">Add Subject</h3>
                    <select class="form-select bg-secondary mb-5" id="subject" aria-label="Select">
                        <option selected value="0">Open this select menu</option>
                        @foreach ($subjects as $subject)
                            <option>{{ $subject }}</option>
                        @endforeach
                    </select>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Grade</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 1; $i <= 13; $i++)
                                    <tr>
                                        <th scope="col">Grade {{ $i }}</th>
                                        <th scope="col"><input name="grade[]" value="{{ $i }}"
                                                class="form-check-input" style="width: 20px; height: 20px;"
                                                type="checkbox" id="flexSwitchCheckDefault">
                                        </th>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                    <button type="button" data-nic="" id="attachSubmitButton"
                        class="btn btn-primary mt-4 col-12" onclick="attachSubjects();">Submit</button>
                </div>
            </div>
            <!-- Add subject end -->


            <!-- Footer Start -->
            @include('public_components.footer')
            <!-- Footer End -->
        </div>
        <!-- Content End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    @include('public_components.js')
    <!-- Template Javascript -->

    <script>
        hamburger("teacherSubject");

        function attachSubjects() {
            var grades = [];
            var nic = event.target.dataset.nic;
            var subject = document.getElementById("subject").value;
            var checkboxes = document.getElementsByName('grade[]');
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    grades.push(checkboxes[i].value);
                }
            }

            if (nic == "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please Search A Teacher First!',
                })
                return;
            }
            if (subject == "0") {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please select a subject!',
                })
                return;
            }

            if (grades.length == 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please select at least one grade!',
                })
            } else {
                document.getElementById("spinner").classList.add("show");
                var data = {
                    "nic": nic,
                    "subject": subject,
                    "grades": grades
                };
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: "{{ route('add.subject.to.teacher') }}",
                    data: data,
                    success: function(response) {
                        document.getElementById("spinner").classList.remove("show");
                        if (response == "success") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Subjects attached successfully!',
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                            })
                        }
                    },
                    failure: function(response) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        })
                        document.getElementById("spinner").classList.remove("show");
                    }
                });
            }
        }

        function searchTeacher() {
            document.getElementById("spinner").classList.add("show");
            var teacherId = document.getElementById("teacherId").value;
            var teacherName = document.getElementById("teacherName");
            var teacherEmail = document.getElementById("teacherEmail");
            var teacherContact = document.getElementById("teacherContactNo");
            var teacherQualification = document.getElementById("teacherQualification");
            var teacherAppointedSubject = document.getElementById("teacherAppointedSubject");
            document.getElementById("attachSubmitButton").dataset.nic = "";
            document.getElementById("subjectBody").innerHTML = "";

            if (teacherId == "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please enter Teacher NIC!',
                })
                teacherName.value = "Ex: John Doe";
                teacherEmail.value = "Ex: abc@gmail.com";
                teacherContact.value = "Ex: 0771234567";
                teacherAppointedSubject.value = "Ex: Maths";
                teacherQualification.value = "Ex: BSc in Computer Science";
                document.getElementById("spinner").classList.remove("show");
                return;
            }

            var teacherData = {
                nic: teacherId
            };

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "{{ route('search.teacher') }}",
                data: teacherData,
                success: function(response) {
                    if (response != "Invalid") {
                        teacherName.value = response.full_name;
                        teacherEmail.value = response.email;
                        teacherContact.value = response.mobile;
                        teacherAppointedSubject.value = response.appointed_subject;
                        teacherQualification.value = response.qualifications;
                        document.getElementById("attachSubmitButton").dataset.nic = teacherId;
                        var subjects = [];
                        if(!response.subjects) {
                            response.subjects = [];
                        }
                        response.subjects.forEach((subject, index) => {
                            if(!subjects.includes(subject.subject)){
                                // create a new row element
                                var newRow = document.createElement("tr");
                                newRow.id =  "subject" + subject.subject;
                                // create a new cell element
                                var no = document.createElement("td");
                                no.innerHTML = index + 1;
                                var subjectName = document.createElement("td");
                                subjectName.innerHTML = subject.subject;
                                var action = document.createElement("td");
                                var button = document.createElement("button");
                                button.classList.add("btn", "btn-success", "btn-sm");
                                button.innerHTML = "More Info";
                                button.dataset.subject = subject.subject;
                                button.dataset.nic = teacherId;
                                button.onclick = () => {
                                    var teacherNic = event.target.dataset.nic;
                                    var clickedSubject = event.target.dataset.subject;
                                    document.getElementById("gradeBody").innerHTML = "";
                                    var data = {
                                        "nic": teacherNic,
                                        "subject": clickedSubject
                                    };
                                    document.getElementById("spinner").classList.add("show");
                                    $.ajax({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        type: "POST",
                                        url: "{{ route('show.grade.for.subject') }}",
                                        data: data,
                                        success: function(response) {
                                            document.getElementById("clickedSubject").innerHTML = clickedSubject;
                                            document.getElementById("removeAllButton").dataset.subject = clickedSubject;
                                            document.getElementById("removeAllButton").dataset.nic = teacherNic;
                                            response.subjects.forEach(data => {
                                                var newRow = document.createElement("tr");
                                                newRow.id = clickedSubject + data.grade;
                                                var grade = document.createElement("td");
                                                grade.innerHTML = "Grade" + data.grade;
                                                var action = document.createElement("td");
                                                var button = document.createElement("button");
                                                button.classList.add("btn", "btn-danger", "btn-sm");
                                                button.innerHTML = "Remove";
                                                button.dataset.subject = data.subject;
                                                button.dataset.nic = teacherNic;
                                                button.dataset.grade = data.grade;
                                                button.onclick = function() {
                                                    removeFromGrade();
                                                }
                                                action.appendChild(button);
                                                newRow.appendChild(grade);
                                                newRow.appendChild(action);
                                                document.getElementById("gradeBody").appendChild(newRow);
                                            });

                                            document.getElementById("spinner").classList.remove("show");
                                            $("#gradeModal").modal("show");
                                        },
                                    });
                                }
                                action.appendChild(button);
                                newRow.appendChild(no);
                                newRow.appendChild(subjectName);
                                newRow.appendChild(action);
                                document.getElementById("subjectBody").appendChild(newRow);      
                                subjects.push(subject.subject);                          
                            }

                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Invalid Teacher NIC!',
                        })
                        teacherName.value = "Ex: John Doe";
                        teacherEmail.value = "Ex: abc@gmail.com";
                        teacherContact.value = "Ex: 0771234567";
                        teacherAppointedSubject.value = "Ex: Maths";
                        teacherQualification.value = "Ex: BSc in Computer Science";
                    }
                    document.getElementById("spinner").classList.remove("show");
                }
            });
        }

        function removeFromGrade() {
            var teacherNic = event.target.dataset.nic;
            var clickedSubject = event.target.dataset.subject;
            var grade = event.target.dataset.grade;
            var data = {
                "nic": teacherNic,
                "subject": clickedSubject,
                "grade": grade
            };
            document.getElementById("spinner").classList.add("show");
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "{{ route('remove.grade.from.teacher') }}",
                data: data,
                success: function(response) {
                    document.getElementById(clickedSubject + grade).remove();
                    document.getElementById("spinner").classList.remove("show");
                },
                failure: function(response) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    })
                    document.getElementById("spinner").classList.remove("show");
                }
            });
        }

        function removeAll() {
            var teacherNic = event.target.dataset.nic;
            var clickedSubject = event.target.dataset.subject;
            var data = {
                "nic": teacherNic,
                "subject": clickedSubject
            };
            document.getElementById("spinner").classList.add("show");
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "{{ route('remove.all.grade.from.teacher') }}",
                data: data,
                success: function(response) {
                    document.getElementById("subject" + clickedSubject).remove();
                    document.getElementById("gradeBody").innerHTML = "";
                    document.getElementById("spinner").classList.remove("show");
                },
                failure: function(response) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    })
                    document.getElementById("spinner").classList.remove("show");
                }
            });
        }
    </script>
</body>

</html>
