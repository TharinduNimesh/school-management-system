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

            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4" style="min-height: 80vh;">
                <div class="row g-4">
                    <h3 class="mb-4 text-dark">Students Count</h3>
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4 text-dark">School Search</h6>
                            <div class="row g-2">
                                <div class="col-12">
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
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button class="btn btn-primary" type="button">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4 text-dark">Student Count</h6>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Grade</th>
                                            <th scope="col">Male</th>
                                            <th scope="col">Female</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">classes</th>
                                        </tr>
                                    </thead>
                                    <tbody id="StudentCount">
                                        <tr>
                                            <td>1</td>
                                            <td>50</td>
                                            <td>100</td>
                                            <td>150</td>
                                            <td>5</td>
                                        </tr>
                                        <tr>

                                        </tr>
                                        <tr>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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

    @include('public_components.js')
    <script>
        hamburger("studentCount");
    </script>
</body>

</html>
