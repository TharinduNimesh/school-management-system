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

            <!-- Profile Start -->
            <div class="container-fluid pt-4 px-4">
                <h4 class="fw-bold py-3 mb-4"><span class="text-dark fw-light">Add Award For Students</span></h4>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"></div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <h5 class="card-header text-dark">Search Student Here</h5>
                            <!-- Account search start-->
                            <hr class="my-0" />
                            <div class="card-body">
                                <div class="row">

                                    <div class="mb-3 col-md-6">
                                        <label for="Namewithinitials" class="form-label ">Search By Student's Name</label>
                                        <input class="form-control bg-secondary text-dark " type="text" name="Namewithinitials" placeholder="Search By Student's Name"
                                            id="searchByName" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Namewithinitials" class="form-label ">Search By Student's Index Number</label>
                                        <input class="form-control bg-secondary text-dark " type="text" name="Namewithinitials" placeholder="Search By Student's Index Number"
                                        id="searchByIndex" />
                                    </div>
                                    
                                 </div>
                                <div class="mt-2">
                                    <button type="button" class="btn btn-primary" id="searchBtn" onclick="searchStudent();">
                                     Search
                                    </button>
                                </div>
                            </div>
                            <!-- /Account search end -->
                        </div>

                        <div class="card mb-4">
                            <h5 class="card-header text-dark">Here your Search Result</h5>
                            <!-- search result start-->
                            <div class="card-body">
                                <div class="row">

                                    <div class="mb-3 col-md-6">
                                        <label for="Namewithinitials" class="form-label ">Student Name</label>
                                        <input class="form-control bg-secondary text-dark " disabled type="text" name="Namewithinitials" value="example-: A.B.Name"
                                            id="NameResult" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Namewithinitials" class="form-label ">Student Grade</label>
                                        <input class="form-control bg-secondary text-dark " disabled type="text" name="Namewithinitials" value=" example-: 6-F"
                                        id="classGradeResult" />
                                    </div>


                                    

                                    <div>
                                        <label for="">Achievements so far</label>
                                        <table class="table">
                                            <thead>
                                              <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Award Name</th>
                                                <th scope="col">Year</th>
                                                <th scope="col">Place</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>Champion</td>
                                              </tr>
                                              <tr>
                                                <th scope="row">2</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>3rd place</td>
                                              </tr>
                                              <tr>
                                                <th scope="row">3</th>
                                                <td >Larry the Bird</td>
                                                <td>@twitter</td>
                                                <td>Runner Up</td>
                                              </tr>
                                            </tbody>
                                          </table>
                                    </div>
                                 </div>
                               
                            </div>
                            <!-- /search result end -->
                        </div>

                        <div class="card mb-4">
                            <h5 class="card-header text-dark">Add Award For Student</h5>
                            <!-- Add award start-->
                            <hr class="my-0" />
                            <div class="card-body">
                                <div class="row">

                                    <div class="mb-3">
                                        <label for="Namewithinitials" class="form-label "> Name In Award</label>
                                        <input class="form-control bg-secondary text-dark " type="text" name="Namewithinitials" placeholder="Type a award name"
                                            id="awardName"/>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Namewithinitials" class="form-label ">The year the competition was held</label>
                                        <input class="form-control bg-secondary text-dark " type="text" name="Namewithinitials" placeholder="Type the year the competition was held"
                                        id="awardYear"/>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Namewithinitials" class="form-label ">Winning place</label>
                                        <input class="form-control bg-secondary text-dark " type="text" name="Namewithinitials" placeholder="Type a Winning place"
                                        id="WinningPlace"/>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Discription</label>
                                        <textarea class="form-control bg-secondary text-dark" placeholder="Type a Discription" id="discription"></textarea>
                                      </div>
                                 </div>
                                <div class="mt-2">
                                    <button type="button" class="btn btn-primary" onclick="addAward();">
                                     Add Award
                                    </button>
                                </div>
                            </div>
                            <!-- /Add award end -->
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- Profile End -->

            
            @include('public_components.footer')
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    @include('public_components.js')

    <script>
        function searchStudent(){
            const index = document.getElementById("searchByName");
            const name = document.getElementById("searchByIndex");

            if (index.value.trim() == '' && name.value.trim() == '' || index.value.trim() != '' && name.value.trim() != '') {
            Swal.fire({
                icon: 'warning',
                title: 'WARNING',
                text: 'You must fill in one text field at a time'
            });
           }else{
            var studentIndex;
            if (name.value.trim() != "") {
                studentIndex = name.dataset.index;
            } else {
                studentIndex = index.value;
            }

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.status == "error") {
                        Swal.fire({
                            icon: 'warning',
                            title: 'WARNING',
                            text: 'Invalid Index Number'
                        });
                    } else if (response.status == "permission") {
                        Swal.fire({
                            icon: 'error',
                            title: 'ERROR',
                            text: 'Permission Denied'
                        });
                    } else {
                        document.getElementById("NameResult").value = response.student["initial_name"];
                        document.getElementById("classGradeResult").value = response.student["current_grade"+"-"+"current_class"];
                       
                    }
                }
            }

            xhr.open("GET", "process/searchStudent.php?index=" + studentIndex + "", true);
            xhr.send();
        }
        }

        function addAward(){
            const awardName = document.getElementById("awardName");
            const awardYear = document.getElementById("awardYear");
            const WinningPlace = document.getElementById("WinningPlace");
            const discription = document.getElementById("discription");
        }
    </script>

   
</body>

</html>