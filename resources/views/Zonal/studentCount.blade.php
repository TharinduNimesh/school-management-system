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

            <!--//--Student Count start--//-->
            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                <h3 class="mb-4">Students Count</h3>
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">School Search</h6>
                            <div class="row g-2">
                                <div class="col-md-8 col-12">
                                    <div class="form-floating">
                                        <input class="form-control" id="floatingSelectGrid" type="text"
                                            placeholder="Index Number">
                                        <label for="floatingSelectGrid">School Name</label>
                                        <div class="mt-3">
                                            <button type="button" class="btn btn-primary btn-lg">Search<i class="bi bi-search ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Student Count</h6>
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
       <!-- //--Student Count end--//-->

        </div>
    </div>
</body>


</html>