<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.components.head')
    <style>
      .task-active {
        background-color: #38d12a;
      }

      .task-deactive {
        background-color: #e83427;
        cursor: pointer;
      }
    </style>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        @include('public_components.spinner')

        @include('admin.components.sidebar')

        <!-- Content Start -->
        <div class="content">
            @include('admin.components.navbar')

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Student's Tearm test Mark</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <thead class="table-dark">
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Subject</th>  
                                <th scope="col">First Tearm</th>
                                <th scope="col">Second Tearm</th>
                                <th scope="col">Third Tearm</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td>Sinhala</td>
                                <td>80</td>
                                <td>81</td>
                                <td>81</td>
                              </tr>
                              <tr>
                                <th scope="row">2</th>
                                <td>maths</td>
                                <td>80</td>
                                <td>81</td>
                                <td>81</td>
                              </tr>
                              <tr>
                                <th scope="row">3</th>
                                <td>History</td>
                                <td>80</td>
                                <td>81</td>
                                <td>81</td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal fade" tabindex="-1" id="statusChangeModal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title text-dark">Setting a Deadline for Subject Requests</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <p>You can set a deadline for subject requests in the system settings. After the deadline, the subject request feature
                        will be automatically deactivated. This will give you enough time to review and approve or reject student requests
                        before the start of the new school year.</p>

                        <hr/>
                        <label class="form-label text-dark">Set Deadline</label>
                        <input type="date" id="deadline" class="form-control bg-secondary text-dark"/>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn" style="background-color: #3457e3; color: white;" onclick="activate(this);" id="actionButton">Confirm</button>
                    </div>
                  </div>
                </div>
              </div>

            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <h3 class="text-dark">Below are the Bucket & Aesthetic subjects to choose from</h3>

                    @if($aesthetic == 'active')
                    <div class="col-md-4 col-12">
                        <div data-target="aesthetic" class="task-active rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2 text-dark">Grade 6 Students</p>
                                <h6 class="mb-0 text-dark">
                                    Activated
                                </h6>
                            </div>
                        </div>
                    </div>
                    @else 
                    <div class="col-md-4 col-12">
                      <div data-target="aesthetic" onclick="changeStatus(this);" class="task-deactive rounded d-flex align-items-center justify-content-between p-4">
                          <i class="fa fa-chart-line fa-3x text-primary"></i>
                          <div class="ms-3">
                              <p class="mb-2 text-dark">Grade 6 Students</p>
                              <h6 class="mb-0 text-dark">
                                  Deactivated
                              </h6>
                          </div>
                      </div>
                    </div>
                    @endif

                    @if($ol == 'active')
                    <div class="col-md-4 col-12">
                        <div data-target="ol" class="task-active rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2 text-dark">Grade 10 Students (O/L)</p>
                                <h6 class="mb-0 text-dark">
                                    Activated
                                </h6>
                            </div>
                        </div>
                    </div>
                    @else 
                    <div class="col-md-4 col-12">
                      <div data-target="ol" onclick="changeStatus(this);" class="task-deactive rounded d-flex align-items-center justify-content-between p-4">
                          <i class="fa fa-chart-line fa-3x text-primary"></i>
                          <div class="ms-3">
                              <p class="mb-2 text-dark">Grade 10 Students (O/L)</p>
                              <h6 class="mb-0 text-dark">
                                  Deactivated
                              </h6>
                          </div>
                      </div>
                    </div>
                    @endif

                    @if($ol == 'active')
                    <div class="col-md-4 col-12">
                        <div data-target="al" class="task-active rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2 text-dark">Grade 12 Students (A/L)</p>
                                <h6 class="mb-0 text-dark">
                                    Activated
                                </h6>
                            </div>
                        </div>
                    </div>
                    @else 
                    <div class="col-md-4 col-12">
                      <div data-target="al" onclick="changeStatus(this);" class="task-deactive rounded d-flex align-items-center justify-content-between p-4">
                          <i class="fa fa-chart-line fa-3x text-primary"></i>
                          <div class="ms-3">
                              <p class="mb-2 text-dark">Grade 12 Students (A/L)</p>
                              <h6 class="mb-0 text-dark">
                                  Deactivated
                              </h6>
                          </div>
                      </div>
                    </div>
                    @endif
                    
                </div>
            </div>
            <!-- Sale & Revenue End -->
            <hr>

           <h3 class="text-dark ms-4">Bucket & Aesthetic subjects Summary</h3>
            <hr>

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">

                    <div class="col-12">
                        <div class="mb-3 col-md-12 ">
                            <sapn for="Namewithinitials" class="form-label text-dark">Filter In Grade</sapn>
                            <select class="form-select form-control form-select-lg text-dark bg-secondary mb-3" id="selectGradeFilter" aria-label=".form-select-lg example">
                                <option selected>Open this select menu</option>
                                <option value="1">Grade 6</option>
                                <option value="2">Grade 10</option>
                                <option value="3">Grade 12</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Sales Chart Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-2">
                    <div class="col-md-12 col-12 text-center">
                        <div class="bg-secondary rounded h-100 p-4">
                            <div id="NewchartContainer" style="height: 300px; width: 100%;"></div>

                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <!-- Sales Chart End -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="h-100 bg-secondary rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0 text-dark">Considering the requests of students applying for Bucket subjects</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <sapn for="Namewithinitials" class="form-label text-dark">Filter In Subject</sapn>
                                        <select class="form-select form-select-lg text-dark bg-secondary mb-3" id="selectSubject" aria-label=".form-select-lg example">
                                            <option selected>Open this select menu</option>
                                            <option value="1">Art</option>
                                            <option value="2">Music</option>
                                            <option value="3">Dancing</option>
                                            <option value="4">Drama</option>
                                          </select>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <sapn for="Namewithinitials" class="form-label text-dark">Filter In Student Name</sapn>
                                        <input type="text" id="filterName" class="form-control mt-1 text-dark bg-secondary" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                    </div>
                                 </div>
                                <hr>

                                <h4 class="text-dark">Here your result(Grade 6)</h4>
                                <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-dark">
                                      <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Subject_choise-1</th>
                                        <th scope="col">Subject_choise-2</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Art</td>
                                        <td>Drama</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Dancing</td>
                                        <td>Art</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">3</th>
                                        <td>John</td>
                                        <td>Music</td>
                                        <td>Art</td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                                <h4 class="text-dark">Here your result(Grade 10)</h4>
                                <div class="table-responsive">
                                  <table class="table table-bordered">
                                    <thead class="table-dark">
                                      <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col" colspan="2">Bucket 1</th>
                                        <th scope="col" colspan="2">Bucket 2</th>
                                        <th scope="col" colspan="2">Bucket 3</th>
                                        <th scope="col">View Marks</th>
                                      </tr>
                                    </thead>
                                    <thead class="table">
                                        <tr>
                                          <td scope="col">##</td>
                                          <td scope="col">##</td>
                                          <td scope="col">Subject_choise-1</td>
                                          <td scope="col">Subject_choise-2</td>
                                          <td scope="col">Subject_choise-1</td>
                                          <td scope="col">Subject_choise-2</td>
                                          <td scope="col">Subject_choise-1</td>
                                          <td scope="col">Subject_choise-2</td>
                                          <td scope="col">##</td>

                                        </tr>
                                      </thead>
                                    <tbody>
                                      <tr>
                                        <td >1</td>
                                          <td >sachith prasan</td>
                                          <td >Commerce</td>
                                          <td >Civic</td>
                                          <td >Art</td>
                                          <td >Drama</td>
                                          <td >ICT</td>
                                          <td >Teachnology</td>
                                          <td ><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">View</button></td>
                                      </tr>
                                      <tr>
                                        <td >1</td>
                                          <td >Tharindu Nimesh</td>
                                          <td >Commerce</td>
                                          <td >Civic</td>
                                          <td >Art</td>
                                          <td >Drama</td>
                                          <td >ICT</td>
                                          <td >Teachnology</td>
                                          <td ><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">View</button></td>
                                      </tr>
                                      <tr>
                                        <td >1</td>
                                          <td >lisath Methsadu</td>
                                          <td >Commerce</td>
                                          <td >Civic</td>
                                          <td >Art</td>
                                          <td >Drama</td>
                                          <td >ICT</td>
                                          <td >Teachnology</td>
                                          <td ><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">View</button></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                  </div>

                                  <h4 class="text-dark">Here your result(Grade 12)</h4>
                                  <div class="table-responsive">
                                  <table class="table table-bordered">
                                    <thead class="table-dark">
                                      <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col" colspan="2">stream</th>
                                        <th scope="col" colspan="2">Subject 1</th>
                                        <th scope="col" colspan="2">Subject 2</th>
                                        <th scope="col" colspan="2">Subject 3</th>
                                      </tr>
                                    </thead>
                                    <thead class="table">
                                        <tr>
                                          <td scope="col">##</td>
                                          <td scope="col">##</td>
                                          <td scope="col">Stream_choise-1</td>
                                          <td scope="col">Stream_choise-2</td>
                                          <td scope="col">Subject_choise-1</td>
                                          <td scope="col">Subject_choise-2</td>
                                          <td scope="col">Subject_choise-1</td>
                                          <td scope="col">Subject_choise-2</td>
                                          <td scope="col">Subject_choise-1</td>
                                          <td scope="col">Subject_choise-2</td>

                                        </tr>
                                      </thead>
                                    <tbody>
                                      <tr>
                                        <td >1</td>
                                          <td >sachith prasan</td>
                                          <td >Commerce</td>
                                          <td >B.S</td>
                                          <td >Art</td>
                                          <td >Drama</td>
                                          <td >ICT</td>
                                          <td >Teachnology</td>
                                          <td >Teachnology</td>
                                          <td >Teachnology</td>
                                      </tr>
                                      <tr>
                                        <td >1</td>
                                          <td >Tharindu Nimesh</td>
                                          <td >Teachnology</td>
                                          <td >Civic</td>
                                          <td >Art</td>
                                          <td >Drama</td>
                                          <td >ICT</td>
                                          <td >Teachnology</td>
                                          <td >Teachnology</td>
                                          <td >Teachnology</td>
                                      </tr>
                                      <tr>
                                        <td >1</td>
                                          <td >lisath Methsadu</td>
                                          <td >Art</td>
                                          <td >Civic</td>
                                          <td >Art</td>
                                          <td >Drama</td>
                                          <td >ICT</td>
                                          <td >Teachnology</td>
                                          <td >Teachnology</td>
                                          <td >Teachnology</td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Widgets End -->

            @include('public_components.footer')
        </div>
        <!-- Content End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    @include('public_components.js')
    <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>  
    <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
    <script>
        hamburger("studentSubject");

        window.onload = function() {
    
        var options = {
            title: {
                text: "Summary Of Student Bucket Subject Request"
            },
            data: [{
                    type: "pie",
                    startAngle: 45,
                    showInLegend: "true",
                    legendText: "{label}",
                    indexLabel: "{label} ({y})",
                    yValueFormatString:"#,##0.#"%"",
                    dataPoints: [
                        { label: "Art", y: 36 },
                        { label: "Music", y: 31 },
                        { label: "Drama", y: 7 },
                        { label: "Dancing", y: 7 },
                        { label: "Sinhala Lit", y: 6 },
                        { label: "English Lit", y: 10 },
                        { label: "Others", y: 3 }
                    ]
            }]
        };
        $("#NewchartContainer").CanvasJSChart(options);

        let creditElement = document.querySelector('.canvasjs-chart-credit');
        creditElement.remove();
      }

      function changeStatus(Button) {
        const confitmButton = document.getElementById("actionButton");
        confitmButton.dataset.target = Button.dataset.target;
        $('#statusChangeModal').modal('show');
      }

      function activate(Button) {
        const deadline = document.getElementById("deadline");

        if(deadline.value == '') {
          deadline.classList.add('is-invalid');
        } else {
          deadline.classList.remove('is-invalid');
          $('#statusChangeModal').modal('hide');
          var form = new FormData();
          form.append("category", Button.dataset.target);
          form.append("deadline", deadline.value);

          var xhr = new XMLHttpRequest();
          xhr.onreadystatechange = function() {
            if(xhr.readyState == 4 && xhr.status == 200) {
              setTimeout(() => {
                location.reload();
              }, 0.1);
            }
          }

          xhr.open("POST", "{{ route('request.activate') }}");
          xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
          xhr.send(form);
        }
      }

    </script>
</body>

</html>