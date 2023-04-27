<!DOCTYPE html>
<html lang="en">
<head>
    @include('student.components.head')

    <style>
        .aStatus {
            padding: 5px;
            border-radius: 10px;
            color: black;
        }

        .a {
            background: rgb(0, 255, 0);
        }

        .b {
            background: red;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">

        @include('public_components.spinner')

        @include('student.components.hamburger')
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            @include('student.components.navbar')

            <div class="container-fluid pt-4 px-4" style="min-height: 80vh;">
                <div class="col-12">
                    <div class="h-100 bg-secondary rounded p-4">
                        <h3 class="text-primary">Attendance Details</h3>
                        <div class="col-12 table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($attendance != null)
                                    @foreach ($attendance as $roll => $item)
                                        <tr>
                                            <td>{{ $roll + 1 }}</td>
                                            <td>{{ $item["date"] }}</td>
                                            <td>
                                                @if($item["status"] == 'present')
                                                    <span class="px-5 py-1 rounded bg-success" style="color: white;">
                                                        Present
                                                    </span>
                                                @else
                                                    <span class="px-5 py-1 rounded bg-danger" style="color: white;">
                                                        Absent
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>

           @include('public_components.footer')
    </div>
    <!-- Content End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

@include('public_components.js')
<script>
    // function hamburger() {
    //     var items = document.getElementsByName("ham-item");
    //     items.forEach(item => {
    //         item.classList.remove('active');
    //     });

    //     document.getElementById('attendance').classList.add('active');
    // }

    hamburger('attendance');
</script>
</body>
</html>
