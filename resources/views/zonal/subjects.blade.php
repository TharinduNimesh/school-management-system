<!DOCTYPE html>
<html lang="en">

<head>
    @include('zonal.components.head')
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        @include('public_components.spinner')
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        @include('zonal.components.hamburger')
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('zonal.components.navbar')
            <!-- Navbar End -->


            <!-- Search Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="col-sm-12 col-xl-12">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h3 class="mb-4 text-dark">School Search</h3>
                        <div class="row g-2">
                            <div class="col-md">
                                <div class="form-floating">
                                    <select class="form-select bg-secondary text-dark" id="school"
                                        aria-label="Floating label select example">
                                        <option selected value="0">Select A School</option>
                                        <option>Dharmaloka</option>
                                        <option>Gurukula</option>
                                    </select>
                                    <label for="floatingSelect">School List</label>
                                </div>
                            </div>
                            <div>
                                <div class="d-grid gap-2 col-6 mx-auto mt-3">
                                    <button type="submit" class="btn btn-primary col-sm-12 col-xl-12">Search<i
                                            class="bi bi-search ms-2"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Search End -->


            <!-- 5 - 1 Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded p-4">
                    <h3 class="card-header mb-4 text-dark">Number of teachers belonging to primary section (1-5
                        grade) subject wise</h3>
                    <div class="row g-4">

                        <div class="col-sm-12 col-xl-12" id="AlFirstOption">
                            <h5 class="mb-4 text-dark">Total ClassRooms-</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th colspan="4">Primary Common</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Total ClassRooms</th>
                                            <th>Total Teachers</th>
                                            <th>Approved Count</th>
                                            <th>Lack of teachers</th>
                                        </tr>
                                        <tr>
                                            <td scope="row">20</td>
                                            <td>14</td>
                                            <td>14</td>
                                            <td>0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <div class="col-sm-12 col-xl-12" id="AlFirstOption">
                            <h5 class="mb-4 text-dark">Total ClassRooms-</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th colspan="4">Primary English</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">3rd, 4th, 5th grade total ClassRooms</th>
                                            <th>Total Teachers</th>
                                            <th>Approved Count</th>
                                            <th>Lack of teachers</th>
                                        </tr>
                                        <tr>
                                            <td scope="row">20</td>
                                            <td>14</td>
                                            <td>14</td>
                                            <td>0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 5 - 1 Table End -->


            <!-- 6 - 11 Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded p-4">
                    <h3 class="card-header mb-4 text-dark">Number of teachers prescribed for secondary section (6-11
                        grade) – subject wise</h3>
                    <div class="row g-4">

                        <div class="col-sm-12 col-xl-12" id="AlFirstOption">
                            <h5 class="mb-4 text-dark">Total ClassRooms-</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">Subjects</th>
                                            <th scope="col">Total Teachers</th>
                                            <th>Approved Count</th>
                                            <th>Lack of teachers</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="row">Science</td>
                                            <td>5</td>
                                            <td>4</td>
                                            <td>2</td>
                                        </tr>
                                        <tr>
                                            <td scope="row">Mathematics</td>
                                            <td>5</td>
                                            <td>4</td>
                                            <td>2</td>
                                        </tr>
                                        <tr>
                                            <td scope="row">Sinhala</td>
                                            <td>5</td>
                                            <td>4</td>
                                            <td>2</td>
                                        </tr>
                                        <tr>
                                            <td scope="row">English</td>
                                            <td>5</td>
                                            <td>4</td>
                                            <td>2</td>
                                        </tr>
                                        <tr>
                                            <td scope="row">Buddhism</td>
                                            <td>5</td>
                                            <td>4</td>
                                            <td>2</td>
                                        </tr>
                                        <tr>
                                            <td scope="row">History</td>
                                            <td>5</td>
                                            <td>4</td>
                                            <td>2</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <div class="col-sm-12 col-xl-12" id="AlFirstOption">
                            <h5 class="mb-4 text-dark">Total ClassRooms-</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th scope="row">All the subjects of the first subject group and the content
                                                thereof Number of teachers for the subject concerned for Grades 6-9</th>
                                            <th>Total Teachers</th>
                                            <th>Lack of teachers</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="row">20</td>
                                            <td>14</td>
                                            <td>0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <div class="col-sm-12 col-xl-12" id="AlFirstOption">
                            <h5 class="mb-4 text-dark">Total ClassRooms-</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th scope="row">Number of teachers for all subjects in the second
                                                subject group</th>
                                            <th>Total Teachers</th>
                                            <th>Lack of teachers</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="row">20</td>
                                            <td>14</td>
                                            <td>0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <div class="col-sm-12 col-xl-12" id="AlFirstOption">
                            <h5 class="mb-4 text-dark">Total ClassRooms-</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th scope="row">For all subjects of third subject category
                                                Number of teachers</th>
                                            <th>Total Teachers</th>
                                            <th>Lack of teachers</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="row">20</td>
                                            <td>14</td>
                                            <td>0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 6 - 11 Table End -->


            <!-- 12 - 13 Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded p-4">
                    <h3 class="card-header mb-4 text-dark">Providing teachers for high school classes</h3>
                    <div class="row g-4">

                        <div class="col-sm-12 col-xl-12" id="AlFirstOption">
                            <h6 class="mb-4 text-dark">G.E.C. (Higher Level) No. of teachers to be available
                                for each section</h6>
                            <h5 class="mb-4 text-dark">Total ClassRooms-</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th scope="row">One stream in each division
                                                Only the designated teachers if any
                                                No. (For 03 Main Subject)</th>
                                            <th>More than one subject stream in each division
                                                Number of prescribed teachers, if any (Principal
                                                 for Subject 04)</th>
                                            <th>Total Teachers</th>
                                            <th>Lack of teachers</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="row">20</td>
                                            <td>14</td>
                                            <td>14</td>
                                            <td>0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <div class="col-sm-12 col-xl-12" id="AlFirstOption">
                            <h6 class="mb-4 text-dark">G.E.C. (Higher Level) A non-majority number of students should be
                                present for the subject being studied Number of teachers</h6>
                            <h5 class="mb-4 text-dark">Total ClassRooms-</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th scope="row">Number of students studying that subject in grades 12-13
                                            </th>
                                            <th>Total Teachers</th>
                                            <th>Approved Count</th>
                                            <th>Lack of teachers</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="row">20-135</td>
                                            <td>14</td>
                                            <td>5</td>
                                            <td>0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <div class="col-sm-12 col-xl-12" id="AlFirstOption">
                            <h6 class="mb-4 text-dark">G.E.C. (Advanced) General English and General Information
                                technology Number of teachers
                                to be available for the subject</h6>
                            <h5 class="mb-4 text-dark">Total ClassRooms-</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th scope="row">General English (Approved Count)</th>
                                            <th>Total Teachers</th>
                                            <th>Lack of teachers</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="row">20</td>
                                            <td>14</td>
                                            <td>0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <div class="col-sm-12 col-xl-12" id="AlFirstOption">
                            <h5 class="mb-4 text-dark">Total ClassRooms-</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th scope="row">GIT (Approved Count)</th>
                                            <th>Total Teachers</th>
                                            <th>Lack of teachers</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="row">20</td>
                                            <td>14</td>
                                            <td>0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 12 - 13 Table End -->


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
        hamburger('subject')
    </script>
</body>

</html>