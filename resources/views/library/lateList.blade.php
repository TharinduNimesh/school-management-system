<!DOCTYPE html>
<html lang="en">

<head>
    @include('library.components.head')
</head>

<body>
  <div class="container-fluid position-relative d-flex p-0">
    @include('public_components.spinner')

    @include('library.components.hamburger')


    <!-- Content Start -->
    <div class="content">
        @include('library.components.navbar')
        <div class="container-fluid" style="min-height: 80vh">
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <h3 class="text-dark">Students Late List</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Student</th>
                                    <th>Book Title</th>
                                    <th>Book_ID</th>
                                    <th>End Date</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <h3 class="text-dark">Teachers Late List</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Teacher</th>
                                    <th>Book Title</th>
                                    <th>Book ID</th>
                                    <th>End Date</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
            <!-- Form End -->

            @include('public_components.footer')
        </div>
    </div>
    <!-- Content End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    </div>

    @include('public_components.js')
    <script>
        hamburger("lateList");
    </script>
</body>
</html>