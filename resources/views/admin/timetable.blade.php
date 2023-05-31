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
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h3 class="mb-4 text-dark">Create a Time Table</h3>
                            <div class="row g-2">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <select class="form-select text-dark bg-secondary" id="year"
                                            aria-label="Floating label select example">
                                            <option selected>Open this select menu</option>
                                            <option value="1">2023</option>
                                        </select>
                                        <label for="floatingSelect">Select Year</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating">
                                        <select class="form-select text-dark bg-secondary" id="grade"
                                            aria-label="Floating label select example">
                                            <option selected>Open this select menu</option>
                                            <option value="1">10</option>
                                        </select>
                                        <label for="floatingSelect">Select Grade</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input class="form-control text-dark bg-secondary" id="floatingSelectGrid"
                                            type="text" placeholder="Class">
                                        <label for="floatingSelectGrid">Class</label>
                                    </div>
                                </div>
                                <div>
                                    <div class="d-grid gap-2 col-6 mx-auto mt-3">
                                        <button onclick="" type="submit"
                                            class="btn btn-primary col-sm-12 col-xl-12">Search<i
                                                class="bi bi-search ms-2"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Search End -->


            <!-- Genarate Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">

                        </div>
                    </div>
                </div>
            </div>
            <!-- Genarate End -->


            <!--Add Time table start-->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h3 class="mb-0 text-dark">Add Subject</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">#</th>
                                    <th scope="col">TIME</th>
                                    <th scope="col">MONDAY</th>
                                    <th scope="col">TUESDAY</th>
                                    <th scope="col">WEDNESDAY</th>
                                    <th scope="col">THURSDAY</th>
                                    <th scope="col">FRIDAY</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                </tr>
                                <tr>
                                    <td colspan="8" class="text-center">INTERVAL</td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                    <td><input type="text" class="text-dark bg-secondary"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--Add Time table start-->


            <!-- Table Search Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h3 class="mb-4 text-dark">Search a Time Table</h3>
                            <div class="row g-2">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <select class="form-select text-dark bg-secondary" id="year"
                                            aria-label="Floating label select example">
                                            <option selected>Open this select menu</option>
                                            <option value="1">2023</option>
                                        </select>
                                        <label for="floatingSelect">Select Year</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating">
                                        <select class="form-select text-dark bg-secondary" id="grade"
                                            aria-label="Floating label select example">
                                            <option selected>Open this select menu</option>
                                            <option value="1">10</option>
                                        </select>
                                        <label for="floatingSelect">Select Grade</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input class="form-control text-dark bg-secondary" id="floatingSelectGrid"
                                            type="text" placeholder="Class">
                                        <label for="floatingSelectGrid">Class</label>
                                    </div>
                                </div>
                                <div>
                                    <div class="d-grid gap-2 col-6 mx-auto mt-3">
                                        <button onclick="" type="submit"
                                            class="btn btn-primary col-sm-12 col-xl-12">Search<i
                                                class="bi bi-search ms-2"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table Search End -->


            <!--Time table start-->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h3 class="mb-0 text-dark">Time Table</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">#</th>
                                    <th scope="col">TIME</th>
                                    <th scope="col">MONDAY</th>
                                    <th scope="col">TUESDAY</th>
                                    <th scope="col">WEDNESDAY</th>
                                    <th scope="col">THURSDAY</th>
                                    <th scope="col">FRIDAY</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>07:50-08:40</td>
                                    <td class="viewTeacher">
                                        <p class="subject">
                                        </p>
                                        <p class="teacher">
                                        </p>
                                    </td>
                                    <td class="viewTeacher">
                                        <p class="subject">
                                        </p>
                                        <p class="teacher">
                                        </p>
                                    </td>
                                    <td class="viewTeacher">
                                        <p class="subject">$123</p>
                                        <p class="teacher">Tharindu</p>
                                    </td>
                                    <td class="viewTeacher">
                                        <p class="subject">Paid</p>
                                        <p class="teacher">Tharindu</p>
                                    </td>
                                    <td class="viewTeacher">
                                        <p class="subject">Paid</p>
                                        <p class="teacher">Tharindu</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>08:30-09:10</td>
                                    <td class="viewTeacher">
                                        <p class="subject">
                                        </p>
                                        <p class="teacher">
                                        </p>
                                    </td>
                                    <td class="viewTeacher">
                                        <p class="subject">

                                        </p>
                                        <p class="teacher">Tharindu</p>
                                    </td>
                                    <td class="viewTeacher">
                                        <p class="subject">$123</p>
                                        <p class="teacher">Tharindu</p>
                                    </td>
                                    <td class="viewTeacher">
                                        <p class="subject">Paid</p>
                                        <p class="teacher">Tharindu</p>
                                    </td>
                                    <td class="viewTeacher">
                                        <p class="subject">Paid</p>
                                        <p class="teacher">Tharindu</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>09:10-09:50</td>
                                    <td class="viewTeacher">
                                        <p class="subject">
                                        </p>
                                        <p class="teacher">
                                        </p>
                                    </td>
                                    <td class="viewTeacher">
                                        <p class="subject">

                                        </p>
                                        <p class="teacher">Tharindu</p>
                                    </td>
                                    <td class="viewTeacher">
                                        <p class="subject">$123</p>
                                        <p class="teacher">Tharindu</p>
                                    </td>
                                    <td class="viewTeacher">
                                        <p class="subject">Paid</p>
                                        <p class="teacher">Tharindu</p>
                                    </td>
                                    <td class="viewTeacher">
                                        <p class="subject">Paid</p>
                                        <p class="teacher">Tharindu</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>09:50-10:30</td>
                                    <td class="viewTeacher">
                                        <p class="subject">
                                        </p>
                                        <p class="teacher">
                                        </p>
                                    </td>
                                    <td class="viewTeacher">
                                        <p class="subject">
                                        </p>
                                        <p class="teacher">Tharindu</p>
                                    </td>
                                    <td class="viewTeacher">
                                        <p class="subject">$123</p>
                                        <p class="teacher">Tharindu</p>
                                    </td>
                                    <td class="viewTeacher">
                                        <p class="subject">Paid</p>
                                        <p class="teacher">Tharindu</p>
                                    </td>
                                    <td class="viewTeacher">
                                        <p class="subject">Paid</p>
                                        <p class="teacher">Tharindu</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>10:30-11:10</td>
                                    <td class="viewTeacher">
                                        <p class="subject">
                                        </p>
                                        <p class="teacher">
                                        </p>
                                    </td>
                                    <td class="viewTeacher">
                                        <p class="subject">
                                        </p>
                                        <p class="teacher">Tharindu</p>
                                    </td>
                                    <td class="viewTeacher">
                                        <p class="subject">$123</p>
                                        <p class="teacher">Tharindu</p>
                                    </td>
                                    <td class="viewTeacher">
                                        <p class="subject">Paid</p>
                                        <p class="teacher">Tharindu</p>
                                    </td>
                                    <td class="viewTeacher">
                                        <p class="subject">Paid</p>
                                        <p class="teacher">Tharindu</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="8" class="text-center">INTERVAL</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>11:30-12:10</td>
                                    <td class="viewTeacher">
                                        <p class="subject">
                                        </p>
                                        <p class="teacher">
                                        </p>
                                    </td>
                                    <td class="viewTeacher">
                                        <p class="subject">Jhon Doe</p>
                                        <p class="teacher">Tharindu</p>
                                    </td>
                                    <td class="viewTeacher">
                                        <p class="subject">$123</p>
                                        <p class="teacher">Tharindu</p>
                                    </td>
                                    <td class="viewTeacher">
                                        <p class="subject">Paid</p>
                                        <p class="teacher">Tharindu</p>
                                    </td>
                                    <td class="viewTeacher">
                                        <p class="subject">Paid</p>
                                        <p class="teacher">Tharindu</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>12:10-12:50</td>
                                    <td class="viewTeacher">
                                        <p class="subject">
                                        </p>
                                        <p class="teacher">
                                        </p>
                                    </td>
                                    <td class="viewTeacher">
                                        <p class="subject">Jhon Doe</p>
                                        <p class="teacher">Tharindu</p>
                                    </td>
                                    <td class="viewTeacher">
                                        <p class="subject">$123</p>
                                        <p class="teacher">Tharindu</p>
                                    </td>
                                    <td class="viewTeacher">
                                        <p class="subject">Paid</p>
                                        <p class="teacher">Tharindu</p>
                                    </td>
                                    <td class="viewTeacher">
                                        <p class="subject">Paid</p>
                                        <p class="teacher">Tharindu</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>12:50-13:30</td>
                                    <td class="viewTeacher">
                                        <p class="subject">
                                        </p>
                                        <p class="teacher">
                                        </p>
                                    </td>
                                    <td class="viewTeacher">
                                        <p class="subject">Jhon Doe</p>
                                        <p class="teacher">Tharindu</p>
                                    </td>
                                    <td class="viewTeacher">
                                        <p class="subject">$123</p>
                                        <p class="teacher">Tharindu</p>
                                    </td>
                                    <td class="viewTeacher">
                                        <p class="subject">Paid</p>
                                        <p class="teacher">Tharindu</p>
                                    </td>
                                    <td class="viewTeacher">
                                        <p class="subject">Paid</p>
                                        <p class="teacher">Tharindu</p>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--Time table start-->


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
        hamburger("timetable");
    </script>
</body>

</html>