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

            <!-- Content Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="col-sm-12 col-xl-12">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h3 class="mb-4 text-dark">Search Teams</h3>
                        <div class="row g-2">
                            <div class="col-md">
                                <div class="form-floating">
                                    <select class="form-select bg-secondary text-dark" id="SearchSport"
                                        aria-label="Floating label select example">
                                        <option selected value="0">Select A Sport</option>
                                        @foreach ($sports as $sport)
                                            <option>{{ $sport }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">Sport Title List</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <select class="form-select bg-secondary text-dark" id="SearchTeam"
                                        aria-label="Floating label select example">
                                        <option selected value="0">Select A Team</option>
                                        @foreach ($teams as $team)
                                            <option>{{ $team }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">Team Title List</label>
                                </div>
                            </div>
                            <div>
                                <div class="d-grid gap-2 col-6 mx-auto mt-3">
                                    <button onclick="searchTeam();" type="submit"
                                        class="btn btn-primary col-sm-12 col-xl-12">Search<i
                                            class="bi bi-search ms-2"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- Search End -->


                        <!-- Table Start -->
                        <h3 class="mb-4 mt-4 text-dark">Result List</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Index No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Position</th>
                                        <th scope="col">Join Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="playerList">

                                </tbody>
                            </table>
                        </div>
                        <!-- Table End -->

                    </div>
                </div>
            </div>
            <!-- Content End -->

            <div class="modal fade" tabindex="-1" id="positionModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark">Change Position</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-dark" style="color: white" id="basic-addon1">Position</span>
                                <input type="text" class="form-control text-dark bg-secondary" placeholder="Enter New Position" aria-label="Username"
                                    aria-describedby="basic-addon1" id="newPosition">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" id="changePositionButton" onclick="changePosition();"
                                class="btn" style="background-color: rgb(0, 102, 255); color: white;">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Student Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="col-sm-12 col-xl-12">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h3 class="mb-4 text-dark">Add Students To Teams</h3>
                        <div class="alert alert-danger">
                            <strong>WARNING : </strong> When You Choosing A Team, Make Sure To Select Team That
                            Compatible With Sport
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control bg-secondary text-dark" id="Index"
                                placeholder="name@example.com">
                            <label for="floatingInput">Index Number</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control bg-secondary text-dark" id="position"
                                placeholder="name@example.com">
                            <label for="floatingInput">Position</label>
                        </div>
                        <div class="form-floating">
                            <select class="form-select bg-secondary text-dark" id="Teams"
                                aria-label="Floating label select example">
                                <option selected value="0">Select A Team</option>
                                @foreach ($teams as $key => $team)
                                    <option>{{ $key }} - {{ $team }}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Team Title List</label>
                        </div>
                        <h5 for="" class="col-12 pb-2 text-center text-dark">If Team not exist</h5>
                        <div class="input-group mb-3 mb-5">
                            <input type="text" class="form-control bg-secondary text-dark" id="newTeam"
                                placeholder="Add Team" aria-label="Recipient's username"
                                aria-describedby="basic-addon2">
                            <button class="btn-lg btn btn-outline-danger" onclick="addTeam();"><i
                                    class="fa-lg bi-plus-circle-fill"></i></button>
                        </div>
                        <div class="form-floating">
                            <select class="form-select bg-secondary text-dark" id="Sport"
                                aria-label="Floating label select example">
                                <option selected value="0">Select A Sport</option>
                                @foreach ($sports as $sport)
                                    <option>{{ $sport }}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Sport Title List</label>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto mt-3">
                            <button class="btn btn-primary" type="button"
                                onclick="addStudentToTeam();">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Student End -->

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

        function changePosition() {
            var form = new FormData();
            form.append("index", event.target.dataset.index);
            form.append("sport", event.target.dataset.sport);
            form.append("team", event.target.dataset.team);
            form.append("pastPosition", event.target.dataset.position);
            form.append("position", document.getElementById("newPosition").value);
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "{{ route('change.position') }}");
            xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            xhr.onload = function() {
                if (xhr.status == 200) {
                    var data = xhr.responseText;
                    if (data == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Position Changed Successfully!',
                        })
                        document.getElementById("position" + event.target.dataset.index).innerHTML = document.getElementById("newPosition").value;
                        $("#positionModal").modal("hide");
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        })
                    }
                }
            }
            xhr.send(form);
        }

        function removePlayer() {
            const index = event.target.dataset.index;
            const sport = event.target.dataset.sport;
            const team = event.target.dataset.team;

            var xhr = new XMLHttpRequest();
            xhr.open("GET", "{{ route('remove.player', [':sport', ':team', ':index']) }}".replace(':index', index).replace(
                ':sport', sport).replace(':team', team));
            xhr.onload = function() {
                if (xhr.status == 200) {
                    var data = xhr.responseText;
                    if (data == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Player Removed Successfully!',
                        })
                        document.getElementById("row" + index).remove();
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
            xhr.send();
        }

        function searchTeam() {
            const sport = document.getElementById("SearchSport");
            const team = document.getElementById("SearchTeam");
            document.getElementById("playerList").innerHTML = "";

            if (sport.value == '0' || team.value == "0") {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Please Selec a sport and a team',
                })
                return;
            }

            var xhr = new XMLHttpRequest();
            xhr.open("GET", "{{ route('search.sport.team', [':sport', ':team']) }}".replace(':sport', sport.value).replace(
                ':team', team.value));
            xhr.onload = function() {
                if (xhr.status == 200) {
                    var data = xhr.responseText;
                    if (data == 'failed') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Team Doesn\'t exist or no players in the team!',
                        })
                        return;
                    }
                    var result = JSON.parse(data);
                    result.forEach(player => {
                        var row = document.createElement("tr");
                        row.id = "row" + player.index_number;

                        var index = document.createElement("th");
                        index.scope = "row";
                        index.innerText = player.index_number;

                        var name = document.createElement("td");
                        name.innerText = player.name;
                        name.classList.add("space");

                        var position = document.createElement("td");
                        position.id = "position" + player.index_number;
                        position.innerText = player.position;

                        var joinDate = document.createElement("td");
                        joinDate.innerText = player.start_date;

                        var action = document.createElement("td");
                        action.classList.add("space");
                        var button1 = document.createElement("button");
                        button1.type = "button";
                        button1.className = "btn btn-danger btn-sm mx-3";
                        button1.innerText = "Remove";
                        button1.dataset.index = player.index_number;
                        button1.dataset.team = team.value;
                        button1.dataset.sport = sport.value;
                        button1.onclick = function() {
                            removePlayer();
                        }

                        var button2 = document.createElement("button");
                        button2.type = "button";
                        button2.className = "btn btn-success btn-sm";
                        button2.innerText = "Change Position";
                        button2.dataset.index = player.index_number;
                        button2.dataset.team = team.value;
                        button2.dataset.sport = sport.value;
                        button2.dataset.position = player.position;
                        button2.onclick = function() {
                            const button = document.getElementById("changePositionButton");
                            button.dataset.index = event.target.dataset.index;
                            button.dataset.team = event.target.dataset.team;
                            button.dataset.sport = event.target.dataset.sport;
                            button.dataset.position = event.target.dataset.position;

                            $("#positionModal").modal("show");
                        }

                        action.appendChild(button1);
                        action.appendChild(button2);

                        row.appendChild(index);
                        row.appendChild(name);
                        row.appendChild(position);
                        row.appendChild(joinDate);
                        row.appendChild(action);

                        document.getElementById("playerList").appendChild(row);
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something Went Wrong!',
                    })
                }
            }
            xhr.send();
        }

        const teams = [];

        function addTeam() {
            var team = document.getElementById("newTeam").value;
            var teamList = document.getElementById("Teams");

            if (team != "") {
                if (teams.includes(team)) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Team Already Exist!',
                    })
                    return;
                }

                var option = document.createElement("option");
                option.text = team;
                option.dataset.category = "new";
                teamList.add(option);
                teams.push(team);
                document.getElementById("newTeam").value = "";
            } else {
                // create sweetalert error message
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please Enter A Team Name!',
                })
            }
        }

        function addStudentToTeam() {
            document.getElementById("spinner").classList.add("show");
            var index = document.getElementById("Index").value;
            var team = document.getElementById("Teams");
            var sport = document.getElementById("Sport").value;
            var position = document.getElementById("position").value;

            if (index != "" && team.value != "0" && sport != "0" && position != "") {
                const selectedOption = team.options[team.selectedIndex]

                var formData = new FormData();
                formData.append("index", index);
                formData.append("team", team.value);
                formData.append("sport", sport);
                formData.append("category", "old");
                formData.append("position", position);
                console.log(team.dataset.category)
                if (selectedOption.dataset.category == "new") {
                    formData.append("category", "new");
                }

                // create xhr and send form to server
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "{{ route('add.student.to.team') }}");
                xhr.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').getAttribute(
                    'content'));
                xhr.onload = function() {
                    if (this.status == 200) {
                        // handle success,  failed and invalid response
                        if (this.response == "success") {
                            // create sweetalert success message
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Student Added To Team Successfully!',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    if (selectedOption.dataset.category == 'new') {
                                        location.reload();
                                    }

                                    if (document.getElementById("SearchSport").value != "0" && document
                                        .getElementById("SearchTeam").value != "0") {
                                        searchTeam();
                                    }
                                }
                            })
                        } else if (this.response == "failed") {
                            // create sweetalert error message
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something Went Wrong!',
                            })
                        } else if (this.response == "invalid") {
                            // create sweetalert error message
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Invalid Index Number!',
                            })
                        } else if (this.response == "exist") {
                            // create sweetalert error message
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Student Already Exist In This Team!',
                            })
                        } else if (this.response == 'already') {
                            // create sweetalert error message
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Student Already Exist In A Team!',
                            })
                        } else if (this.response == "teamExist") {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Team Already Exist!',
                            })
                        }
                        document.getElementById("spinner").classList.remove("show");
                    } else {
                        // create sweetalert error message
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something Went Wrong!',
                        })
                        document.getElementById("spinner").classList.remove("show");
                    }
                }
                xhr.send(formData);
            } else {
                // create sweetalert error message
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please Fill All Fields!',
                })
                document.getElementById("spinner").classList.remove("show");
            }
        }
    </script>
</body>

</html>
