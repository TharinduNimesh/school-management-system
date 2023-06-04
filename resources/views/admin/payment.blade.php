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


            <!-- Sending Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="col-sm-12 col-xl-12">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h3 class="mb-4 text-dark"></h3>
                        <div class="row g-2">
                            <div class="form-floating col-12 col-md-6">
                                <input type="text" class="form-control bg-secondary text-dark" id="subject"
                                    placeholder="Subject" />
                                <label for="">Subject</label>
                            </div>
                            <div class="col-12 col-md-6">
                                <input class="form-control form-control-lg bg-secondary text-dark" id="file"
                                    type="file">
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-floating">
                                    <textarea class="form-control bg-secondary text-dark" placeholder="Description"
                                        id="description"></textarea>
                                    <label for="floatingTextarea">Description</label>
                                </div>
                            </div>
                            <div>
                                <div class="d-grid gap-2 col-6 mx-auto mt-3">
                                    <button onclick="" type="submit"
                                        class="btn btn-primary col-sm-12 col-xl-12">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sending End -->


            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4"></h6>
                            <div class="table-responsive">
                                <table class="table table-bordered align-middle">
                                    <thead>
                                        <tr>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Remaining balance</th>
                                            <th colspan="2" scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="row">Wahale</td>
                                            <td scope="row">Lorem ipsum dolor, sit amet consectetur</td>
                                            <td scope="row">2023/05/05</td>
                                            <td scope="row">Rs.500000</td>
                                            <td scope="row">Rs.10000</td>
                                            <td><button type="button" class="btn btn-success" data-bs-target="#addModal"
                                                    data-bs-toggle="modal">Add
                                                    Record</button></td>
                                            <td><button type="button" class="btn btn-success data"
                                                    data-bs-toggle="modal" data-bs-target="#viewModal">View
                                                    Record</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->


            <!-- Add Record Modal Start -->
            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Add
                                Record</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-2">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control bg-secondary text-dark" placeholder="Description"
                                            id="description"></textarea>
                                        <label for="floatingTextarea">Description</label>
                                    </div>
                                </div>
                                <div class="form-floating col-12 col-md-6">
                                    <input type="text" class="form-control bg-secondary text-dark" id="cost"
                                        placeholder="Cost" />
                                    <label for="floatingSelectGrid">Cost</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input class="form-control form-control-lg bg-secondary text-dark" id="file"
                                        type="file">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-info" onclick="">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Record Modal End -->


            <!-- History Modal Start -->
            <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">History</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-2">
                                <div class="col-12 col-md-6">
                                    <label for="floatingSelectGrid" class="form-label">Cost</label>
                                    <input type="text" class="form-control bg-secondary text-dark" id="cost"
                                        placeholder="Cost" disabled />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="floatingSelectGrid" class="form-label">Date</label>
                                    <input type="text" class="form-control bg-secondary text-dark" id="date"
                                        placeholder="Date" disabled />
                                </div>
                                <div class="col-12">
                                    <label for="floatingSelectGrid" class="form-label">Subject</label>
                                    <input type="text" class="form-control bg-secondary text-dark" id="subject"
                                        placeholder="Subject" disabled />
                                </div>
                                <div class="col-12">
                                    <label for="floatingTextarea" class="form-label">Description</label>
                                    <textarea class="form-control bg-secondary text-dark" placeholder="Description"
                                        id="description" disabled></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- History Modal End -->


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