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

            <!-- Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-3">
                    <div class="col-md-6 col-xl-6">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fas text-dark fa-3x">&#xf56a;</i>
                            <div class="ms-3">
                                <p class="mb-2">Total Desks</p>
                                <h6 class="mb-0 text-dark">
                                    4000
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-6">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fas fa-3x text-dark">&#xf6c0;</i>
                            <div class="ms-3">
                                <p class="mb-2">Total Chairs</p>
                                <h6 class="mb-0 text-dark">
                                    4000
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->
            <!-- overflow chat Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h3 class="text-dark">Requested Accessories</h3>
                     <div class="overflow-y-scroll table-responsive">
                <table class="table table-bordered ">
                    <thead class="table-dark">
                      <tr>
                        <th scope="col">Grade</th>
                        <th scope="col">class</th>
                        <th scope="col">class Teacher</th>
                        <th scope="col">Date</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Description</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">10</th>
                        <td>F</td>
                        <td>Sachith Prasan</td>
                        <td>05-05-2023</td>
                        <td>Need desks and chairs</td>
                        <td>4-desks and 4-chairs</td>
                      </tr>
                      <tr>
                        <th scope="row">10</th>
                        <td>F</td>
                        <td>Sachith Prasan</td>
                        <td>05-05-2023</td>
                        <td>Need desks and chairs</td>
                        <td>4-desks and 4-chairs</td>
                      </tr>
                      <tr>
                        <th scope="row">10</th>
                        <td>F</td>
                        <td>Sachith Prasan</td>
                        <td>05-05-2023</td>
                        <td>Need desks and chairs</td>
                        <td>4-desks and 4-chairs</td>
                      </tr>
                    </tbody>
                  </table>

                  </div>
                </div>
             </div>
            </div>     
        </div>
            <!-- overflow chat end -->
            <!-- search by classes Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="row g-2">
                        <div class="col-md-5 col-12">
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-4 px-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <!-- Account -->
                            <div class="card-body">
                                <div class="row">
                                <h3 class="text-dark">Search Accessories</h3>
                                <hr />
                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="" class="form-label ">Select the Grade</label>
                                        <select class="form-select bg-secondary text-dark" aria-label="Default select example">
                                            <option selected>Select the Grade</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                          </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="" class="form-label ">Select the Class</label>
                                        <select class="form-select bg-secondary text-dark" aria-label="Default select example">
                                            <option selected>Select the class</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                          </select>
                                    </div>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                                    <button class="btn btn-primary me-md-2" type="button">Search</button>
                                    </div>
                                    <hr>
                                    <div class="mb-3 col-md-6">
                                        <label for="" class="form-label text-dark">Number of Desks</label>
                                        <input disabled type="text" class="form-control  bg-secondary text-dark"
                                            id="deskCount" name="Desk" value="Ex : 12" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="" class="form-label text-dark">Number of Chairs</label>
                                        <input disabled type="text" class="form-control  bg-secondary text-dark"
                                            id="chairCount" name="chair" value="Ex : 12" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                         <label class="form-label text-dark">Class Teacher Name</label>
                                        <input disabled type="text" class="form-control  bg-secondary text-dark" id="teacherName"
                                            name="Name" value="Ex : Teacher name" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label text-dark">Contact Number</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text">LK (+94)</span>
                                            <input disabled type="text" id="mobile" name="phoneNumber"
                                                class="form-control  bg-secondary text-dark" value="Ex: 771112223" />
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- /Account -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- search by classes End -->

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
        hamburger("accessories");
    </script>

</body>
</html>