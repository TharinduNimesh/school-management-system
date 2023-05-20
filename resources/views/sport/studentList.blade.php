<!DOCTYPE html>
<html lang="en">

<head>
    @include('sport.components.head')
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        @include('public_components.spinner')
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        @include('sport.components.hamburger')
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('sport.components.navbar')
            <!-- Navbar End -->

            <div class="modal fade" tabindex="-1" id="awardsModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark">Player's Award List</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Competition</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Place</th>
                                            <th scope="col">Description</th>
                                        </tr>
                                    </thead>
                                    <tbody id="awardsBody">
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h3 class="text-dark mb-4">Student List</h3>
                            <div class="form-floating mb-3 mt-3">
                                <input type="text" onkeyup="filterStudents(this);" class="form-control bg-secondary text-dark" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Student Name</label>
                              </div>
                              
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="studentTable">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Index No</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Sport</th>
                                            <th scope="col">Team</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($players as $player)
                                            <tr>
                                                <th scope="row">{{ $player['index'] }}</th>
                                                <td>{{ $player['name'] }}</td>
                                                <td>{{ $player['sport'] }}</td>
                                                <td>{{ $player['team'] }}</td>
                                                <td>
                                                    <button class="btn btn-success" data-index="{{ $player['index'] }}"
                                                        data-sport="{{ $player['sport'] }}" onclick="getAwards(this);">
                                                        More</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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

    <!-- JavaScript Libraries -->
    @include('public_components.js')
    <!-- Template Javascript -->
    <script>
        hamburger("studentList")
        // create getAwards function and send data set values to server using xhr
        function getAwards() {
            document.getElementById('awardsBody').innerHTML = "";
            var xhr = new XMLHttpRequest();
            var form = new FormData();
            form.append("index", event.target.dataset.index);
            form.append("sport", event.target.dataset.sport);
            xhr.open("POST", "{{ route('search.award') }}");
            xhr.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}");
            xhr.send(form);
            xhr.onload = function() {
                if (this.status == 200) {
                    var awards = JSON.parse(this.responseText);
                    awards.forEach(award => {
                        const row = document.createElement('tr');
                        const competition = document.createElement('td');
                        const category = document.createElement('td');
                        const date = document.createElement('td');
                        const place = document.createElement('td');
                        const description = document.createElement('td');

                        competition.innerHTML = award.competition;
                        category.innerHTML = award.category;
                        date.innerHTML = award.date;
                        place.innerHTML = award.place;
                        description.innerHTML = award.description;

                        row.appendChild(competition);
                        row.appendChild(category);
                        row.appendChild(date);
                        row.appendChild(place);
                        row.appendChild(description);

                        document.getElementById('awardsBody').appendChild(row);

                    });
                    $("#awardsModal").modal('show');
                }
            }
        }

        function filterStudents(Input) {
            let input, filter, table, tr, td, txtValue;

            input = Input;
            filter = input.value.toUpperCase();
            table = document.getElementById("studentTable");
            tr = table.getElementsByTagName("tr");

            for (let i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>

</html>
