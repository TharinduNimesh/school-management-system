<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.components.head')

    <style>
        .addCursor {
            cursor: pointer;
        }

        .addCursor:hover {
            background: linear-gradient(to left, white, orange);
            color: black;
        }

        .myClass {
            border-top-left-radius: 0px;
            border-top-right-radius: 0px;
        }

        .img {
            border-radius: 50%;
            width: 160px;
            height: 160px;
            background-size: contain;
            background-color: black;
            cursor: pointer;
        }

        #imageCanvas {
            max-width: 100%;
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

            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4" style="min-height: 80vh;">
                <div class="row g-4">

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Warning</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure to save changes ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn" onclick="updateStudentData();"
                                        data-bs-dismiss="modal" style="background: #006ee5; color: white;">Save
                                        changes</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid pt-4 px-4">
                        <div class="bg-secondary rounded-top p-4">
                            <h3 class="mb-0 text-dark mb-2">Search Student</h3>
                            <div class="row">
                                <div class="col-md-6 col-12 mb-3">
                                    <div class="form-floating">
                                        <input class="form-control bg-secondary text-dark" id="searchIndex"
                                            type="text" placeholder="Index Number">
                                        <label for="floatingSelectGrid">Search by index number</label>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12 mb-3">
                                    <div class="form-floating">
                                        <input class="form-control bg-secondary text-dark" id="typing" type="text"
                                            placeholder="Index Number" data-index="" onkeyup="studentLiveSearch();">
                                        <label for="floatingSelectGrid">Search by name</label>
                                        <div class="list-group"
                                            style="position: absolute; width: 100%; z-index: 100000;"
                                            id="item-container">
                                            <!-- suggestions append to here -->

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid">
                                <button class="btn btn-primary" onclick="searchStudent();">Search</button>
                            </div>
                        </div>
                    </div>

                    <div class="d-none" id="allInformationContainer">
                        <div class="container-fluid pt-4 px-4" id="studentData">
                            <div class="row mb-3">
                                <div class="col-12 mt-md-0 col-md-4">
                                    <div data-bs-toggle="modal" data-bs-target="#newModal"
                                        class="rounded d-flex align-items-center justify-content-between p-4"
                                        style="background: #ff2c2c; color: white; cursor: pointer;" id="paymentViewer">
                                        <i class="bi bi-cash fa-2x text-primary"></i>
                                        <div class="ms-3">
                                            <p class="mb-2">Facility charges</p>
                                            <h6 class="mb-0 text-dark"> 3260 </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-md-0 mt-3 col-md-4">
                                    <div
                                        class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                        <i class="bi bi-percent fa-2x text-dark"></i>
                                        <div class="ms-3">
                                            <p class="mb-2">Attendance</p>
                                            <h6 class="mb-0 text-dark" id="attendance"> none </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-md-0 mt-3 col-md-4">
                                    <div
                                        class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                        <i class="bi bi-book-half fa-2x text-dark"></i>
                                        <div class="ms-3">
                                            <p class="mb-2">Class</p>
                                            <h6 class="mb-0 text-dark" id="currentClass">Ex: 10-F</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-3 col-md-6">
                                    <div data-bs-target="#reModal" data-bs-toggle="modal" style="cursor: pointer;"
                                        class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                        <i class="bi bi-calendar-week-fill fa-2x text-dark"></i>
                                        <div class="ms-3">
                                            <p class="mb-2">Date Of Resignation</p>
                                            <h6 class="mb-0 text-dark" id="resignation">none</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-3 col-md-6">
                                    <div style="background-color: #00FF00; color: white;" id="scoreBox"
                                        class="rounded d-flex align-items-center justify-content-between p-4">
                                        <i class="bi bi-capslock-fill fa-2x text-dark"></i>
                                        <div class="ms-3">
                                            <p class="mb-2">Discipline Score</p>
                                            <h6 class="mb-0 text-dark" id="dScore">Ex: 80%</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-secondary rounded-top p-4">
                                <h3 class="text-dark">Personal Information</h3>
                                <div class="row d-flex align-items-center">
                                    <div class="col-8 col-md-5 col-lg-4">
                                        <div class="p-3">
                                            <div class="img d-flex justify-content-center align-items-center"
                                                id="imgBox" onclick="viewImage();"
                                                data-img="profileImg/default.png">
                                                <img style="border-radius: 50%; width: 90%;"
                                                    src="profileImg/default.png" id="profilePic">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2 col-md-6">
                                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                            <span class="d-none d-sm-block ">Update Profile Picture</span>
                                            <i class="bi bi-upload"></i>
                                            <input type="file" id="upload" class="account-file-input " hidden
                                                accept="image/png, image/jpeg" />
                                        </label>
                                    </div>

                                    <!-- image modal start  -->

                                    <div class="modal fade " id="imgModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Crop
                                                        Your
                                                        Image</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <canvas id="imageCanvas">

                                                    </canvas>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn"
                                                        style="background: #367beb; color: white;"
                                                        id="uploadButton">Crop</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- image modal end -->

                                </div>
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button btn btn-primary" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                aria-expanded="true" aria-controls="collapseOne">
                                                Student Information
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body bg-secondary">
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label for="FullName" class="form-label">Full Name</label>
                                                        <input class="form-control bg-secondary text-dark"
                                                            type="text" id="fullName" name="fullName"
                                                            value="Ex: Sahan Perera" autofocus />
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="Namewithinitials" class="form-label">Name with
                                                            initials</label>
                                                        <input class="form-control bg-secondary text-dark"
                                                            type="text" name="initialName" id="initialName"
                                                            value="Ex: A.B.C. Perera" />
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="Dateofbirth" class="form-label">Date of
                                                            birth</label>
                                                        <input class="form-control bg-secondary text-dark"
                                                            type="text" id="dob" name="Dateofbirth"
                                                            value="Ex: 2000/01/01" />
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="Gender" class="form-label">Gender</label>
                                                        <input type="text" disabled
                                                            class="form-control bg-secondary text-dark" id="Gender"
                                                            name="Gender" value="Ex: Male" />
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="address" class="form-label">Address</label>
                                                        <input type="text"
                                                            class="form-control bg-secondary text-dark" id="address"
                                                            name="address" value="Ex: 432/1 A, Waragoda, Kelaniya" />
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="Indexnumber" class="form-label">Index
                                                            number</label>
                                                        <input class="text-dark form-control bg-secondary" disabled
                                                            type="text" id="studentIndexNumber" name="Indexnumber"
                                                            value="Ex: 12345" maxlength="6" />
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="Scholarship"
                                                            class="form-label">Scholarship</label>
                                                        <input type="text"
                                                            class="text-dark form-control bg-secondary"
                                                            id="scholarship" name="Scholarship" value="Ex: Yes"
                                                            disabled />
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="Nerollyear" class="form-label">Enroll year</label>
                                                        <input id="startYear"
                                                            class="text-dark bg-secondary form-control" disabled
                                                            name="enrollyear" value="Ex: 2005" />
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="Encrollclass" class="form-label">Enroll
                                                            class</label>
                                                        <input id="startClass"
                                                            class="text-dark bg-secondary form-control" disabled
                                                            name="enrollclass" value="Ex: 01" />

                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="address" class="form-label">Previous
                                                            School</label>
                                                        <input disabled type="text"
                                                            class="form-control bg-secondary text-dark" id="pSchool"
                                                            name="pSchool" value="Ex: none" />
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="Nationality"
                                                            class="form-label">Nationality</label>
                                                        <input disabled id="nationality"
                                                            class="text-dark bg-secondary form-control"
                                                            name="nationality" value="Ex: Sinhalese" />

                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="Religion" class="form-label">Religion</label>
                                                        <input disabled id="religion"
                                                            class="text-dark bg-secondary form-control"
                                                            name="religion" value="Ex: Buddhism" />
                                                    </div>

                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label" for="phoneNumber">House</label>
                                                        <div class="input-group input-group-merge">
                                                            <span class="input-group-text" id="houseColor"
                                                                style="background: green"></span>
                                                            <input type="text" id="houseName" disabled
                                                                name="phoneNumber"
                                                                class="form-control text-dark bg-secondary"
                                                                value="Ex: Welusumana" />
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label" for="distance">Distance to
                                                            School</label>
                                                        <div class="input-group input-group-merge">
                                                            <input type="text" id="disToSchool" name="disToSchool"
                                                                class="form-control text-dark bg-secondary"
                                                                value="Ex: 10" />
                                                            <span class="input-group-text">KM</span>
                                                        </div>
                                                    </div>
                                                    <div class="mt-2">
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            Update
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button btn btn-primary collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                Parent' s Information </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse"
                                            aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body bg-secondary">
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label for="MotherName" class="form-label">Mother Name</label>
                                                        <input disabled class="form-control bg-secondary text-dark"
                                                            type="text" id="MotherName" name="MotherName"
                                                            value="Ex: Diane White" autofocus />
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="MotherNIC" class="form-label">Mother NIC</label>
                                                        <input disabled class="form-control bg-secondary text-dark"
                                                            type="text" name="MotherNIC" id="MotherNIC"
                                                            value="Ex: 78123456v" />
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="Mother Email" class="form-label">Mother
                                                            Email</label>
                                                        <input disabled class="form-control bg-secondary text-dark"
                                                            type="text" id="MotherEmail" name="Mother Email"
                                                            value="Ex: abc@gmail.com" />
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="MotherJob" class="form-label">Mother Job</label>
                                                        <input disabled type="text"
                                                            class="form-control bg-secondary text-dark" id="MotherJob"
                                                            name="MotherJob" value="Ex: Nursing" />
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="MotherJobaddress" class="form-label">Mother Job
                                                            Address</label>
                                                        <input disabled type="text"
                                                            class="form-control bg-secondary text-dark"
                                                            id="MotherJobAddress" name="MotherJobaddress"
                                                            value="Ex: Nawaloka Hospital Colombo" />
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label" for="MotherNumber">Mother Phone
                                                            Number</label>
                                                        <div class="input-group input-group-merge">
                                                            <span class="input-group-text">LK (+94)</span>
                                                            <input disabled type="text" id="MotherNumber"
                                                                name="MotherNumber"
                                                                class="form-control bg-secondary text-dark"
                                                                value="Ex: 70 123 4567" />
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="FatherName" class="form-label">Father Name</label>
                                                        <input disabled class="form-control bg-secondary text-dark"
                                                            type="text" id="FatherName" name="FatherName"
                                                            value="Ex: John Doe" />
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="FatherNIC" class="form-label">Father NIC</label>
                                                        <input disabled type="text"
                                                            class="form-control bg-secondary text-dark" id="FatherNIC"
                                                            name="FatherNIC" value="Ex: 703123234v" />
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="FatherNumber" class="form-label">Father
                                                            Number</label>
                                                        <input type="text"
                                                            class="form-control bg-secondary text-dark" disabled
                                                            value="Ex: 701113332" id="FatherNumber" />
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="FatherJob" class="form-label">Father Job</label>
                                                        <input disabled id="FatherJob"
                                                            class="form-control bg-secondary text-dark"
                                                            name="FatherJob" value="Ex: Software Engineer" />
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="FatherJobAddress" class="form-label">Father Job
                                                            Address</label>
                                                        <input disabled id="FatherJobAddress"
                                                            class="form-control bg-secondary text-dark"
                                                            name="FatherJobAddress"
                                                            value="Ex: ABC Company Nugegoda" />
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="GuardianName" class="form-label">Father
                                                            Email</label>
                                                        <input disabled id="FatherEmail"
                                                            class="form-control bg-secondary text-dark"
                                                            name="GuardianName" value="Ex: abc@outlook.com" />
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="GuardianName" class="form-label">Guardian
                                                            Name</label>
                                                        <input disabled id="GuardianName"
                                                            class="form-control bg-secondary text-dark"
                                                            name="GuardianName" value="" />
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="GuardianNIC" class="form-label">Guardian
                                                            NIC</label>
                                                        <input disabled id="GuardianNIC"
                                                            class="form-control bg-secondary text-dark"
                                                            name="GuardianNIC" value="" />
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="GuardianNumber" class="form-label">Guardian
                                                            Number</label>
                                                        <input disabled id="GuardianNumber"
                                                            class="form-control bg-secondary text-dark"
                                                            name="GuardianNumber" value="" />
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="GuardianJob" class="form-label">Guardian
                                                            Job</label>
                                                        <input disabled id="GuardianJob"
                                                            class="form-control bg-secondary text-dark"
                                                            name="GuardianJob" value="" />
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="GuardianJobAddress" class="form-label">Guardian
                                                            Job
                                                            Address</label>
                                                        <input disabled id="GuardianJobAddress"
                                                            class="form-control bg-secondary text-dark"
                                                            name="GuardianJobAddress" value="" />
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="GuardianEmail" class="form-label">Guardian
                                                            Email</label>
                                                        <input disabled id="GuardianEmail"
                                                            class="form-control bg-secondary text-dark"
                                                            name="GuardianEmail" value="" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button btn btn-primary collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                aria-expanded="false" aria-controls="collapseThree">
                                                Contact Information
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse"
                                            aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body bg-secondary">
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label for="MotherEmail" class="form-label">Mother
                                                            Email</label>
                                                        <input class="form-control  bg-secondary text-dark"
                                                            type="text" id="motherEmail" name="motherEmail"
                                                            value="Ex: abc@gmail.com" autofocus />
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label" for="phoneNumber">Mother
                                                            Number</label>
                                                        <div class="input-group input-group-merge">
                                                            <span class="input-group-text">LK (+94)</span>
                                                            <input type="text" id="motherNumber"
                                                                name="phoneNumber"
                                                                class="form-control bg-secondary text-dark"
                                                                value="Ex: 701112223" />
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="FatherEmail" class="form-label">Father
                                                            Email</label>
                                                        <input class="form-control bg-secondary text-dark"
                                                            type="text" id="fatherEmail" name="fatherEmail"
                                                            value="Ex: abc@outlook.com" />
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label" for="phoneNumber">Father
                                                            Number</label>
                                                        <div class="input-group input-group-merge">
                                                            <span class="input-group-text">LK (+94)</span>
                                                            <input type="text" id="fatherNumber"
                                                                name="phoneNumber"
                                                                class="form-control bg-secondary text-dark"
                                                                value="Ex: 701212123" />
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="address" class="form-label">Home Address</label>
                                                        <input type="text"
                                                            class="form-control bg-secondary text-dark"
                                                            id="studentAddress" name="address"
                                                            value="Ex: 432/1 B, Ganemulla, Kadawatha." />
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label" for="phoneNumber">Emergency
                                                            Number</label>
                                                        <div class="input-group input-group-merge">
                                                            <span class="input-group-text">LK (+94)</span>
                                                            <input type="text" id="emNumber" name="emNumber"
                                                                class="form-control  bg-secondary text-dark"
                                                                value="Ex: 701231234" />
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label" for="phoneNumber">Emergency
                                                            Email</label>
                                                        <input type="text" id="emEmail" name="emEmail"
                                                            class="form-control  bg-secondary text-dark"
                                                            value="Ex: abc@yahoo.com" />
                                                    </div>
                                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#contactModal">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row pt-4 pb-3">
                                    <h3 class="text-dark">Critical Undisciplined Activities</h3>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Description</th>
                                                <th>Date</th>
                                                <th>The Giver</th>
                                            </tr>
                                        </thead>
                                        <tbody id="mistakeBody">
                                            <tr>
                                                <th colspan="5" style="background: orange; color: red;">
                                                    Search A Student To Show Data
                                                </th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="row pt-4 pb-3">
                                    <h3 class="text-dark">Payment Report</h3>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Year</th>
                                                <th>Class</th>
                                                <th>Payment</th>
                                            </tr>
                                        </thead>
                                        <tbody id="paymentBody">
                                            <tr>
                                                <th colspan="4" style="background: orange; color: red;">
                                                    Search A Student To Show Data
                                                </th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row pt-4 pb-3">
                                    <h3 class="text-dark">Extra Curricular Activities Report</h3>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Activity</th>
                                                <th>Date of Start</th>
                                                <th>Date of End</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="sportBody">
                                            <tr>
                                                <th colspan="5" style="background: orange; color: red;">
                                                    Search A Student To Show Data
                                                </th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Warning</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure to save changes ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn" data-bs-dismiss="modal"
                                        onclick="updateContact(this);" style="background: #006ee5; color: white;">Save
                                        changes</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- resignation modal -->

                    <div class="modal fade" id="reModal" aria-hidden="true"
                        aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-dark" id="exampleModalToggleLabel">
                                        Warning</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Enter date of Resignation:
                                    <input class="form-control bg-secondary text-dark pt-2" id="date"
                                        type="date" />
                                </div>
                                <div class="modal-footer">
                                    <button class="btn" style="background: #026df7; color: white;"
                                        onclick="updateResignation();" data-index="" id="resignationBtn"
                                        data-bs-dismiss="modal" aria-label="Close">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- end resignation modal -->

                <!--modal Start-->

                <div class="modal fade" id="newModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Warning</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Do you want change this ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn" data-bs-dismiss="modal"
                                    onclick="changePayment(event);" style="background: #006ee5;color: white;"
                                    data-class="" data-grade="" data-index="" id="paymentBtn">Yes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--modal end-->

                <div class="modal fade" id="awardsModel" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Student Awards</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Competition</th>
                                                <th>Category</th>
                                                <th>Date</th>
                                                <th>Place</th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
                                        <tbody id="awardBody">
                                            <tr>
                                                <th colspan="4" style="background: orange; color: red;">
                                                    Search A Student To Show Data
                                                </th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Sales End -->

            </div>



            <!-- view modal start  -->
            <div class="modal fade" tabindex="-1" id="imageContainer">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark">Gallary View</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container d-flex justify-content-center align-items-center"
                                style="background-size: contain;">
                                <img src="" id="fullScreen" style="width: 100%;">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- view modal end  -->


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
</body>
<script>
    hamburger("searchStudent");

    function viewImage() {
        const box = document.getElementById("imgBox");

        const img = document.getElementById("fullScreen");
        img.src = box.dataset.img;
        $("#imageContainer").modal("show");
    }


    $("#upload").on("change", function() {
        const index = document.getElementById("studentIndexNumber");
        if (index.value == "Ex: 12345") {
            Swal.fire({
                icon: 'warning',
                title: 'WARNING',
                text: 'Please Search A Student First'
            });
        } else {
            var $canvas = $("#imageCanvas"),
                context = $canvas.get(0).getContext('2d');

            const userImg = document.getElementById("imageCanvas");
            var cropper;

            if (this.files && this.files[0]) {
                if (this.files[0].type.match(/^image\//)) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        var img = new Image();

                        img.onload = function() {
                            context.canvas.width = img.width;
                            context.canvas.height = img.height;
                            context.drawImage(img, 0, 0);

                            cropper = new Cropper(userImg, {
                                aspectRatio: 1,
                            });
                        };

                        img.src = e.target.result;
                    };

                    $("#uploadButton").on("click", function() {
                        var croppedCanvas = cropper.getCroppedCanvas();
                        var cropped = croppedCanvas.toDataURL();
                        var form = new FormData();
                        form.append("index", index.value);
                        form.append("base64", cropped);

                        var xhr = new XMLHttpRequest();
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState == 4 && xhr.status == 200) {
                                document.getElementById("imgBox").dataset.img = "profileImg/" +
                                    index.value + ".png";
                                document.getElementById("profilePic").src = cropped;
                                $("#imgModal").modal('hide');
                            }
                        }

                        xhr.open("POST", "process/uploadUserImage.php", true);
                        xhr.send(form);
                    });

                    reader.readAsDataURL(this.files[0]);
                    $('#imgModal').modal("show");
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'WARNING',
                        text: 'Please Select A Image'
                    });
                }
            }
        }
    });

    var publicIndex = 0;

    function searchStudent() {
        document.getElementById("spinner").classList.add("show")
        const index = document.getElementById("searchIndex");
        const name = document.getElementById("typing");

        publicIndex = 0;
        document.getElementById("paymentBtn").dataset.index = '';

        document.getElementById("mistakeBody").innerHTML = '';
        document.getElementById("paymentBody").innerHTML = '';
        document.getElementById("sportBody").innerHTML = '';
        document.getElementById("awardBody").innerHTML = '';

        document.getElementById("allInformationContainer").classList.add("d-none");

        if (index.value == '' && name.value == '') {
            Swal.fire({
                icon: 'warning',
                title: 'WARNING',
                text: 'Please Enter A Student Index Number Or Name'
            });
            return;
        }
        if (index.value != '' && name.value != '') {
            Swal.fire({
                icon: 'warning',
                title: 'WARNING',
                text: 'Please Enter A Student Index Number Or Name'
            });
            return;
        }
        var indexNumber = index.value;
        if (name.value != '') {
            indexNumber = name.dataset.index;
        }
        var xhr = new XMLHttpRequest();
        xhr.onload = function() {
            if (xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status == "success") {
                    if(response.class != null) {
                        publicIndex = response.student.index_number;
                        document.getElementById("paymentBtn").dataset.index = response.student.index_number;
                        document.getElementById("paymentBtn").dataset.class = response.class.class;
                        document.getElementById("paymentBtn").dataset.grade = response.class.grade;
                    }

                    var houseName;
                    var houseColor;
                    if (indexNumber % 4 == 0) {
                        houseName = "{{ env('HOUSE_01_NAME') }}";
                        houseColor = "{{ env('HOUSE_01_COLOR') }}";
                    } else if (indexNumber % 4 == 1) {
                        houseName = "{{ env('HOUSE_02_NAME') }}";
                        houseColor = "{{ env('HOUSE_02_COLOR') }}";
                    } else if (indexNumber % 4 == 2) {
                        houseName = "{{ env('HOUSE_03_NAME') }}";
                        houseColor = "{{ env('HOUSE_03_COLOR') }}";
                    } else if (indexNumber % 4 == 3) {
                        houseName = "{{ env('HOUSE_04_NAME') }}";
                        houseColor = "{{ env('HOUSE_04_COLOR') }}";
                    }

                    document.getElementById("fullName").value = response.student.full_name;
                    document.getElementById("initialName").value = response.student.initial_name;
                    document.getElementById("dob").value = response.student.date_of_birth;
                    document.getElementById("Gender").value = response.student.gender;
                    document.getElementById("address").value = response.student.address;
                    document.getElementById("studentIndexNumber").value = response.student.index_number;
                    document.getElementById("scholarship").value = response.student.scholarship;
                    document.getElementById("startYear").value = response.student.enroll_year;
                    document.getElementById("startClass").value = response.student.enroll_class;
                    document.getElementById("pSchool").value = response.student.previous_school;
                    document.getElementById("nationality").value = response.student.nationality;
                    document.getElementById("religion").value = response.student.religion;
                    document.getElementById("houseName").value = houseName;
                    document.getElementById("houseColor").style.background = houseColor;
                    document.getElementById("disToSchool").value = response.student.distance;

                    document.getElementById("MotherName").value = response.student.mother_name;
                    document.getElementById("MotherNIC").value = response.student.mother_nic;
                    document.getElementById("MotherEmail").value = response.student.mother_email;
                    document.getElementById("MotherJob").value = response.student.mother_job;
                    document.getElementById("MotherJobAddress").value = response.student.mother_job_address;
                    document.getElementById("MotherNumber").value = response.student.mother_mobile;

                    document.getElementById("FatherName").value = response.student.father_name;
                    document.getElementById("FatherNIC").value = response.student.father_nic;
                    document.getElementById("FatherEmail").value = response.student.father_email;
                    document.getElementById("FatherJob").value = response.student.father_job;
                    document.getElementById("FatherJobAddress").value = response.student.father_job_address;
                    document.getElementById("FatherNumber").value = response.student.father_mobile;

                    document.getElementById("GuardianName").value = response.student.guardian_name;
                    document.getElementById("GuardianNIC").value = response.student.guardian_nic;
                    document.getElementById("GuardianEmail").value = response.student.guardian_email;
                    document.getElementById("GuardianJob").value = response.student.guardian_job;
                    document.getElementById("GuardianJobAddress").value = response.student.guardian_job_address;
                    document.getElementById("GuardianNumber").value = response.student.guardian_mobile;

                    document.getElementById("motherEmail").value = response.student.mother_email;
                    document.getElementById("motherNumber").value = response.student.mother_mobile;
                    document.getElementById("fatherEmail").value = response.student.father_email;
                    document.getElementById("fatherNumber").value = response.student.father_mobile;
                    document.getElementById("studentAddress").value = response.student.address;
                    document.getElementById("emNumber").value = response.student.emergency_number;
                    document.getElementById("emEmail").value = response.student.emergency_email;

                    const paymentView = document.getElementById("paymentViewer");
                    if (response.class == null) {
                        paymentView.style.backgroundColor = "#ff2c2c";
                    } else {
                        if (response.class.isPayment.toLowerCase() == 'yes') {
                            paymentView.style.backgroundColor = "#2cff2c";
                        } else {
                            paymentView.style.backgroundColor = "#ff2c2c";
                        }
                    }

                    document.getElementById("attendance").innerHTML = response.attendance + "%";
                    document.getElementById("currentClass").innerHTML = response.class == null ? "Not Assigned" :
                        response.class.grade + "-" + response.class.class;
                    document.getElementById("resignation").innerHTML = response.student.resigned_at == null ?
                        "Not Resigned" : response.student.resigned_at;
                    var colorStops = [{
                            score: 0,
                            color: "#ff2c2c"
                        },
                        {
                            score: 20,
                            color: "#ff7c2c"
                        },
                        {
                            score: 40,
                            color: "#ffcc2c"
                        },
                        {
                            score: 60,
                            color: "#f7ff2c"
                        },
                        {
                            score: 80,
                            color: "#a6ff2c"
                        },
                        {
                            score: 100,
                            color: "#2cff2c"
                        }
                    ];
                    var score = 0;
                    var dColor = "#ff2c2c";
                    if (response.student.discipline_marks == null) {
                        score = 100;
                    } else {
                        score = response.student.discipline_marks;
                    }
                    for (var i = 0; i < colorStops.length; i++) {
                        if (score <= colorStops[i].score) {
                            dColor = colorStops[i].color;
                            break;
                        }
                    }
                    document.getElementById("scoreBox").style.backgroundColor = dColor;
                    document.getElementById("dScore").innerHTML = score + "%";

                    try {
                        response.student.discipline_details.forEach((record, index) => {
                            var row = document.createElement("tr");
                            var no = document.createElement("td")
                            var description = document.createElement("td");
                            var date = document.createElement("td");
                            var giver = document.createElement("td");

                            no.innerHTML = index + 1;
                            description.innerHTML = record.reason;
                            date.innerHTML = record.date;
                            giver.innerHTML = record.teacher_name;

                            row.appendChild(no);
                            row.appendChild(description);
                            row.appendChild(date);
                            row.appendChild(giver);

                            document.getElementById("mistakeBody").appendChild(row);
                        });
                    } catch (error) {
                        const row = document.createElement("tr");
                        const text = document.createElement("td");
                        text.innerHTML = "No Records Found";
                        text.colSpan = 4;
                        text.style.color = "red";
                        text.style.background = "orange";
                        row.appendChild(text);
                        document.getElementById("mistakeBody").appendChild(row);
                    }

                    try {
                        response.student.enrollments.forEach((record, index) => {
                            var row = document.createElement("tr");
                            var year = document.createElement("td");
                            var cls = document.createElement("td");
                            var payment = document.createElement("td");

                            year.innerHTML = record.year;
                            cls.innerHTML = record.grade + "-" + record.class;
                            payment.innerHTML = record.isPayment.toUpperCase();
                            payment.style.color = "black";
                            payment.style.fontWeight = "bold";
                            if (record.isPayment.toLowerCase() == "yes") {
                                payment.style.backgroundColor = "#2cff2c";
                            } else {
                                payment.style.backgroundColor = "#ff2c2c";
                            }

                            row.appendChild(year);
                            row.appendChild(cls);
                            row.appendChild(payment);

                            document.getElementById("paymentBody").appendChild(row);
                        });
                    } catch (error) {
                        const row = document.createElement("tr");
                        const text = document.createElement("td");
                        text.innerHTML = "No Records Found";
                        text.colSpan = 3;
                        text.style.color = "red";
                        text.style.background = "orange";
                        row.appendChild(text);

                        document.getElementById("paymentBody").appendChild(row);
                    }

                    try {
                        response.student.sports.forEach((record, index) => {
                            var row = document.createElement("tr");
                            var no = document.createElement("td");
                            var activity = document.createElement("td");
                            var startDate = document.createElement("td");
                            var endDate = document.createElement("td");
                            var action = document.createElement("td");
                            var button = document.createElement("button");

                            no.innerHTML = index + 1;
                            activity.innerHTML = record.name;
                            startDate.innerHTML = record.start_date;
                            endDate.innerHTML = record.end_date == null ? "Present" : record.end_date;
                            button.classList = "btn btn-success";
                            button.innerHTML = "More";
                            button.dataset.sport = record.name;
                            button.dataset.index = response.student.index_number;
                            button.onclick = function() {
                                getAwards();
                            }

                            row.appendChild(no);
                            row.appendChild(activity);
                            row.appendChild(startDate);
                            row.appendChild(endDate);
                            row.appendChild(action);

                            action.appendChild(button);
                            document.getElementById("sportBody").appendChild(row);
                        });
                    } catch (error) {
                        const row = document.createElement("tr");
                        const text = document.createElement("td");
                        text.innerHTML = "No Records Found";
                        text.colSpan = 5;
                        text.style.color = "red";
                        text.style.background = "orange";
                        row.appendChild(text);
                        document.getElementById("sportBody").appendChild(row);
                    }
                    document.getElementById("allInformationContainer").classList.remove("d-none");
                    document.getElementById("spinner").classList.remove("show");
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Invaid',
                        text: 'Invalid Index Number Or Name!',
                    });
                    document.getElementById("spinner").classList.remove("show");
                }
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                });
                document.getElementById("spinner").classList.remove("show");
            }
        }

        xhr.open('GET', "{{ route('search.student.all.details', ':id') }}".replace(':id', indexNumber));
        xhr.send();
    }

    function getAwards() {
        const sport = event.target.dataset.sport;
        const index = event.target.dataset.index;
        document.getElementById("awardBody").innerHTML = "";
        var form = new FormData();
        form.append("sport", sport);
        form.append("index", index);
        const xhr = new XMLHttpRequest();
        xhr.onload = function() {
            if (xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                var row = document.createElement("tr");
                if (response.length > 0) {
                    response.forEach(award => {
                        var competition = document.createElement("td");
                        var category = document.createElement("td");
                        var place = document.createElement("td");
                        var date = document.createElement("td");
                        var description = document.createElement("td");

                        competition.innerHTML = award.competition;
                        category.innerHTML = award.category;
                        place.innerHTML = award.place;
                        date.innerHTML = award.date;
                        description.innerHTML = award.description;

                        row.appendChild(competition);
                        document.getElementById("awardBody").appendChild(row);
                    });
                } else {
                    const text = document.createElement("td");
                    text.innerHTML = "No Records Found";
                    text.colSpan = 5;
                    text.style.color = "red";
                    text.style.background = "orange";
                    row.appendChild(text);
                    document.getElementById("awardBody").appendChild(row);
                }
                $('#awardsModel').modal('show');
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                });
            }
        }
        xhr.open('POST', "{{ route('search.award') }}");
        xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
        xhr.send(form);
    }

    function studentLiveSearch() {
        document.getElementById("item-container").style.display = "";
        var name = document.getElementById("typing").value;

        if (name.trim() == "") {
            document.getElementById("item-container").innerHTML = "";
        } else {
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
        }
    }

    function changePayment() {
        if (event.target.dataset.index == '') {
            Swal.fire({
                icon: 'warning',
                title: 'WARNING',
                text: "Search a Student First"
            });
        } else {
            var index = event.target.dataset.index;
            var clz = event.target.dataset.class;
            var grade = event.target.dataset.grade;

            var form = new FormData();
            form.append("index", index);
            form.append("class", clz);
            form.append("grade", grade);

            var xhr = new XMLHttpRequest();
            xhr.onload = function() {
                if (xhr.status == 200) {
                    var response = xhr.responseText;
                    var box = document.getElementById('paymentViewer');
                    if(response == 'not_enrolled') {
                        Swal.fire({
                            icon: 'warning',
                            title: 'WARNING',
                            text: "This Student Not Enrolled For A Class Yet"
                        });
                    }
                    else if (response == "no") {
                        box.style.background = '#ff2c2c';
                    } else if(response == 'yes'){
                        box.style.background = '#2cae6b';
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: "Something Went Wrong"
                        });
                    }
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: "Internel Server Error",
                        footer: "<a href='http://wa.me/94701189971'>Contact Developers Here</a>"
                    });
                }
            }

            xhr.open("POST", "{{ route('change.payment') }}", true);
            xhr.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').content);
            xhr.send(form);
        }
    }

    function updateResignation() {
        var index = publicIndex
        if (index == 0) {
            Swal.fire({
                icon: 'warning',
                title: 'WARNING',
                text: "Search a Student First"
            });
        } else {
            var date = document.getElementById("date").value;
            if (date == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'WARNING',
                    text: "Please Enter A Date"
                });
            } else {
                var form = new FormData();
                form.append("date", date);
                form.append("index", index);

                var xhr = new XMLHttpRequest();
                xhr.onload = function() {
                    if (xhr.status == 200) {
                        document.getElementById("resignation").innerHTML = date;
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: "Internel Server Error",
                            footer: "<a href='http://wa.me/94701189971'>Contact Developers Here</a>"
                        });
                    }
                };

                xhr.open("POST", "{{ route('resign.student') }}");
                xhr.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').content);
                xhr.send(form);
            }
        }
    }

    function updateStudentData() {
        var index = document.getElementById("studentIndexNumber").value;
        if (index == 'Ex: 12345') {
            Swal.fire({
                icon: 'warning',
                title: 'WARNING',
                text: "Please Search A Student First"
            });
        } else {
            var fullName = document.getElementById("fullName").value;
            var initialName = document.getElementById("initialName").value;
            var dob = document.getElementById("dob").value;
            var address = document.getElementById("address").value;
            var pSchool = document.getElementById("pSchool").value;
            var disToSchool = document.getElementById("disToSchool").value;

            var form = new FormData();

            form.append("index", index);
            form.append("fullName", fullName);
            form.append("initialName", initialName);
            form.append("dob", dob);
            form.append("address", address);
            form.append("pSchool", pSchool);
            form.append("nationality", nationality);
            form.append("religion", religion);
            form.append("disToSchool", disToSchool);

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Updated Successfully',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            }

            xhr.open("POST", "process/updateStudentData.php", true);
            xhr.send(form);
        }
    }

    function updateContact() {
        var index = document.getElementById("studentIndexNumber").value;
        if (index == 'Ex: 12345') {
            Swal.fire({
                icon: 'warning',
                title: 'WARNING',
                text: "Please Search A Student First"
            });
        } else {
            var motherNumber = document.getElementById("motherNumber").value;
            var fatherNumber = document.getElementById("fatherNumber").value;
            var motherEmail = document.getElementById("motherEmail").value;
            var fatherEmail = document.getElementById("fatherEmail").value;
            var emNumber = document.getElementById("emNumber").value;
            var emEmail = document.getElementById("emEmail").value;
            var address = document.getElementById("address").value;

            var form = new FormData();
            form.append("motherNumber", motherNumber);
            form.append("motherEmail", motherEmail);
            form.append("fatherNumber", fatherNumber);
            form.append("fatherEmail", fatherEmail);
            form.append("emNumber", emNumber);
            form.append("emEmail", emEmail);
            form.append("address", address);

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Updated Successfully',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            }

            xhr.open("POST", "process/updateContact.php", true);
            xhr.send(form);
        }
    }
</script>

</html>
