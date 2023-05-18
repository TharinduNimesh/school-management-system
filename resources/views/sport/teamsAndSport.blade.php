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


            <!-- Content Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="col-sm-12 col-xl-12">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h3 class="mb-4 text-dark">Team Search</h3>
                        <div class="row g-2">
                            <div class="col-md">
                                <div class="form-floating">
                                    <select class="form-select bg-secondary text-dark" id="Sport"
                                        aria-label="Floating label select example">
                                        <option selected value="0">Select A Sport</option>
                                        <option>Cricket</option>
                                        <option>None</option>
                                    </select>
                                    <label for="floatingSelect">Sport Title List</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <select class="form-select bg-secondary text-dark" id="Team"
                                        aria-label="Floating label select example">
                                        <option selected value="0">Select A Team</option>
                                        <option>Cricket</option>
                                        <option>None</option>
                                    </select>
                                    <label for="floatingSelect">Team Title List</label>
                                </div>
                            </div>
                            <div>
                                <div class="d-grid gap-2 col-6 mx-auto mt-3">
                                    <button type="submit" class="btn btn-primary col-sm-12 col-xl-12">Search<i
                                            class="bi bi-search ms-2"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- Search End -->


                        <!-- Table Start -->
                        <h3 class="mb-4 mt-4 text-dark">Result List</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Index No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Join Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Kamal</th>
                                        <td>200505904455</td>
                                        <td>4 Month</td>
                                        <td><button type="button" class="btn btn-primary btn-sm">Remove</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Kamal</th>
                                        <td>200505904455</td>
                                        <td>4 Month</td>
                                        <td><button type="button" class="btn btn-primary btn-sm">Remove</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Kamal</th>
                                        <td>200505904455</td>
                                        <td>4 Month</td>
                                        <td><button type="button" class="btn btn-primary btn-sm">Remove</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Table End -->

                    </div>
                </div>
            </div>
            <!-- Content End -->


            <!-- Student Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="col-sm-12 col-xl-12">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h3 class="mb-4 text-dark">Search Student</h3>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control bg-secondary text-dark" id="Index"
                                placeholder="name@example.com">
                            <label for="floatingInput">Index Number</label>
                        </div>
                        <div class="form-floating">
                            <select class="form-select bg-secondary text-dark" id="Team"
                                aria-label="Floating label select example">
                                <option selected value="0">Select A Team</option>
                                <option>Cricket</option>
                                <option>None</option>
                            </select>
                            <label for="floatingSelect">Team Title List</label>
                        </div>
                        <h5 for="" class="col-12 pb-2 text-center text-dark">If Team not exist</h5>
                        <div class="input-group mb-3 mb-5">
                            <input type="text" class="form-control bg-secondary text-dark" id="Add Team"
                                placeholder="Add Team" aria-label="Recipient's username"
                                aria-describedby="basic-addon2">
                            <button class="btn-lg btn btn-outline-danger" onclick="Addteam();"><i
                                    class="fa-lg bi-plus-circle-fill"></i></button>
                        </div>
                        <div class="form-floating">
                            <select class="form-select bg-secondary text-dark" id="Sport"
                                aria-label="Floating label select example">
                                <option selected value="0">Select A Sport</option>
                                <option>Cricket</option>
                                <option>None</option>
                            </select>
                            <label for="floatingSelect">Sport Title List</label>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto mt-3">
                            <button class="btn btn-primary" type="button" onclick="addNewBook();">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Student End -->


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