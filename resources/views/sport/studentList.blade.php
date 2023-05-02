<!DOCTYPE html>
<html lang="en">

<head>
    @include('sport.components.head')
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        @include('public_components.spinner')
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        @include('sport.components.hamburger')
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('sport.components.navbar')
            <!-- Navbar End -->


            <!-- Filter start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h3 class="text-dark">Search Student</h3>
                            <div class="input-group mb-3">
                              <input type="text" class="form-control bg-secondary text-dark" placeholder="Search By Name"
                                aria-label="Recipient's username" aria-describedby="button-addon2" id="bookId">
                              <button class="btn btn-primary" type="button" id="button-addon2" onclick="searchById();">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Filter end -->


            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h3 class="text-dark mb-4">Student List</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Index No</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Age group</th>
                                            <th scope="col">Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">146861</th>
                                            <td>john doe</td>
                                            <td>under 13</td>
                                            <td>Discover 15 Sport Dashboard designs on Dribbble. Your resource to
                                                discover and connect with designers worldwide.
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">146861</th>
                                            <td>john doe</td>
                                            <td>under 13</td>
                                            <td>Discover 15 Sport Dashboard designs on Dribbble. Your resource to
                                                discover and connect with designers worldwide.
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">146861</th>
                                            <td>john doe</td>
                                            <td>under 13</td>
                                            <td>Discover 15 Sport Dashboard designs on Dribbble. Your resource to
                                                discover and connect with designers worldwide.
                                            </td>
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

    <!-- JavaScript Libraries -->
    @include('public_components.js')
    <!-- Template Javascript -->
    
</body>

</html>