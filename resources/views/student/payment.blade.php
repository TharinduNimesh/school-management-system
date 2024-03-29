<!DOCTYPE html>
<html lang="en">

<head>
    @include('student.components.head')
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">

        @include('public_components.spinner')
        @include('student.components.hamburger')

        <div class="content">
            @include('student.components.navbar')

            <div class="container-fluid pt-4 px-4" style="min-height: 80vh;">
                <div class="col-12">
                    <div class="h-100 bg-secondary rounded p-4">
                        <h3 class="text-primary">Payment History</h3>
                        <div class="col-12 table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Year</th>
                                    <th scope="col">Class</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($payments != null)
                                @foreach ($payments as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item["year"] }}</td>
                                        <td>{{ $item["grade"] . "-" . $item["class"] }}</td>
                                        <td>
                                            @if ($item["isPayment"] == "yes")
                                                <span class="px-5 py-1 rounded bg-success" style="color: white;">Yes</span>
                                            @else
                                                <span class="px-5 py-1 rounded bg-danger" style="color: white;">No</span>
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
    hamburger('payment')
</script>
</body>

</html>
