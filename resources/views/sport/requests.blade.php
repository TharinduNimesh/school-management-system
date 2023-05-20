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
            <div class="container-fluid pt-4 px-4" style="min-height: 80vh;">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h3 class="mb-4 text-dark">Student Requests</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Index No</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Sport</th>
                                            <th scope="col">Class</th>
                                            <th colspan="2" scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($requests as $request)
                                            <tr>
                                                <th scope="row">{{ $request["index_number"] }}</th>
                                                <td>{{ $request["name"] }}</td>
                                                <td>{{ $request["sport"] }}</td>
                                                <td>{{ $request["class"] }}</td>
                                                <td>
                                                    <form action="{{ route('sport.request.action') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $request['_id'] }}" />
                                                        <input type="hidden" name="action" value="approve" />
                                                        <button type="submit"
                                                        class="btn btn-success btn-sm">Approve</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="{{ route('sport.request.action') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $request['_id'] }}" />
                                                        <input type="hidden" name="action" value="reject" />
                                                        <button type="submit"
                                                        class="btn btn-danger btn-sm">Reject</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
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
