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
                                    @if ($errors->has('sport_validation_errors'))
                                        <div class="alert alert-danger col-md-8 offset-md-2">
                                            <ul>
                                                @foreach (json_decode($errors->first('sport_validation_errors'), true) as $key => $error)
                                                    @if (is_array($error))
                                                        @foreach ($error as $item)
                                                            <li>{{ $item }}</li>
                                                        @endforeach
                                                    @else
                                                        <li>{{ $error }}</li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    @elseif ($errors->has('sport_errors'))
                                    <div class="alert alert-danger col-md-8 offset-md-2">
                                        @foreach ($errors->get('sport_errors') as $texts)
                                            @foreach ($texts as $text)
                                                <li>{{ $text }}</li>
                                            @endforeach
                                        @endforeach
                                    </div>
                                    @elseif ($errors->has('sport_success'))
                                        <div class="alert alert-success col-md-8 offset-md-2">
                                            @foreach ($errors->get('sport_success') as $texts)
                                                @foreach ($texts as $text)
                                                    <li>{{ $text }}</li>
                                                @endforeach
                                            @endforeach
                                        </div>
                                    @endif

                                    <div class="col-12 col-md-6">
                                        <div class="form-floating mb-3">
                                            <input required type="text" class="form-control text-dark bg-secondary"
                                                name="name" placeholder="name@example.com">
                                            <label for="floatingInput">Sport Name</label>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-floating">
                                            <select required class="form-select bg-secondary text-dark" name="category"
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
                                            <textarea required class="form-control bg-secondary text-dark" placeholder="Leave a comment here" name="description"
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
                                    @if ($errors->has('coach_validation_errors'))
                                        <div class="alert alert-danger col-md-8 offset-md-2">
                                            <ul>
                                                @foreach (json_decode($errors->first('coach_validation_errors'), true) as $key => $error)
                                                    @if (is_array($error))
                                                        @foreach ($error as $item)
                                                            <li>{{ $item }}</li>
                                                        @endforeach
                                                    @else
                                                        <li>{{ $error }}</li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    @elseif ($errors->has('coach_errors'))
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->get('coach_errors') as $errors)
                                                    @foreach ($errors as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                @endforeach
                                            </ul>
                                        </div>
                                    @elseif ($errors->has('coach_success'))
                                        <div class="alert alert-success">
                                            @foreach ($errors->get('coach_success') as $texts)
                                                @foreach ($texts as $text)
                                                    <li>{{ $text }}</li>
                                                @endforeach
                                            @endforeach
                                        </div>
                                    @endif

                                    <div class="mb-3 col-md-6">
                                        <label for="FullName" class="form-label">Full Name</label>
                                        <input required class="form-control bg-secondary text-dark" type="text"
                                            name="name" value="" autofocus
                                            placeholder="Enter Your Full Name" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="NIC" class="form-label">NIC</label>
                                        <input required class="form-control bg-secondary text-dark" type="text"
                                            name="nic" id="nicNumber" value="" placeholder="Enter Your NIC" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="NIC" class="form-label">Email Address</label>
                                        <input required class="form-control bg-secondary text-dark" type="text"
                                            name="email" id="emailAddress" value=""
                                            placeholder="Enter Your Email Address" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="NIC" class="form-label">Password</label>
                                        <input required class="form-control bg-secondary text-dark" type="password"
                                            name="password" id="password" value=""
                                            placeholder="Enter A Secure Password" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="phoneNumber">Phone Number</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text">LK (+94)</span>
                                            <input required type="text" name="mobile"
                                                class="form-control  bg-secondary text-dark" value=""
                                                placeholder="Enter Your Phone Number" />
                                        </div>
                                    </div>
                                    <table class="table table-bordered table-hover">
                                        <thead class="table-dark">
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($sports as $key => $sport)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $sport['name'] }}</td>
                                                    <td>
                                                        <input type="checkbox" name="sports[]"
                                                            value="{{ $sport['name'] }}" />
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

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
    </script>
</body>

</html>
