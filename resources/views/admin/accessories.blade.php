<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.components.head')
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
        @include('admin.components.sidebar')
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('admin.components.navbar')
            <!-- Navbar End -->

            <!-- Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-3">
                    <div class="col-md-6 col-xl-6">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fas text-dark fa-3x">&#xf56a;</i>
                            <div class="ms-3">
                                <p class="mb-2">Total Desks</p>
                                <h6 class="mb-0 text-dark">
                                    {{ $totalDesks }}
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-6">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fas fa-3x text-dark">&#xf6c0;</i>
                            <div class="ms-3">
                                <p class="mb-2">Total Chairs</p>
                                <h6 class="mb-0 text-dark">
                                    {{ $totalChairs }}
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->
            <!-- overflow chat Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h3 class="text-dark">Requested Accessories</h3>
                            <div class="overflow-y-scroll table-responsive">
                                <table class="table table-bordered ">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>No</th>
                                            <th scope="col">Grade</th>
                                            <th scope="col">class</th>
                                            <th scope="col" class="space">class Teacher</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Subject</th>
                                            <th scope="col" class="space">Description</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($requests) > 0)
                                            @foreach ($requests as $key => $accessory)
                                                <tr>
                                                    <th scope="row">{{ $key + 1 }}</th>
                                                    <th scope="row">{{ $accessory->grade }}</th>
                                                    <td>{{ $accessory->class }}</td>
                                                    <td>{{ $accessory->teacher_name }}</td>
                                                    <td>{{ $accessory->date }}</td>
                                                    <td class="space">{{ $accessory->subject }}</td>
                                                    <td class="space">{{ $accessory->description }}</td>
                                                    <td>
                                                        <form
                                                            action="{{ route('delete.accessory.request', $accessory['_id']) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-success"
                                                                type="submit">Solved</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <th scope="row" colspan="8"
                                                    style="background-color: orange; color: red;">No Accessories
                                                    Requested</th>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- overflow chat end -->
            <!-- search by classes Start -->

            <div class="container-fluid pt-4 px-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <!-- Account -->
                            <div class="card-body">
                                <div class="row">
                                    <h3 class="text-dark">Search Accessories</h3>
                                    <hr />
                                    <div class="mb-3 col-md-6 col-12">
                                        <label for="" class="form-label ">Select the Grade</label>
                                        <select class="form-select bg-secondary text-dark"
                                            aria-label="Default select example"
                                            id="grade">
                                            <option selected value="0">Select the Grade</option>
                                            @for ($i = 1; $i <= 13; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="" class="form-label ">Select the Class</label>
                                        <select class="form-select bg-secondary text-dark"
                                            aria-label="Default select example"
                                            id="class">
                                            <option selected value="0">Select the class</option>
                                            @for ($i = 65; $i <= 72; $i++)
                                                <option value="{{ chr($i) }}">{{ chr($i) }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                                        <button class="btn btn-primary me-md-2" onclick="search();" type="button">Search</button>
                                    </div>
                                    <hr>
                                    <div class="mb-3 col-md-6">
                                        <label for="" class="form-label ">Number of Desks</label>
                                        <input disabled type="text" class="form-control  bg-secondary text-dark"
                                            id="deskCount" name="Desk" value="Ex : 43" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="" class="form-label ">Number of Chairs</label>
                                        <input disabled type="text" class="form-control  bg-secondary text-dark"
                                            id="chairCount" name="chair" value="Ex : 43" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label ">Class Teacher Name</label>
                                        <input disabled type="text" class="form-control  bg-secondary text-dark"
                                            id="teacherName" name="Name" value="Ex : John Doe" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label ">Student Count</label>
                                        <input disabled type="text" class="form-control  bg-secondary text-dark"
                                            id="studentCount" name="Name" value="Ex : 45" />
                                    </div>

                                </div>
                            </div>
                            <!-- /Account -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- search by classes End -->

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
        hamburger("accessories");
        // create search function and grade and class to server, also validate grade and class 
        function search() {
            document.getElementById('spinner').classList.add('show');
            const grade = document.getElementById('grade').value;
            const classs = document.getElementById('class').value;

            // set sample Ex data to input fields
            document.getElementById('deskCount').value = "Ex : 43";
            document.getElementById('chairCount').value = "Ex : 43";
            document.getElementById('teacherName').value = "Ex : John Doe";
            document.getElementById('studentCount').value = "Ex : 45";

            if (grade == "0" || classs == "0") {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please Select the Grade and Class',
                })
                document.getElementById('spinner').classList.remove('show');
            } else {
                // use xhr to do this
                var xhr = new XMLHttpRequest();
                xhr.open('GET', '{{ route("search.accessories", [":grade", ":class"]) }}'
                    .replace(':grade', grade)
                    .replace(':class', classs), true);
                xhr.onload = function() {
                    if (this.status == 200) {
                        const response = JSON.parse(this.responseText);
                        document.getElementById('deskCount').value = response.deskCount;
                        document.getElementById('chairCount').value = response.chairCount;
                        document.getElementById('teacherName').value = response.teacher;
                        document.getElementById('studentCount').value = response.students;
                        document.getElementById('spinner').classList.remove('show');
                    }
                }
                // set header token
                xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
                xhr.send(); 
            }
        }
    </script>

</body>

</html>
