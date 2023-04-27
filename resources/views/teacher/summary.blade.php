<!DOCTYPE html>
<html lang="en">

<head>
    @include('teacher.components.head')
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        @include('public_components.spinner')

        @include('teacher.components.hamburger')

        <!-- Content Start -->
        <div class="content">
            @include('teacher.components.navbar')

            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4" style="min-height: 80vh;">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h3 class="mb-0 text-dark">My Time Table</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">No</th>
                                    <th scope="col">Index No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Attendance</th>
                                    <th scope="col">Payment</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->index }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->attendance }}%</td>
                                        <td>
                                        @if ($item->payment == 'yes')
                                            <span class="px-5 py-1 bg-success rounded" style="color: white;">Yes</span>
                                        @else 
                                            <span class="px-5 py-1 bg-danger rounded" style="color: white;">No</span>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Table End -->


            @include('public_components.footer')
        </div>
        <!-- Content End -->

        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    @include('public_components.js')

    <script>
        hamburger("summary")
    </script>
</body>

</html>