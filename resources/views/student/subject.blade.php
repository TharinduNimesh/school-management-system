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
            <div class="container-fluid pt-4 px-4" style="min-height: 80vh;">
                <h4 class="fw-bold py-3 mb-4"><span class="text-dark fw-light">Request For The Bucket Subjects</span></h4>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"></div>

                @if($aesthetic == null && $ol == null && $al == null)
                <div class="alert alert-warning">
                  <h5 class="alert-heading">Subject Request Feature Not Active</h5>
                  The subject request feature is not available for your grade level. Please contact the school administration for further information.
                </div>
                @else
                <div class="alert alert-danger d-none" role="alert">
                    <h4 class="alert-heading">Dear Students,</h4>
                    <p>You have not completed your course registration for the upcoming semester. Please complete your registration as soon as possible to avoid any delays in your academic progress. If you have any questions or concerns regarding the registration process, please contact the student services office for assistance.</p>
                    <hr>
                    <p class="mb-0">Thank you for your attention, and we wish you all the best for the upcoming semester.</p>
                </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        
                      @if($aesthetic != null)
                        <div class="card mb-4">
                            <h5 class="card-header text-dark">Grade 6 Selection of Bucket Subject</h5>
                            <!-- Account search start-->
                            <hr class="my-0" />
                            <div class="card-body">
                                <div class="row">
                                    <span> You can choose one aesthetic subject and apply..!</span>
                                    <div class="mb-3 col-md-6">
                                        <div class="input-group mb-3 mt-3">
                                            <label class="input-group-text text-dark bg-secondary" for="inputGroupSelect01">Choose Your Selection</label>
                                            <select class="form-select text-dark bg-secondary" id="inputGroupSelect01">
                                              <option selected>Choose...</option>
                                              <option value="1">Art</option>
                                              <option value="2">Dance</option>
                                              <option value="3">Music</option>
                                              <option value="3">Drama</option>
                                            </select>
                                          </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <div class="input-group mb-3 mt-3">
                                            <label class="input-group-text text-dark bg-secondary" for="inputGroupSelect01">Select a medium</label>
                                            <select class="form-select text-dark bg-secondary" id="inputGroupSelect01">
                                              <option selected>Choose...</option>
                                              <option>Sinhala</option>
                                              <option>English</option>
                                              <option>Tamil</option>
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
                        @endif

                        @if($ol != null)
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
                                              <option>Business & Accounting Studies</option>
                                              <option>Geography</option>
                                              <option>Civics</option>
                                              <option>Japan</option>
                                              <option>Tamil</option>
                                              <option>Hindi</option>
                                              <option>Korean</option>
                                            </select>
                                          </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <div class="input-group mb-3 mt-3">
                                            <label class="input-group-text text-dark bg-secondary" for="inputGroupSelect01">For second choice bucket subject 1</label>
                                            <select class="form-select text-dark bg-secondary" id="inputGroupSelect01">
                                              <option selected>Choose...</option>
                                              <option>Business & Accounting Studies</option>
                                              <option>Geography</option>
                                              <option>Civics</option>
                                              <option>Japan</option>
                                              <option>Tamil</option>
                                              <option>Hindi</option>
                                              <option>Korean</option>
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
                                              <option>Art</option>
                                              <option>Dance</option>
                                              <option>Music</option>
                                              <option>Drama</option>
                                              <option>Sinhala Literature</option>
                                              <option>English Literature</option>
                                            </select>
                                          </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <div class="input-group mb-3 mt-3">
                                            <label class="input-group-text text-dark bg-secondary" for="inputGroupSelect01">For second choice bucket subject 2</label>
                                            <select class="form-select text-dark bg-secondary" id="inputGroupSelect01">
                                              <option>Art</option>
                                              <option>Dance</option>
                                              <option>Music</option>
                                              <option>Drama</option>
                                              <option>Sinhala Literature</option>
                                              <option>English Literature</option>
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
                                              <option>ICT</option>
                                              <option>Health</option>
                                              <option>Home Science</option>
                                              <option>Agriculture</option>
                                              <option>Technology</option>
                                            </select>
                                          </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <div class="input-group mb-3 mt-3">
                                            <label class="input-group-text text-dark bg-secondary" for="inputGroupSelect01">For second choice bucket subject 3</label>
                                            <select class="form-select text-dark bg-secondary" id="inputGroupSelect01">
                                              <option selected>Choose...</option>
                                              <option>ICT</option>
                                              <option>Health</option>
                                              <option>Home Science</option>
                                              <option>Agriculture</option>
                                              <option>Technology</option>
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
                        @endif

                        @if($al != null)
                        <div class="card mb-4" id="alContainer">
                            <h5 class="card-header text-dark">Grade 12 Selection of stream Subjects</h5>
                            <!-- search result start-->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-12 mt-3">
                                        <span>Choose a subject scheme</span>
                                        <select onchange="changeScheme();" id="scheme" class="form-select mt-3 text-dark bg-secondary" aria-label="Default select example">
                                            <option selected value="0">Open this select menu</option>
                                            <option>Maths</option>
                                            <option>Bio</option>
                                            <option>Commerce</option>
                                            <option>Technology</option>
                                            <option>Art</option>
                                            <option>NVQ</option>
                                          </select>
                                        </div>
                                    
                                    <lable class="mt-3">Grade 12 stream Subject 1</lable>
                                    <hr>
                                    
                                    <span>You can request two choices for stream Subject 1...!</span>
                                
                                    <div class="mb-3 col-md-6">
                                        <div class="input-group mb-3 mt-3">
                                            <label class="input-group-text text-dark bg-secondary" for="inputGroupSelect01">For first choice stream subject 1</label>
                                            <select class="form-select text-dark bg-secondary" id="inputGroupSelect01">
                                              <option selected value="0">Choose...</option>
                                              <div id="sub">
                                                <option>one</option>
                                                <option>one</option>
                                                <option>one</option>
                                              </div>
                                            </select>
                                          </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <div class="input-group mb-3 mt-3">
                                            <label class="input-group-text text-dark bg-secondary" for="inputGroupSelect01">For second choice stream subject 1</label>
                                            <select class="form-select text-dark bg-secondary" id="inputGroupSelect01">
                                              <option selected value="0">Choose...</option>
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
                                              <option selected value="0">Choose...</option>
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
                                              <option selected value="0">Choose...</option>
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
                                              <option selected value="0">Choose...</option>
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
                                              <option selected value="0">Choose...</option>
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
                        @endif

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

        function changeScheme() {
          const scheme = document.getElementById("scheme");
          if(scheme.value == '0') {
            const container = document.getElementById("alContainer");
            var selectors = container.querySelectorAll("select");
            selectors.forEach(select => {
              var options = select.querySelectorAll('option');
              options.forEach(option => {
                if(option.value != 0) {
                  option.remove();
                }
              });
            });
          } else {
            if(scheme.value == "Maths") {

            } else if(scheme.value == "Bio") {
              
            } else if(scheme.value == "Commerce") {
              const bucket_1 = ["Accounting", "Bussiness Studies", "Economics"]; 
              const bucket_2 = ["Accounting", "Bussiness Studies", "Economics"]; 
              const bucket_3 = ["Economics", "Business statistics", "Political science", "History", "Logic and Scientific Method", "English", "Germen", "French", "Agriculture", "Combined Maths", "ICT"];

            } else if(scheme.value == "Technology") {

            } else if(scheme.value == "Art") {

            } else if(scheme.value == "NVQ") {

            } 
          }
        }
    </script>
   
</body>

</html>