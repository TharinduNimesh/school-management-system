<!DOCTYPE html>
<html lang="en">

<head>
    @include('sport.components.head')
    <style>
        .space {
            white-space: nowrap;
        }
    </style>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        @include('public_components.spinner')

        @include('sport.components.hamburger')

        <!-- Content Start -->
        <div class="content">
            @include('sport.components.navbar')

            <!-- Profile Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row">
                    <div class="col-md-12 bg-secondary rounded">
                        <h3 class="text-dark py-3 mb-4">Add Award For Students</h3>
                        <div class="card mb-4">
                            <h5 class="card-header text-dark">Search A Player Here</h5>
                            <!-- Account search start-->
                            <hr class="my-0" />
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-floating mb-3 col-md-6">
                                        <input type="text" class="form-control text-dark bg-secondary" id="index"
                                            placeholder="name@example.com">
                                        <label for="floatingInput" class="px-3">Student Registration Number</label>
                                    </div>
                                    <div class="form-floating col-md-6">
                                        <select class="form-select bg-secondary text-dark" id="sport"
                                            aria-label="Floating label select example">
                                            <option selected value="0">Open this select menu</option>
                                            @foreach ($sports as $sport)
                                            <option>{{ $sport }}</option>
                                            @endforeach
                                        </select>
                                        <label for="floatingSelect">Select A Sport</label>
                                    </div>
                                    <div>
                                        <div class="d-grid gap-2 col-6 mx-auto mt-3">
                                            <button type="submit" class="btn btn-primary col-sm-12 col-xl-12">Search<i
                                                    class="bi bi-search ms-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Account search end -->
                            </div>

                            <div class="card mb-4">
                                <h5 class="card-header text-dark">Here your Search Result</h5>
                                <!-- search result start-->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label for="Namewithinitials" class="form-label ">Student Name</label>
                                            <input class="form-control bg-secondary text-dark " disabled type="text"
                                                name="Namewithinitials" value="example-: A.B.Name" id="NameResult" />
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="Namewithinitials" class="form-label ">Student Team</label>
                                            <input class="form-control bg-secondary text-dark " disabled type="text"
                                                name="Namewithinitials" value=" example-: 6-F" id="teamResult" />
                                        </div>


                                        <div>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover caption-top">
                                                    <caption>Achievements so far</caption>
                                                    <thead class="table-dark">
                                                        <tr>
                                                            <th scope="col">No</th>
                                                            <th scope="col">Competition</th>
                                                            <th scope="col">Category</th>
                                                            <th scope="col">Place</th>
                                                            <th scope="col">Date</th>
                                                            <th scope="col">Description</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="awardsBody">
                                                        <tr>
                                                            <th scope="row">1</th>
                                                            <td>Mark</td>
                                                            <td>Otto</td>
                                                            <td>Champion</td>
                                                            <td>2023-12-12</td>
                                                            <td class="space">Lorem ipsum dolor sit amet consectetur
                                                                adipisicing elit.
                                                                Laboriosam, cum!</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /search result end -->
                            </div>

                            <div class="card mb-4">
                                <h5 class="card-header text-dark">Add A Award For The Searched Student</h5>
                                <!-- Add award start-->
                                <hr class="my-0" />
                                <div class="card-body">
                                    <div class="alert alert-danger col-md-10 offset-md-1">
                                        <strong>ATTENTION :</strong> Please add an award to a student's record within
                                        one week of the award being won.
                                    </div>
                                    <div class="row">
                                        <div class="form-floating mb-3 col-md-6">
                                            <select class="form-select bg-secondary text-dark" id="team"
                                                aria-label="Floating label select example">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            <label class="px-3" for="floatingSelectGrid">Teams</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-6">
                                            <input type="text" class="form-control bg-secondary text-dark"
                                                id="competition" placeholder="name@example.com">
                                            <label class="px-3" for="floatingInput">Competition</label>
                                        </div>

                                        <div class="form-floating mb-3 col-md-6">
                                            <input type="text" class="form-control bg-secondary text-dark" id="category"
                                                placeholder="name@example.com">
                                            <label class="px-3" for="floatingInput">Category</label>
                                        </div>

                                        <div class="form-floating mb-3 col-md-6">
                                            <input type="text" class="form-control bg-secondary text-dark" id="place"
                                                placeholder="name@example.com">
                                            <label class="px-3" for="floatingInput">Place</label>
                                        </div>

                                        <div class="form-floating mb-3 col-md-6">
                                            <input type="date" class="form-control bg-secondary text-dark" id="date"
                                                placeholder="name@example.com">
                                            <label class="px-3" for="floatingInput">Date</label>
                                        </div>

                                        <div class="form-floating mb-3 col-md-6">
                                            <textarea class="form-control bg-secondary text-dark"
                                                placeholder="Leave a comment here" id="Description"></textarea>
                                            <label class="px-3" for="floatingTextarea">Description</label>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <button type="button" class="btn btn-primary" onclick="addAwards();">
                                            Add Award
                                        </button>
                                    </div>
                                </div>
                                <!-- /Add award end -->
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Profile End -->


            </div>
            <!-- Content End -->
            @include('public_components.footer')


            <!-- Back to Top -->
            <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
        </div>

        @include('public_components.js')

        <script>
            hamburger("awards")
            var indexNumber = '';
            var sportName = '';

            function searchStudent() {
                const index = document.getElementById("index");
                const sport = document.getElementById("sport");

                indexNumber = '';
                sportName = '';

                document.getElementById("NameResult").value = "";
                document.getElementById("teamResult").value = "";
                document.getElementById("awardsBody").innerHTML = "";

                // check index number is empty or not
                if (index.value == "" || sport.value == "0") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please Add An Index Number And A Sport!',
                    })
                } else {
                    const xhr = new XMLHttpRequest();
                    xhr.open("GET", "{{ route('search.student.sport', [':sport', ':id']) }}".replace(':sport', sport.value)
                        .replace(':id', index.value));
                    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    xhr.setRequestHeader('X-CSRF-Token', token);
                    xhr.setRequestHeader('Content-Type', 'application/json');
                    xhr.send(JSON.stringify({
                        index: index.value
                    }));
                    xhr.onload = function () {
                        if (xhr.status == 200) {
                            var response = xhr.responseText;
                            if (response == "not_found") {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Student Not Found!',
                                })
                            } else {
                                response = JSON.parse(response);
                                document.getElementById("NameResult").value = response.name;
                                document.getElementById("teamResult").value = response.team;

                                indexNumber = index.value;
                                sportName = sport.value;

                                if (response.awards.length == 0) {
                                    document.getElementById("awardsBody").innerHTML =
                                        "<tr><td colspan='6' class='text-center text-danger bg-warning'>No Achievements Found</td></tr>";
                                } else {
                                    response.awards.forEach((award, index) => {
                                        const row = document.createElement("tr");
                                        const no = document.createElement("th");
                                        const Competition = document.createElement("td");
                                        const category = document.createElement("td");
                                        const WinningPlace = document.createElement("td");
                                        const date = document.createElement("td");
                                        const description = document.createElement("td");

                                        no.innerHTML = index + 1;
                                        Competition.innerHTML = award.competition;
                                        category.innerHTML = award.category;
                                        WinningPlace.innerHTML = award.place;
                                        date.innerHTML = award.date;
                                        description.innerHTML = award.description;
                                        // description.classList.add("space");

                                        row.appendChild(no);
                                        row.appendChild(Competition);
                                        row.appendChild(category);
                                        row.appendChild(WinningPlace);
                                        row.appendChild(date);
                                        row.appendChild(description);

                                        document.getElementById("awardsBody").appendChild(row);
                                    });
                                }
                            }
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                            })
                        }
                    }
                }
            }

            function addAwards() {
                const competition = document.getElementById("competition");
                const category = document.getElementById("category");
                const place = document.getElementById("place");
                const date = document.getElementById("date");
                const description = document.getElementById("Description");

                if (indexNumber == '' || sportName == '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please Search A Student First!',
                    })
                    return;
                }

                if (competition.value == "" || category.value == "" || place.value == "" || date.value == "" || description
                    .value == "") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please Fill All The Fields!',
                    })
                } else {
                    const xhr = new XMLHttpRequest();
                    xhr.open("POST", "{{ route('add.award') }}");
                    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    xhr.setRequestHeader('X-CSRF-Token', token);
                    xhr.setRequestHeader('Content-Type', 'application/json');
                    xhr.send(JSON.stringify({
                        competition: competition.value,
                        category: category.value,
                        place: place.value,
                        date: date.value,
                        description: description.value,
                        index: indexNumber,
                        sport: sportName
                    }));
                    xhr.onload = function () {
                        if (xhr.status == 200) {
                            var response = xhr.responseText;
                            if (response == "success") {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: 'Award Added Successfully!',
                                })
                                // document.getElementById("competition").value = "";
                                // document.getElementById("category").value = "";
                                // document.getElementById("place").value = "";
                                // document.getElementById("date").value = "";
                                // document.getElementById("Description").value = "";

                                searchStudent();
                            } else if (response == 'invalid_date') {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Oops...',
                                    text: 'Selected Day Must In The Past 7 Days!',
                                })
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Something went wrong!',
                                })
                            }
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                            })
                        }
                    }
                }
            }
        </script>


</body>

</html>