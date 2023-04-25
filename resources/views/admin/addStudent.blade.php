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

                <!-- Student Details Start -->
                <form id="student-form" method="post" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item bg-secondary">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button show"
                                    style="background: linear-gradient(to left , orange, lightyellow); border: black 1px solid;"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                    Student Details
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="form-floating mb-3 col-12 col-md-6">
                                            <input type="text" class="form-control bg-secondary text-dark"
                                                name="studentFullName" placeholder="name@example.com">
                                            <label class="ms-3">Full Name</label>
                                        </div>

                                        <div class="form-floating mb-3 col-12 col-md-6">
                                            <input type="text" class="form-control bg-secondary text-dark"
                                                name="studentInitialName" placeholder="name@example.com">
                                            <label for=" " class="ms-3">Name with Initial</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-floating mb-3 col-12 col-md-6">
                                            <input type="date" class="form-control bg-secondary text-dark"
                                                name="studentDateOfBirth" placeholder="name@example.com">
                                            <label for="" class="ms-3">Date of birth</label>
                                        </div>

                                        <div class="form-floating mb-3 col-12 col-md-6">
                                            <input type="number" class="form-control bg-secondary text-dark"
                                                name="studentIndexNumber" placeholder="name@example.com"
                                                value=""> <label for=""
                                                class="ms-3">Index Number</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-floating mb-3 col-12 col-md-6">
                                            <input type="password"
                                                class="form-control bg-secondary text-dark pr-password"
                                                name="studentPassword" placeholder="name@example.com">
                                            <label for="" class="ms-3">Password</label>
                                        </div>

                                        <div class="form-floating mb-3 col-12 col-md-6">
                                            <input type="number" class="form-control bg-secondary text-dark"
                                                name="enrollYear" placeholder="name@example.com">
                                            <label for=" " class="ms-3">Enroll Year</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-floating mb-3 col-12 col-md-6">
                                            <input type="text" class="form-control bg-secondary text-dark"
                                                name="enrollclass" placeholder="name@example.com">
                                            <label for="" class="ms-3">Enroll Class</label>
                                        </div>

                                        <div class="form-floating mb-3 col-12 col-md-6">
                                            <input type="number" class="form-control bg-secondary text-dark"
                                                name="distanceToSchool" placeholder="name@example.com">
                                            <label for=" " class="ms-3">Distance from home to school (KM)</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-floating mb-3 col-12">
                                            <input type="email" class="form-control bg-secondary text-dark"
                                                name="previousSchool" placeholder="name@example.com">
                                            <label for="" class="ms-3">Previous School</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-md-6 col-12">
                                            <div class="form-floating">
                                                <select class="form-select bg-secondary text-dark" name="gender">
                                                    <option selected>Open this select menu</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                                <label for="">Gender</label>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-md-6 col-12">
                                            <div class="form-floating">
                                                <select class="form-select bg-secondary text-dark" name="nationality">
                                                    <option selected>Open this select menu</option>
                                                    <option value="Sinhalese">Sinhalese</option>
                                                    <option value="Tamil">Tamil</option>
                                                    <option value="Burgher">Burgher</option>
                                                    <option value="Moor">Moor</option>
                                                </select>
                                                <label for="">Nationality</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-md-6 col-12">
                                            <div class="form-floating">
                                                <select class="form-select bg-secondary text-dark" name="religion">
                                                    <option selected>Open this select menu</option>
                                                    <option value="Buddhist">Buddhist</option>
                                                    <option value="Catholic">Catholic</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Islam">Islam</option>
                                                </select>
                                                <label for="">Religion</label>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-md-6 col-12">
                                            <div class="form-floating">
                                                <select class="form-select bg-secondary text-dark" name="travelMethod">
                                                    <option selected>Open this select menu</option>
                                                    <option value="Bus">Bus</option>
                                                    <option value="Train">Train</option>
                                                    <option value="School Van">School van</option>
                                                    <option value="Personal Vehicle">Personal Vehicle</option>
                                                </select>
                                                <label for="">Travel Method</label>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-12">
                                            <div class="form-floating">
                                                <select class="form-select bg-secondary text-dark" name="scholarship">
                                                    <option selected>Open this select menu</option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                                <label for="">Scholarship</label>
                                            </div>
                                        </div>
                                        <div class="mb-3 d-none">
                                            <label for="formFile" class="form-label">Profile Picture</label>
                                            <input class="form-control text-dark" type="file" name="photo">
                                            <p class="text-primary" style="color: red;">&#9888; NOTE: Please ensure that
                                                your image has a resolution of 100x100 before uploading. Images with
                                                resolutions other than 100x100 will be rejected by the server.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <!-- Guardian Details Start -->
                        <div class="accordion-item bg-secondary">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed"
                                    style="background: linear-gradient(to left , orange, lightyellow); border: black 1px solid;"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                    aria-expanded="false" aria-controls="collapseTwo">
                                    Guardians Details
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <h3 class="text-dark mt-4 text-center">Mother's Details</h3>

                                    <div class="row">
                                        <div class="form-floating mb-3 col-12 col-md-6">
                                            <input type="text" class="form-control bg-secondary text-dark"
                                                name="motherName" placeholder="name@example.com">
                                            <label for="" class="ms-3">Mother Name</label>
                                        </div>

                                        <div class="form-floating mb-3 col-12 col-md-6">
                                            <input type="text" class="form-control bg-secondary text-dark"
                                                name="motherNIC" placeholder="name@example.com">
                                            <label for=" " class="ms-3">Mother NIC</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-floating mb-3 col-12 col-md-6">
                                            <input type="number" class="form-control bg-secondary text-dark"
                                                name="motherNumber" placeholder="name@example.com">
                                            <label for="" class="ms-3">Mother Contact Number</label>
                                        </div>

                                        <div class="form-floating mb-3 col-12 col-md-6">
                                            <input type="text" class="form-control bg-secondary text-dark"
                                                name="motherJob" placeholder="name@example.com">
                                            <label for=" " class="ms-3">Mother Job</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-floating mb-3 col-12 col-md-6">
                                            <input type="text" class="form-control bg-secondary text-dark"
                                                name="motherJobAddress" placeholder="name@example.com">
                                            <label for="" class="ms-3">Mother Job Address</label>
                                        </div>

                                        <div class="form-floating mb-3 col-12 col-md-6">
                                            <input type="email" class="form-control bg-secondary text-dark"
                                                name="motherEmail" placeholder="name@example.com">
                                            <label for=" " class="ms-3">Mother Email</label>
                                        </div>
                                    </div>
                                    <h3 class="text-dark mt-4 text-center">Father's Details</h3>
                                    <div class="row">
                                        <div class="form-floating mb-3 col-12 col-md-6">
                                            <input type="text" class="form-control bg-secondary text-dark"
                                                name="fatherName" placeholder="name@example.com">
                                            <label for="" class="ms-3">Father Name</label>
                                        </div>

                                        <div class="form-floating mb-3 col-12 col-md-6">
                                            <input type="text" class="form-control bg-secondary text-dark"
                                                name="fatherNIC" placeholder="name@example.com">
                                            <label for=" " class="ms-3">Father NIC</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-floating mb-3 col-12 col-md-6">
                                            <input type="number" class="form-control bg-secondary text-dark"
                                                name="fatherNumber" placeholder="name@example.com">
                                            <label for="" class="ms-3">Father Contact Number</label>
                                        </div>

                                        <div class="form-floating mb-3 col-12 col-md-6">
                                            <input type="text" class="form-control bg-secondary text-dark"
                                                name="fatherJob" placeholder="name@example.com">
                                            <label for=" " class="ms-3">Father Job</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-floating mb-3 col-12 col-md-6">
                                            <input type="text" class="form-control bg-secondary text-dark"
                                                name="fatherJobAddress" placeholder="name@example.com">
                                            <label for="" class="ms-3">Father Job Address</label>
                                        </div>

                                        <div class="form-floating mb-3 col-12 col-md-6">
                                            <input type="email" class="form-control bg-secondary text-dark"
                                                name="fatherEmail" placeholder="name@example.com">
                                            <label for=" " class="ms-3">Father Email</label>
                                        </div>
                                    </div>

                                    <h3 class="text-dark mt-4 text-center">Guardian's Details</h3>
                                    <div class="row">
                                        <div class="form-floating mb-3 col-12 col-md-6">
                                            <input type="text" class="form-control bg-secondary text-dark"
                                                name="guardianName" placeholder="name@example.com">
                                            <label for="" class="ms-3">Guardian Name</label>
                                        </div>

                                        <div class="form-floating mb-3 col-12 col-md-6">
                                            <input type="text" class="form-control bg-secondary text-dark"
                                                name="guardianNIC" placeholder="name@example.com">
                                            <label for=" " class="ms-3">Guardian NIC</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-floating mb-3 col-12 col-md-6">
                                            <input type="number" class="form-control bg-secondary text-dark"
                                                name="guardianNumber" placeholder="name@example.com">
                                            <label for="" class="ms-3">Guardian Contact Number</label>
                                        </div>

                                        <div class="form-floating mb-3 col-12 col-md-6">
                                            <input type="text" class="form-control bg-secondary text-dark"
                                                name="guardianJob" placeholder="name@example.com">
                                            <label for=" " class="ms-3">Guardian Job</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-floating mb-3 col-12 col-md-6">
                                            <input type="text" class="form-control bg-secondary text-dark"
                                                name="guardianJobAddress" placeholder="name@example.com">
                                            <label for="" class="ms-3">Guardian Job Address</label>
                                        </div>

                                        <div class="form-floating mb-3 col-12 col-md-6">
                                            <input type="email" class="form-control bg-secondary text-dark"
                                                name="guardianEmail" placeholder="name@example.com">
                                            <label for=" " class="ms-3">Guardian Email</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Contact Details Start -->

                        <div class="accordion-item bg-secondary">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed"
                                    style="background: linear-gradient(to left , orange, lightyellow); border: black 1px solid;"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                    aria-expanded="false" aria-controls="collapseThree">
                                    Contact Details
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="form-floating mb-3 col-12 col-md-6">
                                            <input type="number" class="form-control bg-secondary text-dark"
                                                name="motherContactNumber" placeholder="name@example.com">
                                            <label for="" class="ms-3">Mother Contact Number</label>
                                        </div>

                                        <div class="form-floating mb-3 col-12 col-md-6">
                                            <input type="email" class="form-control bg-secondary text-dark"
                                                name="motherContactEmail" placeholder="name@example.com">
                                            <label for=" " class="ms-3">Mother Email</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-floating mb-3 col-12 col-md-6">
                                            <input type="number" class="form-control bg-secondary text-dark"
                                                name="fatherContactNumber" placeholder="name@example.com">
                                            <label for="" class="ms-3">Father Contact Number</label>
                                        </div>

                                        <div class="form-floating mb-3 col-12 col-md-6">
                                            <input type="email" class="form-control bg-secondary text-dark"
                                                name="fatherContactEmail" placeholder="name@example.com">
                                            <label for=" " class="ms-3">Father Email</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-floating mb-3 col-12 col-md-6">
                                            <input type="number" class="form-control bg-secondary text-dark"
                                                name="guardianContactNumber" placeholder="name@example.com">
                                            <label for="" class="ms-3">Guardian Contact Number</label>
                                        </div>

                                        <div class="form-floating mb-3 col-12 col-md-6">
                                            <input type="email" class="form-control bg-secondary text-dark"
                                                name="guardianContactEmail" placeholder="name@example.com">
                                            <label for=" " class="ms-3">Guardian Email</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-floating mb-3 col-12 col-md-6">
                                            <input type="number" class="form-control bg-secondary text-dark"
                                                name="emergrencyNumber" placeholder="name@example.com">
                                            <label for="" class="ms-3">Emergency Contact Number</label>
                                        </div>

                                        <div class="form-floating mb-3 col-12 col-md-6">
                                            <input type="email" class="form-control bg-secondary text-dark"
                                                name="emergrencyEmail" placeholder="name@example.com">
                                            <label for=" " class="ms-3">Emergency Email</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-floating mb-3 col-12">
                                            <input type="text" class="form-control bg-secondary text-dark"
                                                name="address" placeholder="name@example.com">
                                            <label for="" class="ms-3">Address</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="button" class="btn btn-outline-primary mt-3" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Submit</button>
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
                            <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">WARNING</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Please double check that all the information for this student is correct and complete before
                            continuing. Once the student is added to the database, it may be difficult to make
                            corrections or updates. Are you sure you want to continue?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="submitButton" data-bs-dismiss="modal" class="btn"
                                style="background: #006ee5; color: white;">Continue</button>
                        </div>
                    </div>
                </div>
            </div>

            </form>

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
    <!-- Template Javascript -->


    <script type="text/javascript">
    hamburger("addStudent");
    
        $(function () {
            $(".pr-password").passwordRequirements({
                numCharacters: 8,
                useLowercase: true,
                useUppercase: true,
                useNumbers: true,
                useSpecial: true
            });
        });


        var form = document.getElementById("student-form");
        var button = document.getElementById("submitButton");

        var studentFullName = document.querySelector('[name="studentFullName"]');
        var studentInitialName = document.querySelector('[name="studentInitialName"]');
        var studentDateOfBirth = document.querySelector('[name="studentDateOfBirth"]');
        var studentIndexNumber = document.querySelector('[name="studentIndexNumber"]');
        var studentPassword = document.querySelector('[name="studentPassword"]');
        var enrollYear = document.querySelector('[name="enrollYear"]');
        var encrollclass = document.querySelector('[name="enrollclass"]');
        var distanceToSchool = document.querySelector('[name="distanceToSchool"]');
        var gender = document.querySelector('[name="gender"]');
        var nationality = document.querySelector('[name="nationality"]');
        var religion = document.querySelector('[name="religion"]');
        var travelMethod = document.querySelector('[name="travelMethod"]');
        var motherName = document.querySelector('[name="motherName"]');
        var motherNIC = document.querySelector('[name="motherNIC"]');
        var motherNumber = document.querySelector('[name="motherNumber"]');
        var motherJob = document.querySelector('[name="motherJob"]');
        var motherJobAddress = document.querySelector('[name="motherJobAddress"]');
        var motherEmail = document.querySelector('[name="motherEmail"]');
        var fatherName = document.querySelector('[name="fatherName"]');
        var fatherNIC = document.querySelector('[name="fatherNIC"]');
        var fatherNumber = document.querySelector('[name="fatherNumber"]');
        var fatherJob = document.querySelector('[name="fatherJob"]');
        var fatherJobAddress = document.querySelector('[name="fatherJobAddress"]');
        var fatherEmail = document.querySelector('[name="fatherEmail"]');
        var guardianName = document.querySelector('[name="guardianName"]');
        var guardianNIC = document.querySelector('[name="guardianNIC"]');
        var guardianNumber = document.querySelector('[name="guardianNumber"]');
        var guardianJob = document.querySelector('[name="guardianJob"]');
        var guardianJobAddress = document.querySelector('[name="guardianJobAddress"]');
        var guardianEmail = document.querySelector('[name="guardianEmail"]');
        var motherContactNumber = document.querySelector('[name="motherContactNumber"]');
        var motherContactEmail = document.querySelector('[name="motherContactEmail"]');
        var fatherContactNumber = document.querySelector('[name="fatherContactNumber"]');
        var fatherContactEmail = document.querySelector('[name="fatherContactEmail"]');
        var guardianContactNumber = document.querySelector('[name="guardianContactNumber"]');
        var guardianContactEmail = document.querySelector('[name="guardianContactEmail"]');
        var emergrencyNumber = document.querySelector('[name="emergrencyNumber"]');
        var emergrencyEmail = document.querySelector('[name="emergrencyEmail"]');
        var address = document.querySelector('[name="address"]');


        button.addEventListener("click", function () {
            var spinner = document.getElementById('spinner');
            spinner.classList.add('show');
            var isValid = true;

            const formData = new FormData(form);

            const fullName = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
            const indexNumberRegex = /^\d+$/;
            const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W).{8,}$/;

            const distanceRegex = /^\d*\.?\d*$/;


            if (fullName.test(studentFullName.value)) {
                studentFullName.classList.remove('is-invalid');
                if (indexNumberRegex.test(studentIndexNumber.value)) {
                    studentIndexNumber.classList.remove('is-invalid');
                    if (passwordRegex.test(studentPassword.value)) {
                        studentPassword.classList.remove('is-invalid');
                        if (distanceRegex.test(distanceToSchool.value)) {
                            distanceToSchool.classList.remove('is-invalid');

                        }
                        else {
                            // invalid Distance
                            distanceToSchool.classList.add('is-invalid');

                        }
                    }
                    else {
                        // Week Password
                        studentPassword.classList.add('is-invalid');
                    }
                }
                else {
                    // Index number invalid
                    studentIndexNumber.classList.add('is-invalid');
                }
            }
            else {
                // Full Name Invalid
                studentFullName.classList.add('is-invalid');
            }

            // check contact numbers are valid
            const mobileNumber = /^07[01245678]{1}[0-9]{7}$/;

            if (mobileNumber.test(motherNumber.value)) {

                motherNumber.classList.remove('is-invalid');
            }
            else {
                // mother number is invalid
                motherNumber.classList.add('is-invalid');
            }

            if (mobileNumber.test(fatherNumber.value)) {

                fatherNumber.classList.remove('is-invalid');
            }
            else {
                // father number is invalid
                fatherNumber.classList.add('is-invalid');
            }

            if (mobileNumber.test(guardianNumber.value) | guardianNumber.value == '') {

                guardianNumber.classList.remove('is-invalid');
            }
            else {
                // guardian number is invalid
                guardianNumber.classList.add('is-invalid');
            }

            if (mobileNumber.test(emergrencyNumber.value)) {

                emergrencyNumber.classList.remove('is-invalid');
            }
            else {
                // emergency number is invalid
                emergrencyNumber.classList.add('is-invalid');
            }

            // Email Validation Regex
            const emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

            if (emailRegex.test(emergrencyEmail.value)) {

                emergrencyEmail.classList.remove('is-invalid');
            }
            else {
                // Invalid Email
                emergrencyEmail.classList.add('is-invalid');
            }

            // check mother email and father email empty or invalid

            if (emailRegex.test(motherEmail.value) | motherEmail.value == '') {

                motherEmail.classList.remove('is-invalid');
            }
            else {
                // if mother email is invalid or not empty
                motherEmail.classList.add('is-invalid');
            }

            if (emailRegex.test(fatherEmail.value) | fatherEmail.value == '') {

                fatherEmail.classList.remove('is-invalid');
            }
            else {
                // if father email is invalid or not empty
                fatherEmail.classList.add('is-invalid');
            }

            if (emailRegex.test(guardianEmail.value) | guardianEmail.value == '') {

                guardianEmail.classList.remove('is-invalid');
            }
            else {
                // if guardian email is invalid or not empty
                guardianEmail.classList.add('is-invalid');
            }

            // regex for NIC check
            const nicRegex = /^\d{1,12}v?$/;

            if (nicRegex.test(motherNIC.value)) {

                motherNIC.classList.remove('is-invalid');
            }
            else {
                // mother NIC is in=nvalid
                motherNIC.classList.add('is-invalid');
            }

            if (nicRegex.test(fatherNIC.value)) {

                fatherNIC.classList.remove('is-invalid');
            }
            else {
                // father NIC is in=nvalid
                fatherNIC.classList.add('is-invalid');
            }

            if (nicRegex.test(guardianNIC.value)) {

                guardianNIC.classList.remove('is-invalid');
            }
            else {
                // guardian NIC is in=nvalid
                guardianNIC.classList.add('is-invalid' | guardianNIC.value == '');
            }


            if (document.querySelector(".is-invalid")) {
                isValid = false;
            }

            if (isValid) {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route("add.student") }}');
                xhr.onload = function () {
                    if (this.status === 200) {
                        spinner.classList.remove('show');
                        var response = this.responseText;
                        if(response == 'success') {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Student Added Successfully',
                                showConfirmButton: false,
                                timer: 1500
                                });
                            var inputs = document.querySelectorAll('inputs');
                            inputs.forEach(input => {
                                input.value = '';
                            });
                        } else if(response == 'error') {
                            Swal.fire(
                                'ERROR',
                                'There Was An Error Occured',
                                'error'
                                )
                        } else if(response == 'exist') {
                            Swal.fire(
                                'WARNING',
                                'A Student With This Registration Number Already Exist!',
                                'warning'
                            )
                        }
                    }
                };
                xhr.send(formData);
            } else {
                spinner.classList.remove('show');
                Swal.fire(
                    'Something Went Wrong',
                    'Please Check This Form Again',
                    'warning'
                )
            }

        })

    </script>
</body>

</html>