<!DOCTYPE html>
<html lang="en">

<head>
    @include('teacher.components.head')
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        {{-- @include('public_components.spinner') --}}
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
                                @for($i=1; $i <= 13; $i++) 
                                <option>{{ $i }}</option>
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
                                @for($i=1; $i <= 8; $i++) 
                                <option>{{ $i }}</option>
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


            <!-- Button Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded p-4">
                    <div class="row g-2">
                        <h3 class="text-dark">Search Review</h3>
                        <div class="form-floating mb-3 col-md-6">
                            <input type="text" class="form-control bg-secondary text-dark" id="Grade" placeholder="Grade">
                            <label for="Grade">Grade</label>
                        </div>
                        <div class="form-floating mb-3 col-md-6">
                            <input type="text" class="form-control bg-secondary text-dark" id="Class" placeholder="Class">
                            <label for="Class">Class</label>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button class="btn btn-primary" type="button">Search</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Button End -->


            <!-- Review Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded p-4">
                    <div class="row g-2">
                        <h3 class="text-dark">Review</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Subject</th>
                                        <th style="width: 14%" scope="col">Star Rate</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Maths</th>
                                        <th scope="row">5</th>
                                        <th scope="row">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Deleniti, maiores nostrum! Nisi delectus dolorem dicta distinctio, incidunt
                                            nulla quae tempore iure ullam! Laudantium, nesciunt est maxime dolores minus
                                            repudiandae repellat.</th>
                                        <th scope="row"><button type="button"
                                                class="btn btn-primary btn-sm">Report</button></th>
                                    </tr>
                                    <tr>
                                        <th scope="row">Maths</th>
                                        <th scope="row">5</th>
                                        <th scope="row">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Deleniti, maiores nostrum! Nisi delectus dolorem dicta distinctio, incidunt
                                            nulla quae tempore iure ullam! Laudantium, nesciunt est maxime dolores minus
                                            repudiandae repellat.</th>
                                        <th scope="row"><button type="button"
                                                class="btn btn-primary btn-sm">Report</button></th>
                                    </tr>
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
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Learning Task Added Successfully!',
                        })
                    }
                }

                xhr.send(JSON.stringify(data));
            }
            } 
        }
    </script>
</body>

</html>