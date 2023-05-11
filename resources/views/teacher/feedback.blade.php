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
                            <select class="form-select bg-secondary text-dark" id="assignmentGrade" name="grade"
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
                            <select class="form-select bg-secondary text-dark" id="assignmentClass" name="class"
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
                        <div class="mb-3 col-md-6">
                            <label for="PeriodNo" class="form-label">Period No</label>
                            <input class="text-dark form-control bg-secondary" type="number" id="PeriodNo"
                                name="PeriodNo" placeholder="Enter Period No" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="Subject" class="form-label">Subject</label>
                            <input type="text" class="text-dark form-control bg-secondary" id="Subject" name="Subject"
                                placeholder="Enter Subject" />
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control bg-secondary text-dark" id="description" rows="3"></textarea>
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

</body>

</html>