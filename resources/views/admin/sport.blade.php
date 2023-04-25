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


            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h3 class="mb-4 text-dark">Add Extracurricular activities</h3>
                            <form action="{{ route('add.sport') }}" method="post">
                                @csrf
                                <div class="row g-2">
                                    @if ($errors->any())
                                    <div class="alert alert-danger col-md-8 offset-md-2">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif

                                    @if (isset($success))
                                    <div class="alert alert-success col-md-8 offset-md-2">
                                            @foreach ($success->all() as $text)
                                                {{ $text }}
                                            @endforeach
                                    </div>
                                    @endif

                                    <div class="col-12 col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control text-dark bg-secondary" name="name"
                                                placeholder="name@example.com">
                                            <label for="floatingInput">Sport Name</label>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-floating">
                                            <select class="form-select bg-secondary text-dark" name="category"
                                                aria-label="Floating label select example">
                                                <option selected value="0">Open this select menu</option>
                                                <option>Sport</option>
                                                <option>Commity</option>

                                            </select>
                                            <label for="floatingSelect">Select Category</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control bg-secondary text-dark"
                                                placeholder="Leave a comment here" name="description"
                                                style="height: 100px"></textarea>
                                            <label for="floatingTextarea2">Description</label>
                                        </div>
                                    </div>

                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <button class="btn btn-primary" type="submit">Add</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h3 class="mb-4 text-dark">Add Coaches</h3>
                            <form action="{{ route('add.coach') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-8 col-12 offset-md-2">
                                        <div class="alert alert-warning text-center">
                                            &#9888; Please add the sport before adding a coach. If the sport does not
                                            exist in the database, it will not be available in the list for selection.
                                        </div>
                                    </div>
                                    @if (isset($search_errors))
                                        <div class="aler alert-danger">
                                            
                                        </div>
                                    @endif

                                    <div class="mb-3 col-md-6">
                                        <label for="FullName" class="form-label">Full Name</label>
                                        <input class="form-control bg-secondary text-dark" type="text" name="name"
                                            value="" autofocus placeholder="Enter Full Name" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="NIC" class="form-label">NIC</label>
                                        <input class="form-control bg-secondary text-dark" type="text" name="nic"
                                            id="nicNumber" value="" placeholder="Enter NIC" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="NIC" class="form-label">Password</label>
                                        <input class="form-control bg-secondary text-dark" type="password" name="password"
                                            id="password" value="" placeholder="Enter A Password" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="phoneNumber">Phone Number</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text">LK (+94)</span>
                                            <input type="text" name="mobile"
                                                class="form-control  bg-secondary text-dark" value=""
                                                placeholder="Enter Phone Number" />
                                        </div>
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="FullName" class="form-label">Select A Sport</label>
                                        <select class="form-select bg-secondary text-dark"
                                            aria-label="Default select example" id="sportId">
                                            <option selected value="0">Open this select menu</option>
                                            @foreach ($sports as $sport)
                                                <option>{{ $sport->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <button class="btn btn-primary" type="submit">Add
                                            Coach</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form End -->


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

        hamburger("sports");
        function addSport() {
            const name = document.getElementById("sportName");
            const category = document.getElementById("category");
            const description = document.getElementById("description");

            if (name.value.trim() == '' || category.value == '0' || description.value.trim() == '') {
                alert("Error");
            }
            else {
                var form = new FormData();
                form.append("name", name.value);
                form.append("category", category.value);
                form.append("description", description.value);

                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // handle response
                        var response = xhr.responseText;
                        if (response == 'success') {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'New Sport Added Successfully',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                        else {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Oops...',
                                text: "An activity with this name already exists. Please check back and try again"
                            });
                        }
                    }
                }

                xhr.open("POST", "process/addSports.php", true);
                xhr.send(form);
            }
        }

        function addCoach() {
            const fullName = document.getElementById("coachName");
            const nic = document.getElementById("nicNumber");
            const mobile = document.getElementById("mobileNumber");
            const sport = document.getElementById("sportId");
            const password = document.getElementById("password");

            if (fullName.value.trim() == '' || nic.value.trim() == '' || mobile.value.trim() == '' || sport.value.trim() == '0' || password.value.trim() == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: "Please Fill All Text Field Before Submitting"
                });
            }
            else {
                var form = new FormData();
                form.append("name", fullName.value);
                form.append("nic", nic.value);
                form.append("mobile", mobile.value);
                form.append("sport", sport.value);
                form.append("password", password.value);

                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // handle response
                        var response = xhr.responseText;
                        if (response == 'isDoing') {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Oops...',
                                text: "This trainer is already doing this activity"
                            });
                        }
                        else {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Added Trainer to This Activity Successfully',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    }
                }

                xhr.open("POST", "process/addCoachToSports.php", true);
                xhr.send(form);
            }
        }
    </script>
</body>

</html>
