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


            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h3 class="mb-4">Student Requests</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">Index No</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Class</th>
                                            <th colspan="2" scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">200505904455</th>
                                            <td>Kamal</td>
                                            <td>4-E</td>
                                            <td><button type="button" class="btn btn-success btn-sm">Approve</button>
                                            </td>
                                            <td><button type="button" class="btn btn-primary btn-sm">Reject</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">200505904455</th>
                                            <td>Kamal</td>
                                            <td>4-E</td>
                                            <td><button type="button" class="btn btn-success btn-sm">Approve</button>
                                            </td>
                                            <td><button type="button" class="btn btn-primary btn-sm">Reject</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">200505904455</th>
                                            <td>Kamal</td>
                                            <td>4-E</td>
                                            <td><button type="button" class="btn btn-success btn-sm">Approve</button>
                                            </td>
                                            <td><button type="button" class="btn btn-primary btn-sm">Reject</button>
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