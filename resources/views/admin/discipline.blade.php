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

            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <h3 class="text-dark">Discipline Management</h3>

                    <!-- student start -->

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control text-dark bg-secondary" id="index"
                                    placeholder="name@example.com" />
                                <label for="floatingInput">Search By Index</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-floating">
                                <input class="form-control bg-secondary text-dark" id="typing" type="text"
                                    placeholder="Index Number" data-index="" onkeyup="studentLiveSearch();" />
                                <label for="floatingSelectGrid">Search By Name</label>
                                <div class="list-group" style="position: absolute; width: 100%; z-index: 100000"
                                    id="item-container">
                                    <!-- suggestions append to here -->
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button class="btn btn-primary mb-3" type="button" onclick="searchStudent();">
                                Search
                            </button>
                        </div>
                        <hr />
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 d-flex align-items-center">
                                    <div class="d-flex justify-content-center align-items-center" style="
                        background: black;
                        border-radius: 50%;
                        width: 120px;
                        height: 120px;
                      ">
                                        <img id="pic" src="profileImg/default.png"
                                            style="width: 95%; height: 95%; border-radius: 50%" />
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mx-4">
                                            <h4 class="text-dark" id="studentName">
                                                Ex: Tharindu Nimesh Dewinda
                                            </h4>
                                            <h4 class="text-dark" id="studentClass">Ex: 6-F</h4>
                                            <h4 class="text-dark" id="searchIndex" data-id="0">Ex: 23056</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center">
                                <div class="mt-3 col-md-4 col-12 rounded d-flex align-items-center justify-content-between p-4"
                                    style="background-color: #00ff00" id="scoreBox">
                                    <i class="fa fa-chart-line fa-3x text-primary"></i>
                                    <div class="ms-3">
                                        <p class="mb-2 text-dark">Descipline Score</p>
                                        <h6 class="mb-0 text-dark" id="score">Ex: 80%</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6 col-12">
                                    <div class="form-floating">
                                        <select class="form-select text-dark bg-secondary" id="mistake"
                                            aria-label="Floating label select example" onchange="method();">
                                            <option selected value="0">
                                                Open this select menu
                                            </option>
                                            <option value="1">Method 01 ( -1 )</option>
                                            <option value="2">Method 02 ( -3 )</option>
                                            <option value="3">Method 03 ( -5 )</option>
                                            <option value="4">Custom ( -custom )</option>
                                        </select>
                                        <label for="floatingSelect">Works with selects</label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 d-none mt-3 mt-md-0" id="custom">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control bg-secondary
                      text-dark" id="customValue" placeholder="name@example.com">
                                        <label for="floatingInput">Custom Value</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mt-3 mt-md-0" id="descriptionBox">
                                    <div class="form-floating">
                                        <textarea class="form-control text-dark bg-secondary"
                                            placeholder="Leave a comment here" id="description"></textarea>
                                        <label for="floatingTextarea">Description</label>
                                    </div>
                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-outline-danger me-md-2 mt-3" type="button"
                                        onclick="submit();">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- student start -->

                    <!-- help start -->
                    <div class="row mt-5">
                        <hr />
                        <h3 class="text-dark">Guidance</h3>
                        <div class="col-12 d-flex mt-3 align-items-center flex-column">
                            <div class="d-flex" style="
                    width: 70%;
                    height: 40px;
                    background-image: linear-gradient(
                      to left,
                      #00ff00,
                      #ffff00,
                      #ffa500,
                      #ff0000
                    );
                    border-radius: 10px;
                  ">
                                <p class="text-dark" style="font-weight: bold; width: 25%">
                                    Custom
                                </p>
                                <p class="text-dark" style="font-weight: bold; width: 25%">
                                    -5
                                </p>
                                <p class="text-dark" style="font-weight: bold; width: 25%">
                                    -3
                                </p>
                                <p class="text-dark" style="font-weight: bold; width: 25%">
                                    -1
                                </p>
                            </div>
                            <div class="row" style="width: 80%">
                                <div class="col-12 d-flex">
                                    <p class="text-dark">High</p>
                                    <p class="text-dark" style="margin-left: 90%">Low</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 p-3" style="
                  border-color: black;
                  border-style: solid;
                  border-width: 2px;
                ">
                            <h5 class="text-dark">
                                1) Uniform and Grooming Issues: ( -1 )
                            </h5>
                            <ul>
                                <li>
                                    Not wearing the school uniform or wearing it incorrectly
                                </li>
                                <li>Wearing jewelry or accessories that are not allowed</li>
                                <li>Having an inappropriate hairstyle or hair color</li>
                                <li>Growing a beard or mustache against school rules</li>
                            </ul>
                        </div>

                        <div class="col-12 col-md-6 p-3" style="
                  border-color: black;
                  border-style: solid;
                  border-width: 2px;
                ">
                            <h5 class="text-dark">2) Attendance and Punctuality: ( -3 )</h5>
                            <ul>
                                <li>
                                    Coming to school late or leaving early without a valid
                                    reason
                                </li>
                                <li>Skipping classes or school without permission</li>
                                <li>Failing to submit assignments on time</li>
                                <li>
                                    Failing to attend mandatory school events or assemblies
                                </li>
                            </ul>
                        </div>

                        <div class="col-12 col-md-6 p-3" style="
                  border-color: black;
                  border-style: solid;
                  border-width: 2px;
                ">
                            <h5 class="text-dark">3) Behavioral Issues: ( -5 )</h5>
                            <ul>
                                <li>
                                    Engaging in physical or verbal fights with other students or
                                    teachers
                                </li>
                                <li>Bullying or harassing others</li>
                                <li>Vandalizing school property or public objects</li>
                                <li>
                                    Engaging in romantic relationships during school hours
                                </li>
                            </ul>
                        </div>

                        <div class="col-12 col-md-6 p-3" style="
                  border-color: black;
                  border-style: solid;
                  border-width: 2px;
                ">
                            <h5 class="text-dark">4) Substance Abuse: ( -custom )</h5>
                            <ul>
                                <li>
                                    Possessing, using or distributing drugs or alcohol on school
                                    grounds
                                </li>
                                <li>Smoking cigarettes or vaping in prohibited areas</li>
                                <li>
                                    Being under the influence of drugs or alcohol while on
                                    school premises
                                </li>
                                <li>
                                    Encouraging or influencing others to use drugs or alcohol
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- help end -->
                </div>
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

        hamburger("discipline");
        var studentDetailsNumber = 0;

        function studentLiveSearch() {
            document.getElementById("item-container").style.display = "";
            var name = document.getElementById("typing").value;

            if (name.trim() == "") {
                document.getElementById("item-container").innerHTML = "";
            } else {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // handle response
                        document.getElementById("item-container").innerHTML = "";
                        var response = JSON.parse(xhr.responseText);
                        for (let i = 0; i < response.length; i++) {
                            var item = document.createElement("button");
                            item.innerHTML =
                                response[i].student["name"] +
                                " - " +
                                response[i].student["index_number"] +
                                " - " +
                                response[i].student["grade"] +
                                "-" +
                                response[i].student["class"];
                            item.classList.add("list-group-item");
                            item.classList.add("list-group-item-action");
                            item.classList.add("text-dark");
                            item.dataset.index = response[i].student["index_number"];
                            item.onclick = function () {
                                document.getElementById("typing").value = this.innerHTML;
                                document.getElementById("typing").dataset.index =
                                    this.dataset.index;
                                document.getElementById("item-container").style.display =
                                    "none";
                            };
                            document.getElementById("item-container").appendChild(item);
                        }
                    }
                };

                xhr.open("GET", "process/liveSearch.php?name=" + name + "", true);
                xhr.send();
            }
        }

        function searchStudent() {
            const index = document.getElementById("index");
            const name = document.getElementById("typing");

            if (
                (index.value.trim() == "" && name.value.trim() == "") ||
                (index.value.trim() != "" && name.value.trim() != "")
            ) {
                Swal.fire("WARNING", "You Must Fill In One Text Field At A Time", "warning");
                studentDetailsNumber = 0;
            } else {
                var indexNumber = index.value;
                if (name.value.trim() != "") {
                    indexNumber = name.dataset.index;
                }
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.status == "error") {
                            Swal.fire("WARNING", "Invalid Index Number", "warning");
                            document.getElementById("searchIndex").dataset.id = "0";
                            studentDetailsNumber = 0;
                        } else {
                            var score = response.student["score"];
                            var scoreBox = document.getElementById("scoreBox");
                            document.getElementById("studentName").innerHTML =
                                response.student["initial_name"];
                            document.getElementById("studentClass").innerHTML =
                                response.student["grade"] + "-" + response.student["class"];
                            document.getElementById("score").innerHTML = score + "%";
                            if (score >= 80) {
                                scoreBox.style.backgroundColor = "#00FF00";
                            } else if (score >= 60) {
                                scoreBox.style.backgroundColor = "#FFFF00";
                            } else if (score >= 40) {
                                scoreBox.style.backgroundColor = "#FFA500";
                            } else {
                                scoreBox.style.backgroundColor = "#FF0000";
                            }
                            document.getElementById("pic").src =
                                "profileImg/" + response.student["path"];
                            document.getElementById("searchIndex").innerHTML =
                                response.student["index_number"];
                            document.getElementById("searchIndex").dataset.id =
                                response.student["index_number"];
                            studentDetailsNumber = response.student['details_id'];
                        }
                    }
                };

                xhr.open(
                    "GET",
                    "process/searchStudent.php?index=" + indexNumber + "",
                    true
                );
                xhr.send();
            }
        }

        function method() {
            const mistake = document.getElementById("mistake");
            const descriptionBox = document.getElementById("descriptionBox");
            const custom = document.getElementById("custom");

            if (mistake.value == 4) {
                custom.classList.remove("d-none");
                descriptionBox.classList.remove("col-md-6");
            } else {
                custom.classList.add("d-none");
                descriptionBox.classList.add("col-md-6");
            }
        }

        function submit() {
            const index = document.getElementById("searchIndex");
            const mistake = document.getElementById("mistake");
            const description = document.getElementById("description");
            const customValue = document.getElementById("customValue");

            if (studentDetailsNumber == 0) {
                Swal.fire("ERROR", "Search A Student First", "error");
            } else {
                if (mistake.value == 0) {
                    Swal.fire("WARNING", "Please Select A Mistake First", "warning");
                }
                else if (description.value.trim() == '') {
                    Swal.fire("WARNING", "Please Add A Description About Mistake", "warning");
                }
                else {
                    var form = new FormData();
                    form.append("level", mistake.value);
                    form.append("index", index.dataset.id);
                    form.append("details_id", studentDetailsNumber);
                    form.append("description", description.value);
                    form.append("me", "myNIC");
                    form.append("role", "1");
                    if (mistake.value == 4) {
                        form.append("custom", customValue.value);
                    }

                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            // handle response
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Discipline Marks Updated',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            var score = xhr.responseText
                            document.getElementById("score").innerHTML = score + "%";
                            if (score >= 80) {
                                scoreBox.style.backgroundColor = "#00FF00";
                            } else if (score >= 60) {
                                scoreBox.style.backgroundColor = "#FFFF00";
                            } else if (score >= 40) {
                                scoreBox.style.backgroundColor = "#FFA500";
                            } else {
                                scoreBox.style.backgroundColor = "#FF0000";
                            }
                        }
                    };

                    xhr.open("POST", "process/updateDiscipline.php", true);
                    xhr.send(form);
                }
            }
        }
    </script>
</body>

</html>