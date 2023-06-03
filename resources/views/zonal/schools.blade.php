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

            <!-- Search Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="col-sm-12 col-xl-12">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h3 class="mb-4 text-dark">School Search</h3>
                        <form action="{{ route('search.school') }}">
                            <div class="row g-2">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <strong>WARNING : </strong> Please select a school name to view details.
                                    </div>
                                @endif
                                <div class="form-floating">
                                    <select class="form-select text-dark bg-secondary" name="school"
                                        aria-label="Floating label select example">
                                        <option selected value="0">Open this select menu</option>
                                        @foreach ($schools as $key => $school)
                                            <option value="{{ $key }}">{{ $school }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">Select A School Name</label>
                                </div>
                                <div>
                                    <div class="d-grid gap-2 col-6 mx-auto mt-3">
                                        <button onclick="" type="submit"
                                            class="btn btn-primary col-sm-12 col-xl-12">Search<i
                                                class="bi bi-search ms-2"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Search End -->

            <div style="min-height: 55vh;">
            @if (session('details'))
                <!-- Box Start -->
                <div class="container-fluid pt-4 px-4">
                    <div class="row g-4">
                        <div class="col-sm-6 col-xl-6">
                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                <i class="fas fa-user-graduate fa-3x text-primary"></i>
                                <div class="ms-3">
                                    <p class="mb-2">Total Student</p>
                                    <h6 class="mb-0 text-dark">{{ session('students') }}</h6>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-6">
                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                <i class="fas fa-user-tie fa-3x text-primary"></i>
                                <div class="ms-3">
                                    <p class="mb-2">Total Teacher</p>
                                    <h6 class="mb-0 text-dark">{{ session('teachers') }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Box End -->

                <!-- Details Start -->
                <div class="container-fluid pt-4 px-4">
                    <div class="card">
                        <h3 class="text-dark card-header">School Details</h3>
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="FullName" class="form-label">School Name</label>
                                    <input disabled class="form-control bg-secondary text-dark" type="text"
                                        id="fullName" name="fullName" value="{{ session('details')->name }}" autofocus />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="Namewithinitials" class="form-label">Mobile Number</label>
                                    <input disabled class="form-control bg-secondary text-dark" type="text"
                                        name="initialName" id="initialName" value="{{ session('details')->mobile }}" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="Dateofbirth" class="form-label">School Type</label>
                                    <input disabled class="form-control bg-secondary text-dark" type="text"
                                        id="dob" name="Dateofbirth" value="{{ session('details')->approved_grades }}" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="Gender" class="form-label">Available Grades</label>
                                    <input type="text" disabled class="form-control bg-secondary text-dark"
                                        id="Gender" name="Gender" value="{{ session('details')->grades_in_school }}" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="address" class="form-label">Education Sector</label>
                                    <input disabled type="text" class="form-control bg-secondary text-dark"
                                        id="address" name="address" value="{{ session('details')->sector }}a" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="Indexnumber" class="form-label">Education Zone</label>
                                    <input class="text-dark form-control bg-secondary" disabled type="text"
                                        id="studentIndexNumber" name="Indexnumber" value="{{ session('details')->zone }}" maxlength="6" />
                                </div>
                                <div class="mb-3">
                                    <label for="Scholarship" class="form-label">Address</label>
                                    <input type="text" class="text-dark form-control bg-secondary" id="scholarship"
                                        name="Scholarship" value="{{ session('details')->address }}" disabled />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Details End -->
            @endif
          </div>

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
        hamburger('schools')
    </script>
</body>

</html>
