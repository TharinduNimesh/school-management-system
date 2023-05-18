<!DOCTYPE html>
<html lang="en">

<head>
    @include('sport.components.head')
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        @include('public_components.spinner')

        @include('sport.components.hamburger')

        <!-- Content Start -->
        <div class="content">
            @include('sport.components.navbar')

            <div style="min-height: 80vh;">
                <!-- Sale & Revenue Start -->
                <div class="container-fluid pt-4 px-4">
                    <div class="row g-4">
                        <div class="row g-2">

                            <div class="col-md-6 col-12">
                                <div class="form-floating">
                                    <input class="form-control bg-secondary text-dark" id="searchIndex" type="text"
                                        placeholder="Index Number">
                                    <label for="floatingSelectGrid">Search by index number</label>
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="form-floating">
                                    <input class="form-control bg-secondary text-dark" id="typing" type="text"
                                        placeholder="Index Number" data-index="" onkeyup="studentLiveSearch();">
                                    <label for="floatingSelectGrid">Search by name</label>
                                    <div class="list-group" style="position: absolute; width: 100%; z-index: 100000;"
                                        id="item-container">
                                        <!-- suggestions append to here -->

                                    </div>
                                </div>
                            </div>

                            <div class="d-grid">
                                <button class="btn btn-primary" onclick="searchStudent();">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sale & Revenue End -->

                {{-- add modal start --}}
                <div class="modal fade" tabindex="-1" id="sportModal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-dark">Add Student To Sport</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-floating">
                                    <select class="form-select bg-secondary text-dark" id="sport"
                                        aria-label="Floating label select example">
                                        <option selected value="0">Open this select menu</option>
                                        @foreach ($sports as $sport)
                                            <option>{{ $sport }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">Select A Sport</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn"
                                    style="background-color: rgb(5, 110, 230); color:white;" onclick="addToSport(this);"
                                    id="addButton">Save Student</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- add modal end --}}

                <!-- Profile Start -->
                <div class="container-fluid pt-4 px-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <h5 class="card-header text-dark">Student Details</h5>
                                <!-- Account -->
                                <div class="card-body">
                                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS6ZWr_9VvengJe1hQ903aoAToFqnuMijQVww&usqp=CAU"
                                            alt="user-avatar" height="100" width="100" id="pic" />
                                        <div class="button-wrapper">
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-0" />
                                <div class="card-body">
                                    <div class="row">
                                        <div class="mb-3">
                                            <label for="Namewithinitials" class="form-label ">Name with initials</label>
                                            <input class="form-control bg-secondary text-dark "disabled type="text"
                                                name="Namewithinitials" id="Namewithinitials" value="S.L.D.John Doe" />
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="Indexnumber" class="form-label">Index number</label>
                                            <input disabled class="form-control  bg-secondary text-dark" type="text"
                                                id="studentIndexNumber" name="Indexnumber" value="23059" />
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="Encrollclass" class="form-label">Current Class</label>
                                            <input disabled id="currentClass"
                                                class="form-control  bg-secondary text-dark" name="Encrollclass"
                                                value="F" />
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <button type="button" class="btn btn-primary" onclick="showModal();">
                                            Add Student
                                        </button>
                                    </div>
                                </div>
                                <!-- /Account -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Profile End -->

            </div>
            @include('public_components.footer')
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    @include('public_components.js')
    <script>
        function studentLiveSearch() {
            document.getElementById("item-container").style.display = "";
            var name = document.getElementById("typing").value;

            if (!name.trim() == "") {
                var form = new FormData();
                form.append("name", name);
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // handle response
                        document.getElementById("item-container").innerHTML = "";
                        var response = JSON.parse(xhr.responseText);
                        response.forEach(student => {
                            var item = document.createElement("button");
                            item.innerHTML =
                                student["name"] +
                                " - " +
                                student["index"] +
                                "-" +
                                student["class"];
                            item.classList.add("list-group-item");
                            item.classList.add("list-group-item-action");
                            item.classList.add("text-dark");
                            item.dataset.index = student["index"];
                            item.onclick = function() {
                                document.getElementById("typing").value = this.innerHTML;
                                document.getElementById("typing").dataset.index =
                                    this.dataset.index;
                                document.getElementById("item-container").style.display =
                                    "none";
                            };
                            document.getElementById("item-container").appendChild(item);
                        });
                    }
                };

                xhr.open("POST", "{{ route('live.search.student') }}");
                xhr.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').content);
                xhr.send(form);
            } else {
                document.getElementById("item-container").innerHTML = "";
            }
        }

        function searchStudent() {
            const spinner = document.getElementById("spinner");
            const index = document.getElementById("searchIndex");
            const name = document.getElementById("typing");
            document.getElementById("addButton").dataset.index = '';

            if (
                (index.value.trim() == "" && name.value.trim() == "") ||
                (index.value.trim() != "" && name.value.trim() != "")
            ) {
                Swal.fire("WARNING", "You Must Fill In One Text Field At A Time", "warning");
            } else {
                var indexNumber = index.value;
                if (name.value.trim() != "") {
                    indexNumber = name.dataset.index;
                }
                spinner.classList.add("show");
                var form = new FormData();
                form.append("index", indexNumber);
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var response = xhr.responseText;
                        if (response == "invalid") {
                            Swal.fire("WARNING", "Invalid Index Number", "warning");
                        } else {
                            response = JSON.parse(response);
                            document.getElementById("Namewithinitials").value =
                                response["name"];
                            document.getElementById("currentClass").value =
                                response["class"];
                            // document.getElementById("pic").src =
                            //     "profileImg/" + response["path"];
                            document.getElementById("studentIndexNumber").value =
                                response["index"];
                            document.getElementById("addButton").dataset.index =
                                response["index"];
                        }
                        spinner.classList.remove("show");
                    }
                };

                xhr.open(
                    "POST",
                    "{{ route('search.student.discipline') }}"
                );
                xhr.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').content);
                xhr.send(form);
            }
        }

        function addToSport(Button) {
            document.getElementById("spinner").classList.add("show");
            var index = Button.dataset.index;
            var sport = document.getElementById("sport").value;
            if (sport != "0") {
                $("#sportModal").modal("hide");
                var form = new FormData();
                form.append("index", index);
                form.append("sport", sport);
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var response = xhr.responseText;
                        if (response == "success") {
                            Swal.fire("SUCCESS", "Student Added To Sport", "success");
                        } else if (response == "already") {
                            Swal.fire("WARNING", "Student Already Added To This Sport", "warning");
                        } else {
                            Swal.fire("Something Went Wrong", "Please Refresh And Try Again", "info");
                        }
                        document.getElementById("spinner").classList.remove("show");
                    }
                };

                xhr.open(
                    "POST",
                    "{{ route('add.student.to.sport') }}"
                );
                xhr.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').content);
                xhr.send(form);
            } else {
                Swal.fire("WARNING", "Please Select A Sport First", "warning");
                document.getElementById("spinner").classList.remove("show");
            }
        }

        function showModal() {
            if (document.getElementById("addButton").dataset.index != "") {
                $("#sportModal").modal("show");
            } else {
                Swal.fire("WARNING", "Please Search Student First", "warning");
            }
        }
    </script>
</body>

</html>
