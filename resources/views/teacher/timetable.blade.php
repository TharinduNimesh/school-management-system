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
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h3 class="mb-0 text-dark">My Time Table</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">PERIOD</th>
                                    <th scope="col">TIME</th>
                                    <th scope="col">MONDAY</th>
                                    <th scope="col">TUESDAY</th>
                                    <th scope="col">WEDNESDAY</th>
                                    <th scope="col">THURSDAY</th>
                                    <th scope="col">FRIDAY</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i=0; $i<8; $i++)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>07:50-08:40</td>
                                        <td class="viewTeacher">
                                            <p class="subject">
                                                Tharindu
                                            </p>
                                            <p class="teacher">
                                                English
                                            </p>
                                        </td>
                                        <td class="viewTeacher">
                                            <p class="subject">$123</p>
                                            <p class="teacher">Tharindu</p>
                                        </td>
                                        <td class="viewTeacher">
                                            <p class="subject">$123</p>
                                            <p class="teacher">Tharindu</p>
                                        </td>
                                        <td class="viewTeacher">
                                            <p class="subject">Paid</p>
                                            <p class="teacher">Tharindu</p>
                                        </td>
                                        <td class="viewTeacher">
                                            <p class="subject">Paid</p>
                                            <p class="teacher">Tharindu</p>
                                        </td>
                                    </tr>
                                @endfor
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
        hamburger("timetable")
    </script>
</body>

</html>