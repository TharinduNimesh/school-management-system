<!DOCTYPE html>
<html lang="en">

<head>
    @include('student.components.head')
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        @include('public_components.spinner')
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        @include('student.components.hamburger')
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('student.components.navbar')
            <!-- Navbar End -->


            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h3 class="text-dark">Students Search Sports & Request Sports</h3>
                            <div class="row d-flex align-items-center">
                                <div>
                                    <select onchange="sportSelected();"
                                        class="form-select form-select-lg mb-3 bg-secondary text-dark"
                                        id="selectedSport" aria-label=".form-select-lg example">
                                        <option selected>Open this select menu</option>
                                        <?php

                                        for ($i = 0; $i < $sportList->num_rows; $i++) {
                                            $sport = $sportList->fetch_assoc();
                                            echo "<option value='" . $sport["id"] . "'>" . $sport["name"] . "</option>";
                                        }

                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="accordion mt-3" id="accordionExample">
                                <div class="accordion-item">
                                    <h3 class="accordion-header" id="headingOne">
                                        Details about the sport
                                    </h3>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body bg-secondary">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="Sport" class="form-label">Sport</label>
                                                    <input disabled class="form-control bg-secondary text-dark" type="text"
                                                        id="sportName" name="sport" value="Ex: Wushu" autofocus />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="Namewithinitials" class="form-label">Coarch's
                                                        Name</label>
                                                    <input disabled class="form-control bg-secondary text-dark" type="text"
                                                        name="initialName" id="coarchName" value="Ex: A.B.C. Name" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="Dateofbirth" class="form-label">Date Held</label>
                                                    <input disabled class="form-control bg-secondary text-dark" type="text"
                                                        id="dateHeld" name="Dateofbirth" value="Ex: Monday" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="Gender" class="form-label">Time</label>
                                                    <input disabled type="text" disabled
                                                        class="form-control bg-secondary text-dark" id="time"
                                                        name="time" value="Ex: 2.30 PM" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="address" class="form-label">Contact</label>
                                                    <input disabled type="text" class="form-control bg-secondary text-dark"
                                                        id="contact" name="contact" value="Ex: 729268775" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="placeInHeld" class="form-label">Place In
                                                        Held</label>
                                                    <input disabled class="text-dark form-control bg-secondary" disabled
                                                        type="text" id="placeHeld" name="placeInHeld"
                                                        value="Ex: School Ground" maxlength="6" />
                                                </div>

                                                <div class="alert alert-success" role="alert">
                                                    <h4 class="alert-heading">Request To Join !</h4>
                                                    <p>Ready to join in on the fun and excitement? Just hit that
                                                        "Request to Join" button below and let the games begin !</p>
                                                    <hr>
                                                    <p class="mb-0">Whether you're a seasoned pro or a newbie
                                                        looking to make some new friends, this is the perfect
                                                        opportunity to showcase your skills and have a blast. So
                                                        what are you waiting for? Join us now and let's play !</p>
                                                </div>
                                                <div class="mt-2">
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal">
                                                        Request To Join
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

        function sportSelected() {
            const sport = document.getElementById("selectedSport");

            if (sport.value != 0) {
                var xhr = new XMLHttpRequest();

                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var response = JSON.parse(xhr.responseText);
                        document.getElementById("sportName").value = response.sports['sport'];
                        document.getElementById("coarchName").value = response.sports['coach'];
                        document.getElementById("contact").value = '0' + response.sports['mobile'];
                    }
                };

                xhr.open("GET", "process/searchSport.php?sid=" + sport.value + "", true);
                xhr.send();
            }

        }


    </script>
</body>

</html>