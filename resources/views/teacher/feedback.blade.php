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
        <!-- Spinner Start -->
        @include('public_components.spinner')
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        @include('teacher.components.hamburger')
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('teacher.components.navbar')
            <!-- Navbar End -->


            <!-- Rating Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded p-4">
                    <h3 class="text-dark">Add period summary</h3>
                    <div class="row g-2">
                        <div class="form-floating mb-3 col-md-6">
                            <select class="form-select bg-secondary text-dark" id="grade" name="grade"
                                aria-label="Floating label select example">
                                <option value="0" selected>
                                    Open this select menu
                                </option>
                                @for($i=1; $i <= 13; $i++) <option>{{ $i }}</option>
                                    @endfor
                            </select>
                            <label for="floatingSelect">Select A Grade</label>
                        </div>

                        <div class="form-floating mb-3 col-md-6">
                            <select class="form-select bg-secondary text-dark" id="class" name="class"
                                aria-label="Floating label select example">
                                <option value="0" selected>
                                    Open this select menu
                                </option>
                                @php $classes = ["A", "B", "C", "D", "E",
                                "F", "G", "H"] @endphp
                                @foreach($classes as $class)
                                <option>{{ $class }}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Select A Class</label>
                        </div>
                        <div class="form-floating mb-3 col-md-6">
                            <select class="form-select bg-secondary text-dark" id="PeriodNo" name="grade"
                                aria-label="Floating label select example">
                                <option value="0" selected>
                                    Open this select menu
                                </option>
                                @for($i=1; $i <= 8; $i++) <option>{{ $i }}</option>
                                    @endfor
                            </select>
                            <label for="floatingSelect">Select A Period</label>
                        </div>
                        <div class="form-floating mb-3 col-md-6">
                            <select class="form-select bg-secondary text-dark" id="Subject" name="grade"
                                aria-label="Floating label select example">
                                <option value="0" selected>
                                    Open this select menu
                                </option>
                                <!-- create option list with common sample subjects -->
                                @php( $subjects = ["Maths", "Science", "English", "History", "Geography"])

                                @foreach($subjects as $subject)
                                <option>{{ $subject }}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Select A Subject</label>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control bg-secondary text-dark" id="description" rows="3"></textarea>
                        </div>

                        <div class="d-grid gap-2 col-6 mx-auto" onclick="sendData();">
                            <button class="btn btn-primary" type="button">Add Record</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Rating End -->

            <div class="modal fade" tabindex="-1" id="reportModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark">Report</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                @php( $violence = ["Inappropriate language", "Harassment or bullying", "Threats or violence",
                                "Disrespectful behavior", "Off-topic or irrelevant comments", "Spam or advertising",
                                "Inappropriate content"] )
                                @foreach($violence as $key => $v)
                                <div class="input-group mb-3 col-6">
                                    <div class="input-group-text">
                                        <input class="form-check-input mt-0" type="radio" value="{{ $v }}"
                                            aria-label="Checkbox for following text input" data-key="{{ $key }}"
                                            name="violence" required>
                                    </div>
                                    <input type="text" class="form-control text-dark bg-secondary" id="reason{{ $key }}"
                                        disabled aria-label="Text input with checkbox" value="{{ $v }}"
                                        name="reasonForReportText">
                                </div>
                                @endforeach
                                <div class="input-group mb-3 col-6">
                                    <div class="input-group-text">
                                        <input class="form-check-input mt-0" type="radio" value=""
                                            aria-label="Checkbox for following text input" name="violence"
                                            id="otherButton" required>
                                    </div>
                                    <input type="text" class="form-control text-dark bg-secondary"
                                        aria-label="Text input with checkbox" value=""
                                        placeholder="Enter a other reason" id="other" name="reasonForReportText">
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger" onclick="sendReport();"
                                id="reportBtn">Report</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Review Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded p-4">
                    <div class="row g-2">
                        <h3 class="text-dark">Review</h3>
                        <div class="form-floating mb-3 col-md-6">
                            <input onkeyup="filterTable();" type="text" class="form-control bg-secondary text-dark" id="Grade"
                                placeholder="Grade">
                            <label for="Grade">Grade</label>
                        </div>
                        <div class="form-floating mb-3 col-md-6">
                            <input onkeyup="filterTable();" type="text" class="form-control bg-secondary text-dark" id="Class"
                                placeholder="Class">
                            <label for="Class">Class</label>
                        </div>
                        <hr />

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Class</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col" class="space">Star Rate</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($records != null)
                                    @foreach ($records as $key => $record)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <th scope="row" data-grade="{{ $record->grade }}" data-class="{{ $record->class }}">{{ $record->grade }}-{{ $record->class }}</th>
                                        <th scope="row">{{ $record->subject }}</th>
                                        <th scope="row">{{ $record->rating }}</th>
                                        <th scope="row" class="space">{{ $record->comment }}</th>
                                        <th scope="row">
                                            <button onclick="reportModal();" data-id="{{ $record->id }}"
                                                data-index="{{ $record->student }}" data-message="{{ $record->comment }}" type="button"
                                                class="btn btn-danger btn-sm">Report</button>
                                        </th>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Review End -->


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
        // create function to show report modal
        function reportModal() {
            // pass values to the dataset of the onclick button to modal button
            let id = event.target.dataset.id;
            let index = event.target.dataset.index;
            let message = event.target.dataset.message;
            document.getElementById('reportBtn').dataset.message = message;
            document.getElementById('reportBtn').dataset.id = id;
            document.getElementById('reportBtn').dataset.index = index;
            $('#reportModal').modal('show');
        }

        // create function to send report
        function sendReport() {
            document.getElementById('spinner').classList.add('show');
            $('#reportModal').modal('hide');
            let id = document.getElementById('reportBtn').dataset.id;
            let index = document.getElementById('reportBtn').dataset.index;
            let message = document.getElementById('reportBtn').dataset.message;
            let reasonForReport = document.querySelector('input[name="violence"]:checked');
            // check reportForReport is null
            if (reasonForReport == null) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Please select a reason!',
                })
                return;
            } else {
                // get the value of the other text field
                reasonForReport = reasonForReport.value;
            }

            // check otherButton id is checked
            if (document.getElementById('otherButton').checked) {
                // get the value of the other text field
                reasonForReport = document.getElementById('other').value;
            }

            // validate all the fields
            if (reasonForReport == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Please add a reason!',
                })
            // remove show to spinner
            document.getElementById('spinner').classList.remove('show');
            } else {
                // send data to the server
                $.ajax({
                    url: "{{ route('report.feedback') }}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id,
                        "index": index,
                        "reasonForReport": reasonForReport,
                        "message": message
                    },
                    success: function (response) {
                        // handle two response success and already
                        if (response == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Reported successfully!',
                            })
                        } else if (response == 'already') {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Oops...',
                                text: 'You have already reported this feedback!',
                            })
                        }
                        document.getElementById('spinner').classList.remove('show');
                    },
                    error: function (response) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        })
                        document.getElementById('spinner').classList.remove('show');
                    }
                });
            }
        }

        // create a function to filter table with grade and class, grade and class given in dataset, if grade and class is null then show all
        function filterTable() {
            // get the value of the grade and class
            let grade = document.getElementById('Grade').value;
            let classs = document.getElementById('Class').value;
            // get all the rows
            let rows = document.querySelectorAll('tbody tr');

            // check grade and class is null
            if (grade == '' && classs == '') {
                // show all the rows
                rows.forEach(row => {
                    row.classList.remove('d-none');
                });
            } else {
                // hide all the rows
                rows.forEach(row => {
                    row.classList.add('d-none');
                });

                // show the rows with the given grade and class
                rows.forEach(row => {
                    // show if row when grade and class is equal to dataset value
                    classs = classs.toUpperCase();
                    if (row.children[1].dataset.grade == grade && row.children[1].dataset.class.toUpperCase() == classs.toUpperCase()) {
                        row.classList.remove('d-none');
                    }
                });
            }
        }

        // create a function to send data to the server
        function sendData() {
            // get the data from the form
            let grade = document.getElementById('grade').value;
            let classs = document.getElementById('class').value;
            let periodNo = document.getElementById('PeriodNo').value;
            let subject = document.getElementById('Subject').value;
            let description = document.getElementById('description').value;

            if (isNaN(periodNo) || periodNo > 8) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Please enter a valid period number!',
                })
            } else {
                // validate all the fields
                if (grade == '0' || classs == '0' || periodNo == '0' || subject == '0' || description == '') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: 'Please fill all the fields!',
                    })
                } else {
                    // create an object to store the data
                    let data = {
                        grade: grade,
                        class: classs,
                        periodNo: periodNo,
                        subject: subject,
                        description: description
                    }

                    // create an object to store the request headers
                    let requestHeaders = {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }

                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', "{{ route('add.learning.task') }}");
                    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
                    xhr.setRequestHeader('Content-Type', 'application/json');
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            if (xhr.responseText == 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: 'Learning Task Added Successfully!',
                                })
                            } else if (xhr.responseText == 'exist') {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Oops...',
                                    text: 'Learning Task Already Exist!',
                                })
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Something went wrong!',
                                    text: 'Please contact developers',
                                })
                            }
                        }
                    }

                    xhr.send(JSON.stringify(data));
                }
            }
        }
    </script>
</body>

</html>