<!DOCTYPE html>
<html lang="en">

<head>
    @include('zonal.components.head')
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        @include('public_components.spinner')
        <!-- Spinner End -->

        <!-- Sidebar Start -->
        @include('zonal.components.hamburger')
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('zonal.components.navbar')
            <!-- Navbar End -->

            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4" style="min-height: 80vh;">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h3 class="mb-4 text-dark">Students Count</h3>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <strong>Warning! </strong> {{ $error }} <br/>
                                @endforeach
                            </div>
                            @endif
                            <form action="{{ route('get.school.student') }}">
                                <div class="row g-2">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <select class="form-select bg-secondary text-dark" name="school" id="school"
                                                aria-label="Floating label select example">
                                                <option selected value="0">Select A School</option>
                                                @foreach ($schools as $key => $school)
                                                    <option value="{{ $key }}">{{ $school }}</option>
                                                @endforeach
                                            </select>
                                            <label for="floatingSelect">School List</label>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @if (session('school'))
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <p class="mb-4 text-dark">Student Summary for <strong style="text-decoration: underline;">{{ session('school') }}</strong></h6>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Grade</th>
                                            <th scope="col">Male</th>
                                            <th scope="col">Female</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">classes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (session('students') as $key => $student)
                                        <tr>
                                            <td class="text-dark">{{ $key + 1 }}</td>
                                            <td class="text-dark">{{ $student->male }}</td>
                                            <td class="text-dark">{{ $student->female }}</td>
                                            <td class="text-dark">{{ $student->total }}</td>
                                            <td class="text-dark">{{ $student->classes }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif
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

    @include('public_components.js')
    <script>
        hamburger("studentCount");
    </script>
</body>

</html>
