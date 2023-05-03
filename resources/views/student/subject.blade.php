<!DOCTYPE html>
<html lang="en">

<head>
    @include('student.components.head')
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        @include('public_components.spinner')

        @include('student.components.hamburger')


        <!-- Content Start -->
        <div class="content">
            @include('student.components.navbar')

            <!-- Profile Start -->
            <div class="container-fluid pt-4 px-4">
                <h4 class="fw-bold py-3 mb-4"><span class="text-dark fw-light">Request For The Bucket Subjects</span></h4>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"></div>

                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Dear Students,</h4>
                    <p>You have not completed your course registration for the upcoming semester. Please complete your registration as soon as possible to avoid any delays in your academic progress. If you have any questions or concerns regarding the registration process, please contact the student services office for assistance.</p>
                    <hr>
                    <p class="mb-0">Thank you for your attention, and we wish you all the best for the upcoming semester.</p>
                  </div>
                <div class="row">
                    <div class="col-md-12">
                        

                        <div class="card mb-4">
                            <h5 class="card-header text-dark">Grade 6 Selection of Bucket Subject</h5>
                            <!-- Account search start-->
                            <hr class="my-0" />
                            <div class="card-body">
                                
                                <div class="row">
                                    <span> You can choose one aesthetic subject and apply..!</span>
                                    <div class="mb-3 col-md-6">
                                        <div class="input-group mb-3 mt-3">
                                            <label class="input-group-text text-dark bg-secondary" for="inputGroupSelect01">For first choice aesthetic subject</label>
                                            <select class="form-select text-dark bg-secondary" id="inputGroupSelect01">
                                              <option selected>Choose...</option>
                                              <option value="1">Art</option>
                                              <option value="2">Dance</option>
                                              <option value="3">Music</option>
                                              <option value="3">drama</option>
                                            </select>
                                          </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <div class="input-group mb-3 mt-3">
                                            <label class="input-group-text text-dark bg-secondary" for="inputGroupSelect01">For second choice aesthetic subject</label>
                                            <select class="form-select text-dark bg-secondary" id="inputGroupSelect01">
                                              <option selected>Choose...</option>
                                              <option value="1">Art</option>
                                              <option value="2">Dance</option>
                                              <option value="3">Music</option>
                                              <option value="3">drama</option>
                                            </select>
                                          </div>
                                    </div>
                                    
                                 </div>
                                <div class="mt-2">
                                    <button type="button" class="btn btn-primary" id="searchBtn" onclick="gradeSixRequest();">
                                     Request
                                    </button>
                                </div>
                            </div>
                            <!-- /Account search end -->
                        </div>

                        <div class="card mb-4">
                            <h5 class="card-header text-dark">Grade 10 Selection of Bucket Subjects</h5>
                            <!-- search result start-->
                            <div class="card-body">
                                <div class="row">
                                    <lable>Grade 10 Bucket Subject 1</lable>
                                    <hr>
                                    
                                    <span>You can request two choices for Bucket Subject 1...!</span>
                                
                                    <div class="mb-3 col-md-6">
                                        <div class="input-group mb-3 mt-3">
                                            <label class="input-group-text text-dark bg-secondary" for="inputGroupSelect01">For first choice bucket subject 1</label>
                                            <select class="form-select text-dark bg-secondary" id="inputGroupSelect01">
                                              <option selected>Choose...</option>
                                              <option value="1">Art</option>
                                              <option value="2">Dance</option>
                                              <option value="3">Music</option>
                                              <option value="3">drama</option>
                                            </select>
                                          </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <div class="input-group mb-3 mt-3">
                                            <label class="input-group-text text-dark bg-secondary" for="inputGroupSelect01">For second choice bucket subject 1</label>
                                            <select class="form-select text-dark bg-secondary" id="inputGroupSelect01">
                                              <option selected>Choose...</option>
                                              <option value="1">Art</option>
                                              <option value="2">Dance</option>
                                              <option value="3">Music</option>
                                              <option value="3">drama</option>
                                            </select>
                                          </div>
                                    </div>

                                    <label>Grade 10 Bucket Subject 2</label>
                                    <hr>
                                    <span>You can request two choices for Bucket Subject 2...!</span>

                                      <div class="mb-3 col-md-6">
                                        <div class="input-group mb-3 mt-3">
                                            <label class="input-group-text text-dark bg-secondary" for="inputGroupSelect01">For first choice bucket subject 2</label>
                                            <select class="form-select text-dark bg-secondary" id="inputGroupSelect01">
                                              <option selected>Choose...</option>
                                              <option value="1">Art</option>
                                              <option value="2">Dance</option>
                                              <option value="3">Music</option>
                                              <option value="3">drama</option>
                                            </select>
                                          </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <div class="input-group mb-3 mt-3">
                                            <label class="input-group-text text-dark bg-secondary" for="inputGroupSelect01">For second choice bucket subject 2</label>
                                            <select class="form-select text-dark bg-secondary" id="inputGroupSelect01">
                                              <option selected>Choose...</option>
                                              <option value="1">Art</option>
                                              <option value="2">Dance</option>
                                              <option value="3">Music</option>
                                              <option value="3">drama</option>
                                            </select>
                                          </div>
                                    </div>
                                    <label for="Namewithinitials" class="form-label ">Grade 10 Bucket Subject 3</label>
                                    <hr>
                                    <span>You can request two choices for Bucket Subject 3...!</span>
                                      <div class="mb-3 col-md-6 ">
                                        <div class="input-group mb-3 mt-3">
                                            <label class="input-group-text text-dark bg-secondary" for="inputGroupSelect01">For first choice bucket subject 3</label>
                                            <select class="form-select text-dark bg-secondary" id="inputGroupSelect01">
                                              <option selected>Choose...</option>
                                              <option value="1">Art</option>
                                              <option value="2">Dance</option>
                                              <option value="3">Music</option>
                                              <option value="3">drama</option>
                                            </select>
                                          </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <div class="input-group mb-3 mt-3">
                                            <label class="input-group-text text-dark bg-secondary" for="inputGroupSelect01">For second choice bucket subject 3</label>
                                            <select class="form-select text-dark bg-secondary" id="inputGroupSelect01">
                                              <option selected>Choose...</option>
                                              <option value="1">Art</option>
                                              <option value="2">Dance</option>
                                              <option value="3">Music</option>
                                              <option value="3">drama</option>
                                            </select>
                                          </div>
                                    </div>


                                    <div class="mt-2">
                                        <button type="button" class="btn btn-primary" id="searchBtn" onclick="gradeTenRequest();">
                                         Request
                                        </button>
                                    </div>
                                    
                                 </div>
                               
                            </div>
                            <!-- /search result end -->
                        </div>

                        <div class="card mb-4">
                            <h5 class="card-header text-dark">Grade 12 Selection of stream Subjects</h5>
                            <!-- search result start-->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-12 mt-3">
                                        <span>Choose a subject stream</span>
                                        <select class="form-select mt-3 text-dark bg-secondary" aria-label="Default select example">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                          </select>
                                        </div>
                                    
                                    <lable class="mt-3">Grade 12 stream Subject 1</lable>
                                    <hr>
                                    
                                    <span>You can request two choices for stream Subject 1...!</span>
                                
                                    <div class="mb-3 col-md-6">
                                        <div class="input-group mb-3 mt-3">
                                            <label class="input-group-text text-dark bg-secondary" for="inputGroupSelect01">For first choice stream subject 1</label>
                                            <select class="form-select text-dark bg-secondary" id="inputGroupSelect01">
                                              <option selected>Choose...</option>
                                              <option value="1">Art</option>
                                              <option value="2">Dance</option>
                                              <option value="3">Music</option>
                                              <option value="3">drama</option>
                                            </select>
                                          </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <div class="input-group mb-3 mt-3">
                                            <label class="input-group-text text-dark bg-secondary" for="inputGroupSelect01">For second choice stream subject 1</label>
                                            <select class="form-select text-dark bg-secondary" id="inputGroupSelect01">
                                              <option selected>Choose...</option>
                                              <option value="1">Art</option>
                                              <option value="2">Dance</option>
                                              <option value="3">Music</option>
                                              <option value="3">drama</option>
                                            </select>
                                          </div>
                                    </div>

                                    <label>Grade 12 stream Subject 2</label>
                                    <hr>
                                    <span>You can request two choices for stream Subject 2...!</span>

                                      <div class="mb-3 col-md-6">
                                        <div class="input-group mb-3 mt-3">
                                            <label class="input-group-text text-dark bg-secondary" for="inputGroupSelect01">For first choice stream subject 2</label>
                                            <select class="form-select text-dark bg-secondary" id="inputGroupSelect01">
                                              <option selected>Choose...</option>
                                              <option value="1">Art</option>
                                              <option value="2">Dance</option>
                                              <option value="3">Music</option>
                                              <option value="3">drama</option>
                                            </select>
                                          </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <div class="input-group mb-3 mt-3">
                                            <label class="input-group-text text-dark bg-secondary" for="inputGroupSelect01">For second choice stream subject 2</label>
                                            <select class="form-select text-dark bg-secondary" id="inputGroupSelect01">
                                              <option selected>Choose...</option>
                                              <option value="1">Art</option>
                                              <option value="2">Dance</option>
                                              <option value="3">Music</option>
                                              <option value="3">drama</option>
                                            </select>
                                          </div>
                                    </div>
                                    <label for="Namewithinitials" class="form-label ">Grade 12 stream Subject 3</label>
                                    <hr>
                                    <span>You can request two choices for stream Subject 3...!</span>
                                      <div class="mb-3 col-md-6 ">
                                        <div class="input-group mb-3 mt-3">
                                            <label class="input-group-text text-dark bg-secondary" for="inputGroupSelect01">For first choice stream subject 3</label>
                                            <select class="form-select text-dark bg-secondary" id="inputGroupSelect01">
                                              <option selected>Choose...</option>
                                              <option value="1">Art</option>
                                              <option value="2">Dance</option>
                                              <option value="3">Music</option>
                                              <option value="3">drama</option>
                                            </select>
                                          </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <div class="input-group mb-3 mt-3">
                                            <label class="input-group-text text-dark bg-secondary" for="inputGroupSelect01">For second choice stream subject 3</label>
                                            <select class="form-select text-dark bg-secondary" id="inputGroupSelect01">
                                              <option selected>Choose...</option>
                                              <option value="1">Art</option>
                                              <option value="2">Dance</option>
                                              <option value="3">Music</option>
                                              <option value="3">drama</option>
                                            </select>
                                          </div>
                                    </div>


                                    <div class="mt-2">
                                        <button type="button" class="btn btn-primary" id="searchBtn" onclick="grade12Request();">
                                         Request
                                        </button>
                                    </div>
                                    
                                 </div>
                               
                            </div>
                            <!-- /search result end -->
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
        hamburger("subject");
    </script>
   
</body>

</html>