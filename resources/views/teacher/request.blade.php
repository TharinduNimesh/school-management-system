<!DOCTYPE html>
<html lang="en">

<head>
    @include("teacher.components.head")
    <style>
        .space {
            white-space: nowrap;
        }
    </style>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        @include('public_components.spinner')
        <!-- Spinner End -->

        <!-- Sidebar Start -->
        @include("teacher.components.hamburger")
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('teacher.components.navbar')
            <!-- Navbar End -->

            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4" style="min-height: 80vh">
                <div class="bg-secondary rounded p-4">
                    <h3 class="card-header mb-4 text-dark">Request</h3>
                    <div class="row g-4">
                        <div class="col-sm-12 col-xl-12" id="AlFirstOption">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col" class="space">Need To Change</th>
                                            <th scope="col" class="space">Old One</th>
                                            <th scope="col" class="space">New One</th>
                                            <th scope="col" colspan="2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($requests as $request)
                                        <tr>
                                            <td class="space">{{ $request["name"] }}</th>
                                            <td class="space">{{ $request["category"] }}</td>
                                            <td class="space">{{ $request["old"] }}</td>
                                            <td class="space">{{ $request["new"] }}</td>
                                            <td class="space">
                                                <form action="{{ route('action.changes') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $request["_id"] }}">
                                                    <input type="hidden" name="type" value="approve">
                                                <button type="submit" class="btn btn-success">Approve</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{ route('action.changes') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $request["_id"] }}">
                                                    <input type="hidden" name="type" value="reject">
                                                    <button type="submit" class="btn btn-danger">Reject</button>
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
    <script>
        hamburger('request');
    </script>

</body>

</html>