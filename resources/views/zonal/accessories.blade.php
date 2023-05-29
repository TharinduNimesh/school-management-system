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


            <!-- Request Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded p-4">
                    <h3 class="mb-4 text-dark">Requests</h3>
                    <div class="row g-4">
                        <div class="col-sm-12 col-xl-12" id="AlFirstOption">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">School</th>
                                            <th scope="col">subject</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="row">01</th>
                                            <td>Sri Dharmaloka College</td>
                                            <td>Table</td>
                                            <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste a
                                                quisquam amet, delectus
                                                assumenda aut aliquid quod impedit eius cum nulla debitis quo illum
                                                repellat eum hic. Eius,
                                                nobis vel.</td>
                                            <td><button class="btn btn-success" type="submit">Solved</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Request Table End -->


            <!-- Search Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="col-sm-12 col-xl-12">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h3 class="mb-4 text-dark">School Search</h3>
                        <div class="row g-2">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                </select>
                                <label for="floatingSelect">School Name</label>
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
            <!-- Search End -->


            <!-- Accessories Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded p-4">
                    <h3 class="mb-4 text-dark">school supplies list</h3>
                    <div class="row g-4">
                        <div class="col-sm-12 col-xl-12" id="AlFirstOption">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">Grade</th>
                                            <th scope="col">Chair</th>
                                            <th scope="col">Table</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="row">1</th>
                                            <td>50</td>
                                            <td>50</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Accessories Table End -->


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
        hamburger('accessories')
    </script>
</body>

</html>