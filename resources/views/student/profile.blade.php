<!DOCTYPE html>
<html lang="en">

<head>
    @include('student.components.head')

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
        @include('student.components.hamburger')
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('student.components.navbar')
            <!-- Navbar End -->


            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row">
                    @if ($class["isPayment"] == "no")
                    <div class="col-12 mt-md-0 col-md-4">
                        <div data-bs-toggle="modal" data-bs-target="#newModal"
                            class="rounded d-flex align-items-center justify-content-between p-4"
                            style="background: #ff2c2c; color: white; cursor: pointer;" id="paymentViewer">
                            <i class="bi bi-cash fa-2x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Facility charges</p>
                                <h6 class="mb-0 text-dark"> {{ env("SCHOOL_FEE") }} </h6>
                            </div>
                        </div>
                    </div>
                    @else 
                    <div class="col-12 mt-md-0 col-md-4">
                        <div data-bs-toggle="modal" data-bs-target="#newModal"
                            class="rounded d-flex align-items-center justify-content-between p-4"
                            style="background: #50ca2b; color: white;" id="paymentViewer">
                            <i class="bi bi-cash fa-2x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Facility charges</p>
                                <h6 class="mb-0 text-dark"> {{ env("SCHOOL_FEE") }} </h6>
                            </div>
                        </div>
                    </div>
                    @endif


                    <div class="col-12 mt-md-0 mt-3 col-md-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="bi bi-percent fa-2x text-dark"></i>
                            <div class="ms-3">
                                <p class="mb-2">student attendance</p>
                                <h6 class="mb-0 text-dark" id="attendance"> {{ $attendance }}% </h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-md-0 mt-3 col-md-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="bi bi-book-half fa-2x text-dark"></i>
                            <div class="ms-3">
                                <p class="mb-2">Class</p>
                                <h6 class="mb-0 text-dark" id="currentClass">{{ $class["grade"] }}-{{ $class['class'] }}</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-3 col-md-6">
                        <div data-bs-target="#reModal" data-bs-toggle="modal"
                            class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="bi bi-calendar-week-fill fa-2x text-dark"></i>
                            <div class="ms-3">
                                <p class="mb-2">Date Of Resignation</p>
                                <h6 class="mb-0 text-dark" id="resignation">
                                    @if ($student["resignation_date"] == null)
                                        Not Resigned
                                    @else
                                        {{ $student["resignation_date"] }}
                                    @endif
                                </h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-3 col-md-6">
                        <div style="background-color: #00FF00;" id="scoreBox"
                            class="rounded d-flex align-items-center justify-content-between p-4">
                            <i class="bi bi-capslock-fill fa-2x text-dark"></i>
                            <div class="ms-3">
                                <p class="mb-2">Discipline Score</p>
                                <h6 class="mb-0 text-dark" id="dScore">{{ $student["discipline_marks"] }}%</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->


            <!-- Profile start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded p-4">
                    <div class="row">
                        <h3 class="text-dark">Personal Information</h3>
                        <div class="row d-flex align-items-center">
                            <div class="col-8 col-md-5 col-lg-4">
                                <div class="p-3">
                                    <div class="img d-flex justify-content-center align-items-center" id="imgBox"
                                        onclick="viewImage();" data-img="profileImg/default.png">
                                        <img style="border-radius: 50%; width: 90%;" src="profileImg/default.png"
                                            id="profilePic">
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
                            <div class="modal fade " id="imgModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Crop Your
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
                                            <button type="button" class="btn" style="background: #367beb; color: white;"
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
                                        data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        Student Information
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body bg-secondary">
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="FullName" class="form-label">Full Name</label>
                                                <input class="form-control bg-secondary text-dark" type="text"
                                                    id="fullName" name="fullName" value="{{ $student->full_name }}" autofocus
                                                    disabled />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="Namewithinitials" class="form-label">Name with
                                                    initials</label>
                                                <input class="form-control bg-secondary text-dark" type="text"
                                                    name="initialName" id="initialName" value="{{ $student->initial_name }}"
                                                    disabled />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="Dateofbirth" class="form-label">Date of birth</label>
                                                <input class="form-control bg-secondary text-dark" type="text" id="dob"
                                                    name="Dateofbirth" value="{{ $student->date_of_birth }}" disabled />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="Gender" class="form-label">Gender</label>
                                                <input type="text" class="form-control bg-secondary text-dark"
                                                    id="Gender" name="Gender" value="{{ $student->gender }}" disabled />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="address" class="form-label">Address</label>
                                                <input type="text" class="form-control bg-secondary text-dark"
                                                    id="address" name="address" value="{{ $student->address }}"
                                                    disabled />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="Indexnumber" class="form-label">Index number</label>
                                                <input class="text-dark form-control bg-secondary" disabled type="text"
                                                    id="studentIndexNumber" name="Indexnumber" value="{{ $student->index_number }}"
                                                    maxlength="6" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="Scholarship" class="form-label">Scholarship</label>
                                                <input type="text" class="text-dark form-control bg-secondary"
                                                    id="scholarship" name="Scholarship" value="{{ $student->scholarship }}" disabled />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="Nerollyear" class="form-label">Enroll year</label>
                                                <input id="startYear" class="text-dark bg-secondary form-control"
                                                    disabled name="enrollyear" value="{{ $student->enroll_year }}" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="Encrollclass" class="form-label">Enroll class</label>
                                                <input id="startClass" class="text-dark bg-secondary form-control"
                                                    disabled name="enrollclass" value="{{ $student->enroll_class }}" />

                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="address" class="form-label">Previous School</label>
                                                <input disabled type="text" class="form-control bg-secondary text-dark"
                                                    id="pSchool" name="pSchool" value="{{ $student->previous_school }}" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="Nationality" class="form-label">Nationality</label>
                                                <input disabled id="nationality"
                                                    class="text-dark bg-secondary form-control" name="nationality"
                                                    value="{{ $student->nationality }}" />

                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="Religion" class="form-label">Religion</label>
                                                <input disabled id="religion"
                                                    class="text-dark bg-secondary form-control" name="religion"
                                                    value="{{ $student->religion }}" />
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label" for="phoneNumber">House</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text" id="houseColor"
                                                        style="background: {{ $house->color }};"></span>
                                                    <input type="text" id="houseName" disabled name="phoneNumber"
                                                        class="form-control text-dark bg-secondary"
                                                        value="{{ $house->name }}" />
                                                </div>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label" for="distance">Distance to School</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="text" id="disToSchool" name="disToSchool"
                                                        class="form-control text-dark bg-secondary" value="{{ $student->distance }}"
                                                        disabled />
                                                    <span class="input-group-text">KM</span>
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal">
                                                    Request change
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button btn btn-primary collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                        Parent' s Information </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body bg-secondary">
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="MotherName" class="form-label">Mother Name</label>
                                                <input disabled class="form-control bg-secondary text-dark" type="text"
                                                    id="MotherName" name="MotherName" value="{{ $student->mother_name }}"
                                                    autofocus />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="MotherNIC" class="form-label">Mother NIC</label>
                                                <input disabled class="form-control bg-secondary text-dark" type="text"
                                                    name="MotherNIC" id="MotherNIC" value="{{ $student->mother_nic }}" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="Mother Email" class="form-label">Mother Email</label>
                                                <input disabled class="form-control bg-secondary text-dark" type="text"
                                                    id="MotherEmail" name="Mother Email" value="{{ $student->mother_email }}" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="MotherJob" class="form-label">Mother Job</label>
                                                <input disabled type="text" class="form-control bg-secondary text-dark"
                                                    id="MotherJob" name="MotherJob" value="{{ $student->mother_job }}" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="MotherJobaddress" class="form-label">Mother Job
                                                    Address</label>
                                                <input disabled type="text" class="form-control bg-secondary text-dark"
                                                    id="MotherJobAddress" name="MotherJobaddress"
                                                    value="{{ $student->mother_job_address }}" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label" for="MotherNumber">Mother Phone
                                                    Number</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text">LK (+94)</span>
                                                    <input disabled type="text" id="MotherNumber" name="MotherNumber"
                                                        class="form-control bg-secondary text-dark"
                                                        value="{{ $student->mother_mobile }}" />
                                                </div>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="FatherName" class="form-label">Father Name</label>
                                                <input disabled class="form-control bg-secondary text-dark" type="text"
                                                    id="FatherName" name="FatherName" value="{{ $student->father_name }}" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="FatherNIC" class="form-label">Father NIC</label>
                                                <input disabled type="text" class="form-control bg-secondary text-dark"
                                                    id="FatherNIC" name="FatherNIC" value="{{ $student->father_nic }}" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="FatherNumber" class="form-label">Father Number</label>
                                                <input type="text" class="form-control bg-secondary text-dark" disabled
                                                    value="{{ $student->father_mobile }}" id="FatherNumber" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="FatherJob" class="form-label">Father Job</label>
                                                <input disabled id="FatherJob"
                                                    class="form-control bg-secondary text-dark" name="FatherJob"
                                                    value="{{ $student->father_job }}" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="FatherJobAddress" class="form-label">Father Job
                                                    Address</label>
                                                <input disabled id="FatherJobAddress"
                                                    class="form-control bg-secondary text-dark" name="FatherJobAddress"
                                                    value="{{ $student->father_job_address }}" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="GuardianName" class="form-label">Father Email</label>
                                                <input disabled id="FatherEmail"
                                                    class="form-control bg-secondary text-dark" name="GuardianName"
                                                    value="{{ $student->father_email }}" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="GuardianName" class="form-label">Guardian Name</label>
                                                <input disabled id="GuardianName"
                                                    class="form-control bg-secondary text-dark" name="GuardianName"
                                                    value="{{ $student->guardian_name }}" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="GuardianNIC" class="form-label">Guardian NIC</label>
                                                <input disabled id="GuardianNIC"
                                                    class="form-control bg-secondary text-dark" name="GuardianNIC"
                                                    value="{{ $student->guardian_nic }}" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="GuardianNumber" class="form-label">Guardian
                                                    Number</label>
                                                <input disabled id="GuardianNumber"
                                                    class="form-control bg-secondary text-dark" name="GuardianNumber"
                                                    value="{{ $student->guardian_mobile }}" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="GuardianJob" class="form-label">Guardian Job</label>
                                                <input disabled id="GuardianJob"
                                                    class="form-control bg-secondary text-dark" name="GuardianJob"
                                                    value="{{ $student->guardian_job }}" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="GuardianJobAddress" class="form-label">Guardian Job
                                                    Address</label>
                                                <input disabled id="GuardianJobAddress"
                                                    class="form-control bg-secondary text-dark"
                                                    name="GuardianJobAddress" value="{{ $student->guardian_job_address }}" />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="GuardianEmail" class="form-label">Guardian Email</label>
                                                <input disabled id="GuardianEmail"
                                                    class="form-control bg-secondary text-dark" name="GuardianEmail"
                                                    value="{{ $student->guardian_email }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button btn btn-primary collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Contact Information
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body bg-secondary">
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="MotherEmail" class="form-label">Mother Email</label>
                                                <input class="form-control  bg-secondary text-dark" type="text"
                                                    id="motherEmail" name="motherEmail" value="{{ $student->mother_email }}"
                                                    autofocus disabled />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label" for="phoneNumber">Mother Number</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text">LK (+94)</span>
                                                    <input type="text" id="motherNumber" name="phoneNumber"
                                                        class="form-control bg-secondary text-dark"
                                                        value="{{ $student->mother_mobile }}" disabled />
                                                </div>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="FatherEmail" class="form-label">Father Email</label>
                                                <input class="form-control bg-secondary text-dark" type="text"
                                                    id="fatherEmail" name="fatherEmail" value="{{ $student->father_email }}"
                                                    disabled />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label" for="phoneNumber">Father Number</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text">LK (+94)</span>
                                                    <input type="text" id="fatherNumber" name="phoneNumber"
                                                        class="form-control bg-secondary text-dark"
                                                        value="{{ $student->father_mobile }}" disabled />
                                                </div>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="address" class="form-label">Home Address</label>
                                                <input type="text" class="form-control bg-secondary text-dark"
                                                    id="studentAddress" name="address"
                                                    value="{{ $student->address }}" disabled />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label" for="phoneNumber">Emergency Number</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text">LK (+94)</span>
                                                    <input type="text" id="emNumber" name="emNumber"
                                                        class="form-control  bg-secondary text-dark"
                                                        value="{{ $student->emergency_number }}" disabled />
                                                </div>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label" for="phoneNumber">Emergency Email</label>
                                                <input type="text" id="emEmail" name="emEmail"
                                                    class="form-control  bg-secondary text-dark"
                                                    value="{{ $student->emergency_email }}" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Profile End -->


            <!-- Profile Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row">
                    <div class="col-12 mt-md-0 mt-3 col-md-6">
                        <div class="bg-secondary rounded  p-4">
                            <div>
                                <div>
                                    <h6 class="text-dark">Basket subjects</h6>
                                </div>
                                <div class="row">
                                    <div class="col-4" style="border-right: #000 1px solid;">
                                        <div>
                                            @if(isset($student->subjects["aesthetics_subject"]))
                                            <p class="text-dark"> {{ $student->subjects["aesthetics_subject"] }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4" style="border-right: #000 1px solid;">
                                        <div>
                                            @if(isset($student->subjects["ol_subject_1"]))
                                            @for($i=1;$i<=3;$i++)
                                            <p class="mb-0 text-dark"> {{ $student->subjects["ol_subject_$i"] }} </p>
                                            @endfor
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4" style="border-right: #000 1px solid;">
                                        <div>
                                            @if(isset($student->subjects["al_subject_1"]))
                                            @for($i=1;$i<=3;$i++)
                                            <p class="mb-0 text-dark"> {{ $student->subjects["al_subject_$i"] }} </p>
                                            @endfor
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-md-0 mt-3 col-md-6">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <div>
                                <div>
                                    <h6 class="text-dark">Sports & extracurricular activities</h6>
                                </div>
                                <div class="ms-3">
                                    <p class="mb-0 text-dark" id="attendance"> cricket </p>
                                    <p class="mb-0 text-dark" id="attendance"> none </p>
                                    <p class="mb-0 text-dark" id="attendance"> none </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Profile End -->


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

</html>