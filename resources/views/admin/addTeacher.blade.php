<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.components.head')
    <link rel="stylesheet" href="/js/passwordValidate/css/jquery.passwordRequirements.css" />
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

            <!-- form Start -->
            <div class="container-fluid pt-4 px-4">

                <!-- teacher Details Start -->
                <form id="teacher-details">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item bg-secondary">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button show" style="
                    background: linear-gradient(to left, orange, lightyellow);
                    border: black 1px solid;
                  " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                aria-controls="collapseOne">
                                Teacher Details
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    @csrf
                                    <div class="form-floating mb-3 col-12 col-md-6">
                                        <input type="text" class="form-control bg-secondary text-dark"
                                            name="teacherFirstName" placeholder="name@example.com" />
                                        <label class="ms-3">First Name</label>
                                    </div>
                                    <div class="form-floating mb-3 col-12 col-md-6">
                                        <input type="text" class="form-control bg-secondary text-dark"
                                            name="teacherLastName" placeholder="name@example.com" />
                                        <label for=" " class="ms-3">Last Name</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-floating mb-3 col-12 col-md-6">
                                        <input type="text" class="form-control bg-secondary text-dark"
                                            name="teacherFullName" placeholder="name@example.com" />
                                        <label for=" " class="ms-3">Full Name</label>
                                    </div>
                                    <div class="form-floating mb-3 col-12 col-md-6">
                                        <input type="date" class="form-control bg-secondary text-dark"
                                            name="teacherDateOfBirth" placeholder="name@example.com" />
                                        <label for="" class="ms-3">Date of birth</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-floating mb-3 col-12 col-md-6">
                                        <input type="text" class="form-control bg-secondary text-dark" name="teacherNIC"
                                            placeholder="name@example.com" />
                                        <label for=" " class="ms-3">NIC</label>
                                    </div>

                                    <div class="form-floating mb-3 col-md-6 col-12">
                                        <input type="password" class="form-control bg-secondary text-dark pr-password"
                                            name="teacherPassword" id="password" placeholder="name@example.com" />
                                        <label for="" class="ms-3">Password</label>
                                    </div>
                                    <div class="form-floating mb-3 col-12 col-md-6">
                                        <input type="text" class="form-control bg-secondary text-dark" name="appointedSubject"
                                            placeholder="name@example.com" />
                                        <label for=" " class="ms-3">Appointed Subject</label>
                                    </div>

                                    <div class="mb-3 col-md-6 col-12">
                                        <div class="form-floating">
                                            <select class="form-select bg-secondary text-dark" name="teacherGender">
                                                <option selected value="0">Open this select menu</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                            <label for="">Gender</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6 col-12">
                                        <div class="form-floating">
                                            <select class="form-select bg-secondary text-dark" name="teacherNationality">
                                                <option selected value="0">Open this select menu</option>
                                                <option value="Sinhalese">Sinhalese</option>
                                                <option value="Tamil">Tamil</option>
                                                <option value="Burgher">Burgher</option>
                                                <option value="Moor">Moor</option>
                                            </select>
                                            <label for="">Nationality</label>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6 col-12">
                                        <div class="form-floating">
                                            <select class="form-select bg-secondary text-dark" name="teacherReligion">
                                                <option selected value="0">Open this select menu</option>
                                                <option value="Buddhist">Buddhist</option>
                                                <option value="Catholic">Catholic</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Islam">Islam</option>
                                            </select>
                                            <label for="">Religion</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-12">
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Qualification</label>
                                            <textarea class="form-control text-dark bg-secondary" name="qualification"
                                                rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Guardian Details Start -->


                    <!-- Contact Details Start -->
                    <div class="accordion-item bg-secondary">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" style="
                    background: linear-gradient(to left, orange, lightyellow);
                    border: black 1px solid;
                  " type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                aria-controls="collapseThree">
                                Contact Details
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="form-floating mb-3 col-12 col-md-6">
                                        <input type="number" class="form-control bg-secondary text-dark"
                                            name="teacherContactNumber" placeholder="name@example.com" />
                                        <label for="" class="ms-3"> Contact Number</label>
                                    </div>

                                    <div class="form-floating mb-3 col-12 col-md-6">
                                        <input type="email" class="form-control bg-secondary text-dark"
                                            name="teacherEmail" placeholder="name@example.com" />
                                        <label for=" " class="ms-3"> Email</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-floating mb-3 col-12">
                                        <input type="text" class="form-control bg-secondary text-dark" name="address"
                                            placeholder="name@example.com" />
                                        <label for="" class="ms-3">Permenent Address</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                <div class="row">
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-outline-primary mt-3" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Submit
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form End -->
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">
                                WARNING
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Please double check that all the information for this student is
                            correct and complete before continuing. Once the student is
                            added to the database, it may be difficult to make corrections
                            or updates. Are you sure you want to continue?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="button" data-bs-dismiss="modal" class="btn"
                                style="background: #006ee5; color: white" onclick="addTeacher();">
                                Continue
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" tabindex="-1" id="cardModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark">Teacher Id Card</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="idCard d-flex justify-content-center align-items-center">
                                <div class="container rounded" style="
                      border: 1px solid black;
                      width: 80%;
                      min-height: 300px;
                    ">
                                    <div style="
                        background-image: url(img/teacherIDCard.png);
                        background-size: cover;
                        width: 100%;
                        min-height: 600px;
                      ">
                                        <div class="row">
                                            <div style="margin-top: 250px"
                                                class="col-12 d-flex justify-content-center align-items-center">
                                                <h4 class="text-dark" style="margin-top: 70px" id="nameOnId">
                                                    Tharindu Nimesh
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="box">
                                            <div class="row mt-4">
                                                <div class="col-10 offset-1">
                                                    <div class="row d-flex flex-column">
                                                        <div class="col-12">
                                                            <i class="bi mx-2 bi-phone"></i><span
                                                                id="mobileOnId">070119771</span>
                                                        </div>
                                                    </div>
                                                    <div class="row d-flex flex-column">
                                                        <div class="col-12">
                                                            <i class="bi mx-2 bi-envelope-open"></i><span
                                                                id="mailOnId">tharindunimesh.abc@gmail.com</span>
                                                        </div>
                                                    </div>
                                                    <div class="row d-flex flex-column">
                                                        <div class="col-12">
                                                            <i class="bi mx-2 bi-people"></i><span
                                                                id="nicOnId">200515403527</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box d-flex justify-content-center" style="margin-top: 20px">
                                            <svg id="barcode" style="width: 80%; margin-left: 10%"></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="download" class="btn" style="background: #4287f5; color: white"
                                data-bs-dismiss="modal" onclick="downloadIdCard()">
                                Download
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Start -->
            @include('public_components.footer')
            <!-- Footer End -->
        </div>
        <!-- Content End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top z-1"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    @include('public_components.js')

    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <!-- Template Javascript -->

    <script type="text/javascript">
        hamburger("addTeacher")
        
        function downloadIdCard() {
            // Get the idCard div element
            const idCard = document.querySelector(".idCard");

            // Use html2canvas to capture the idCard div as an image
            html2canvas(idCard).then(function (canvas) {
                // Convert the canvas to a PNG data URL
                const imgData = canvas.toDataURL("image/png");

                // Create a download link and trigger the download
                const link = document.createElement("a");
                link.download = "teacher_id_card.png";
                link.href = imgData;
                link.click();
            });
        }

        $(function () {
            $(".pr-password").passwordRequirements({
                numCharacters: 8,
                useLowercase: true,
                useUppercase: true,
                useNumbers: true,
                useSpecial: true,
            });
        });

        function addTeacher() {
            var spinner = document.getElementById('spinner');
            spinner.classList.add('show');
            var inputs = document.querySelectorAll('input');
            var selects = document.querySelectorAll('select');
            var details = document.getElementById('teacher-details')
            var isValid = true;

            inputs.forEach(input => {
                if(input.value == '') {
                    input.classList.add('is-invalid');
                    isValid = false;
                } else {
                    input.classList.remove('is-invalid');
                }
            });
            selects.forEach(select => {
                if(select.value == '0') {
                    select.classList.add('is-invalid');
                    isValid = false;
                } else {
                    select.classList.remove('is-invalid');
                }
            });
            const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W).{8,}$/;
                
            if(!passwordRegex.test(document.getElementById('password').value)) {
                document.getElementById('password').classList.add('is-invalid');
                isValid = false;
            } else {
                document.getElementById('password').classList.remove('is-invalid');
            }

            if(isValid) {
                var form = new FormData(details);
                var xhr = new XMLHttpRequest();
                xhr.open("post", "{{ route('add.teacher') }}");
                xhr.onreadystatechange = function() {
                    if(xhr.readyState == 4 && xhr.status == 200) {
                        var response = xhr.responseText;
                        if(response == 'success') {
                            Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'New Teacher Added Successfully',
                            showConfirmButton: false,
                            timer: 1500
                            });
                            inputs.forEach(input => {
                                input.value = '';
                            });
                        } else if(response == 'error') {
                            Swal.fire(
                            'INTERNEL SERVER ERROR',
                            'Error While Processing Your Request',
                            'error'
                            )
                        } else if(response == "exist") {
                            Swal.fire(
                            'WARNING',
                            'A Teacher Already Exist With Given NIC Number',
                            'warning'
                            )
                        }
                        spinner.classList.remove('show');
                    }
                }
                xhr.send(form);
            } else {
                spinner.classList.remove('show');
                Swal.fire(
                    'ERROR',
                    'Please Double Check All Data That You Given!',
                    'error'
                )
            }
        }
    </script>
</body>

</html>