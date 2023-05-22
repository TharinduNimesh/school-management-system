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
            @include('student.components.navbar')


            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h3 class="text-dark">Request Extracurricular Activites</h3>
                            <div class="row d-flex align-items-center">
                                <div>
                                    <select onchange="sportSelected();"
                                        class="form-select form-select-lg mb-3 bg-secondary text-dark"
                                        id="selectedSport" aria-label=".form-select-lg example">
                                        <option selected>Open this select menu</option>
                                        @foreach ($sports as $sport)
                                            <option>{{ $sport }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="accordion mt-3" id="accordionExample">
                                <div class="accordion-item">
                                    <h3 class="accordion-header px-3 py-1" id="headingOne">
                                        Details about the extracurricular activity
                                    </h3>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body bg-secondary">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="Sport" class="form-label">Name</label>
                                                    <input disabled class="form-control bg-secondary text-dark" type="text"
                                                        id="name" name="sport" value="Ex: Wushu" autofocus />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="Sport" class="form-label">Category</label>
                                                    <input disabled class="form-control bg-secondary text-dark" type="text"
                                                        id="category" name="sport" value="Ex: Sport" autofocus />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="Namewithinitials" class="form-label">Coarch's
                                                        Name</label>
                                                    <input disabled class="form-control bg-secondary text-dark" type="text"
                                                        name="coachName" id="coarchName" value="Ex: A.B.C. Name" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="address" class="form-label">Contact</label>
                                                    <input disabled type="text" class="form-control bg-secondary text-dark"
                                                        id="contact" name="contact" value="Ex: 729268775" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                                    <textarea disabled class="form-control text-dark bg-secondary" id="description" rows="3"></textarea>
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
                                                    <button type="button" id="requestButton" class="btn btn-primary" onclick="request();">
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
        hamburger("sport");
        
        function sportSelected() {
            const sport = document.getElementById("selectedSport");

            if (sport.value != 0) {
                document.getElementById("spinner").classList.add("show");
                document.getElementById("requestButton").disabled = false;
                var xhr = new XMLHttpRequest();

                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var response = JSON.parse(xhr.responseText);
                        document.getElementById("name").value = response.sport.name;
                        document.getElementById("category").value = response.sport.category;
                        document.getElementById("coarchName").value = response.coach == null ? "No Coach" : response.coach.name;
                        document.getElementById("contact").value = response.coach == null ? "No Coach" : response.coach.mobile;
                        document.getElementById("description").value = response.sport.description;

                        if(response.coach == null){
                            document.getElementById("requestButton").disabled = true;
                        } else {
                            document.getElementById("requestButton").dataset.sport = response.sport.name;
                        }
                        document.getElementById("spinner").classList.remove("show");
                    }
                };

                xhr.open("GET", "{{ route('search.sport', ':name') }}".replace(':name', sport.value));
                xhr.send();
            } else {
                document.getElementById("name").value = "";
                document.getElementById("category").value = "";
                document.getElementById("coarchName").value = "";
                document.getElementById("contact").value = "";
                document.getElementById("description").value = "";
            }
        }

        function request() {
            const sport = event.target.dataset.sport;
            var xhr = new XMLHttpRequest();

            xhr.onload = function() {
                if(xhr.status == 200) {
                    if(xhr.responseText == "success") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Request Sent !',
                            text: 'Your request has been sent to the coach!',
                        })
                    } else if(xhr.responseText == "noCoach") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'This sport hasn\'t a coach!',
                        })
                    } else if(xhr.responseText == "already") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'You have already doing this sport!',
                        })
                    } else if(xhr.responseText == "requested") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'You have already requested to join this sport!',
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        })
                    }
                } else {
                    // sweetalert error
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    })
                }
            }

            xhr.open("GET", "{{ route('request.sport', ':name') }}".replace(':name', sport));
            xhr.send();
        }

    </script>
</body>

</html>