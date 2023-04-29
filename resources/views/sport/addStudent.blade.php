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
                                        alt="user-avatar" height="100" width="100" />
                                    <div class="button-wrapper">
                                    </div>
                                </div>
                            </div>
                            <hr class="my-0" />
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="Namewithinitials" class="form-label ">Name with initials</label>
                                        <input class="form-control bg-secondary text-dark "disabled type="text" name="Namewithinitials"
                                            id="Namewithinitials" value="S.L.D.John Doe" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Indexnumber" class="form-label">Index number</label>
                                        <input disabled class="form-control  bg-secondary text-dark" type="text" id="studentIndexNumber" name="Indexnumber"
                                            value="23059" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Encrollclass" class="form-label">Current Grade</label>
                                        <input disabled id="currentGrade" class="form-control  bg-secondary text-dark" name="Encrollclass"
                                            value="6" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="Encrollclass" class="form-label">Current Class</label>
                                        <input disabled id="currentClass" class="form-control  bg-secondary text-dark" name="Encrollclass"
                                            value="F" />
                                    </div>
                                 </div>
                                <div class="mt-2">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
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

            @include('public_components.footer')
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    @include('public_components.js')
    <script>
        function studentSearch(){
            const index = document.getElementById("searchIndex");
            const name = document.getElementById("typing");

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
                        document.getElementById("initialName").value = response.student["initial_name"];
                        document.getElementById("studentIndexNumber").value = response.student["index_number"];
                        document.getElementById("currentClass").value = response.student["current_class"];
                        document.getElementById("currentGrade").value = response.student["current_grade"];
                       
                    }
                }
            }

            xhr.open("GET", "process/searchStudent.php?index=" + studentIndex + "", true);
            xhr.send();
        }
        }
    </script>
</body>

</html>