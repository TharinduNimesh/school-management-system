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

    .space {
      white-space: nowrap;
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

      <div class="modal fade" id="marksModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Term test Mark</h1>
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
                <tbody id="marksBody">

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

              <hr />
              <label class="form-label text-dark">Set Deadline</label>
              <input type="date" id="deadline" class="form-control bg-secondary text-dark" />
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
              <select id="selectedGrade" onchange="changeGrade();" class="form-select form-control form-select-lg text-dark bg-secondary mb-3" aria-label=".form-select-lg example">
                <option selected value="0">Open this select menu</option>
                <option value="6">Grade 6</option>
                <option value="10">Grade 10</option>
                <option value="12">Grade 12</option>
              </select>
            </div>
          </div>
        </div>
      </div>

      <!-- Sales Chart Start -->
      <div class="container-fluid pt-4 px-4" id="subjectGraph">
        <div class="row g-2">
          <div class="col-md-12 col-12 text-center">
            <div class="bg-secondary rounded h-100 p-4">
              <div id="NewchartContainer" style="height: 300px; width: 100%;"></div>
            </div>
          </div>
        </div>
      </div>

      <div class="container-fluid pt-4 px-4 d-none" id="mediumContainer">
        <div class="row g-2">
          <div class="col-md-12 col-12 text-center">
            <div class="bg-secondary rounded h-100 p-4">
              <div id="chartContainer" style="height: 300px; width: 100%;"></div>
            </div>
          </div>
        </div>
      </div>

      <div class="container-fluid pt-4 px-4 d-none" id="bucketChartContainer">
        <div class="row g-2">
          <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
              <div id="bucket_1_chart" style="height: 300px; width: 100%;"></div>
            </div>
          </div>

          <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
              <div id="bucket_2_chart" style="height: 300px; width: 100%;"></div>
            </div>
          </div>

          <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
              <div id="bucket_3_chart" style="height: 300px; width: 100%;"></div>
            </div>
          </div>
        </div>
      </div>

      <div class="container-fluid pt-4 px-4 d-none" id="schemeContainer">
        <div class="row g-2">
          <div class="col-md-12 col-12 text-center">
            <div class="bg-secondary rounded h-100 p-4">
              <div id="schemeChart" style="height: 300px; width: 100%;"></div>
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
                  <div class="mb-3 col-md-12" id="aestheticSubjectList">
                    <sapn for="Namewithinitials" class="form-label text-dark">Filter In Subject</sapn>
                    <select onchange="filterBySubject();" class="form-select form-select-lg text-dark bg-secondary mb-3" id="filteredSubjectList" aria-label=".form-select-lg example">
                      <option selected>Open this select menu</option>
                      
                    </select>
                  </div>
                  <div id="olSubjectList" class="row d-none">
                    <div class="mb-3 col-md-4">
                      <sapn for="Namewithinitials" class="form-label text-dark">Filter In Subject</sapn>
                      <select name="bucketSubjectLists" onchange="filterByMultiSubject(this);" data-cell="2" class="form-select form-select-lg text-dark bg-secondary mb-3" id="bucket_1">
                        <option selected>Open this select menu</option>
                        @foreach ($ol_bucket_1 as $subject)
                          <option>{{ $subject }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="mb-3 col-md-4">
                      <sapn for="Namewithinitials" class="form-label text-dark">Filter In Subject</sapn>
                      <select name="bucketSubjectLists" onchange="filterByMultiSubject(this);" data-cell="3" class="form-select form-select-lg text-dark bg-secondary mb-3" id="bucket_2">
                        <option selected>Open this select menu</option>
                        @foreach ($ol_bucket_2 as $subject)
                          <option>{{ $subject }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="mb-3 col-md-4">
                      <sapn for="Namewithinitials" class="form-label text-dark">Filter In Subject</sapn>
                      <select name="bucketSubjectLists" onchange="filterByMultiSubject(this);" data-cell="4" class="form-select form-select-lg text-dark bg-secondary mb-3" id="bucket_3">
                        <option selected>Open this select menu</option>
                        @foreach ($ol_bucket_3 as $subject)
                          <option>{{ $subject }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="mb-3 col-md-12">
                    <sapn for="Namewithinitials" class="form-label text-dark">Filter In Student Name</sapn>
                    <input type="text" onkeyup="filterByName();" id="filteringName" class="form-control mt-1 text-dark bg-secondary" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                  </div>
                </div>
                <hr>

                <div class="d-none" id="gradeSixContainer">
                  <h4 class="text-dark">Here your result - Aesthetics</h4>
                  <div class="table-responsive">
                    <table class="table table-bordered" id="aestheticsTable">
                      <thead class="table-dark">
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Name</th>
                          <th scope="col">Subject</th>
                          <th scope="col">Medium</th>
                          <th scope="col" colspan="2">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                        $art = array();
                        $westernMusic = array();
                        $eastenMusic = array();
                        $dancing = array();
                        $drama = array();

                        $sinhala = array();
                        $english = array();
                        $tamil = array();
                        @endphp

                        @foreach ($aestheticRequests as $key => $request)
                        <tr id="aesthetics{{ $request['_id'] }}">
                          <th scope="row">{{ $key + 1 }}</th>
                          <td class="space">{{ $request["name"] }}</td>
                          <td class="space">{{ $request["subject"] }}</td>
                          <td>{{ $request["medium"] }}</td>
                          <td>
                            <button data-subject="{{ $request['subject'] }}" data-category="aesthetics" data-medium="{{ $request['medium'] }}" onclick="action(this);" data-status="accept" data-index="{{ $request['index_number']  }}" data-id="{{ $request['_id'] }}" class="btn btn-success">Accept</button>
                          </td>
                          <td>
                            <button data-subject="{{ $request['subject'] }}" data-category="aesthetics" data-medium="{{ $request['medium'] }}" onclick="action(this);" data-status="reject" data-index="{{ $request['index_number']  }}" data-id="{{ $request['_id'] }}" class="btn btn-danger">Reject</button>
                          </td>
                        </tr>

                        @if ($request["subject"] == "Art")
                        @php
                        array_push($art, $key);
                        @endphp
                        @elseif ($request["subject"] == "Western Music")
                        @php
                        array_push($westernMusic, $key);
                        @endphp
                        @elseif ($request["subject"] == "Easten Music")
                        @php
                        array_push($eastenMusic, $key);
                        @endphp
                        @elseif ($request["subject"] == "Drama")
                        @php
                        array_push($drama, $key);
                        @endphp
                        @elseif ($request["subject"] == "Dancing")
                        @php
                        array_push($dancing, $key);
                        @endphp
                        @endif

                        @if ($request["medium"] == "Sinhala")
                        @php
                        array_push($sinhala, $key);
                        @endphp
                        @elseif ($request["medium"] == "English")
                        @php
                        array_push($english, $key);
                        @endphp
                        @elseif ($request["medium"] == "Tamil")
                        @php
                        array_push($tamil, $key);
                        @endphp
                        @endif

                        @endforeach

                        @php
                        $artCount = count($art);
                        $westernMusicCount = count($westernMusic);
                        $eastenMusicCount = count($eastenMusic);
                        $dramaCount = count($drama);
                        $dancingCount = count($dancing);

                        $sinhalaCount = count($sinhala);
                        $englishCount = count($english);
                        $tamilCount = count($tamil);
                        @endphp
                      </tbody>
                    </table>
                  </div>
                </div>

                <div class="d-none" id="gradeTenContainer"> 
                  <h4 class="text-dark">Here your result(Grade 10)</h4>
                  <div class="table-responsive">
                    <table class="table table-bordered" id="olTable">
                      <thead class="table-dark">
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Name</th>
                          <th scope="col">Bucket 1</th>
                          <th scope="col">Bucket 2</th>
                          <th scope="col">Bucket 3</th>
                          <th scope="col">Medium</th>
                          <th scope="col">Marks</th>
                          <th colspan="2">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                          $subjects = array();
                          foreach($ol_bucket_1 as $subject) {
                            $subjects[$subject] = 0;
                          }
                          foreach($ol_bucket_2 as $subject) {
                            $subjects[$subject] = 0;
                          }
                          foreach($ol_bucket_3 as $subject) {
                            $subjects[$subject] = 0;
                          }

                          $OLSinhala = 0;
                          $OLEnglish = 0;
                          $OLTamil = 0;
                        @endphp
                        @foreach ($olRequests as $key => $request)
                        <tr id="olRow{{ $request['_id'] }}">
                          <td>{{ $key + 1 }}</td>
                          <td class="space">{{ $request["name"] }}</td>
                          @foreach($request["subjects"] as $subject)
                          <td class="space">{{ $subject }}</td>
                          @php
                            $subjects[$subject] ++;
                          @endphp
                          @endforeach
                          <td>{{ $request["medium"] }}</td>
                          @php
                            $medium = $request["medium"];
                            ${'OL' . $medium} ++;
                          @endphp
                          <td><button onclick="getMarks(this);" class="btn btn-primary" data-index="{{ $request['index_number'] }}">View</button></td>
                          <td>
                            <button data-subject_1="{{ $request['subjects']['subject_1'] }}"
                                    data-subject_2="{{ $request['subjects']['subject_2'] }}"
                                    data-subject_3="{{ $request['subjects']['subject_3'] }}"
                                    data-medium="{{ $request['medium'] }}"
                                    data-index="{{ $request['index_number'] }}"
                                    data-id="{{ $request['_id'] }}"
                                    data-type="accept"
                                    onclick="actionOlSubject(this);"
                                    class="btn btn-success">Accept</button>
                          </td>
                          <td>
                            <button   data-subject_1="{{ $request['subjects']['subject_1'] }}"
                                      data-subject_2="{{ $request['subjects']['subject_2'] }}"
                                      data-subject_3="{{ $request['subjects']['subject_3'] }}"
                                      data-medium="{{ $request['medium'] }}"
                                      data-index="{{ $request['index_number'] }}"
                                      data-id="{{ $request['_id'] }}"
                                      data-type="reject"
                                      onclick="actionOlSubject(this);"
                                      class="btn btn-danger">Reject</button>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>

                <div class="d-none" id="gradeTwelveContainer">
                  <h4 class="text-dark">Here your result(Grade 12)</h4>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead class="table-dark">
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Name</th>
                          <th scope="col">stream</th>
                          <th scope="col" class="space">Subject 1</th>
                          <th scope="col" class="space">Subject 2</th>
                          <th scope="col" class="space">Subject 3</th>
                          <th scope="col" class="space">Medium</th>
                          <th colspan="2">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                          $ALSchemes = [
                            "Maths" => 0,
                            "Bio" => 0,
                            "Commerce" => 0,
                            "Technology" => 0,
                            "Art" => 0,
                            "NVQ" => 0
                          ];

                          $ALSinhala = 0;
                          $ALEnglish = 0;
                          $ALTamil = 0;
                        @endphp
                        @foreach ($alRequests as $key => $request)
                        <tr id="alRow{{ $request['_id'] }}">
                          <td scope="col">{{ $key + 1 }}</td>
                          <td scope="col" class="space">{{ $request['name'] }}</td>
                          <td scope="col">{{ $request['scheme'] }}</td>
                          @php
                          $ALSchemes[$request['scheme']] ++
                          @endphp
                          @foreach ($request["subjects"] as $subject)
                            <td scope="col" class="space">{{ $subject }}</td>
                          @endforeach
                          <td scope="col" class="space">{{ $request['medium'] }}</td>
                          <td>
                            <button class="btn btn-success px-2">Approve</button>
                          </td>
                          <td>
                            <button class="btn btn-danger px-2" data-id="{{ $request['_id'] }}" onclick="rejectAlRequest();">Reject</button>
                          </td>
                        </tr>
                        @php
                          $medium = $request["medium"];
                          ${'AL' . $medium} ++;
                        @endphp
                        @endforeach
                      </tbody>
                    </table>
                  </div>
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
          yValueFormatString: "#,##0.#" % "",
          dataPoints: [{
            label: "Nothing Selected",
            y: 1
          }, ]
        }]
      };
      $("#NewchartContainer").CanvasJSChart(options);

      var options = {
        title: {
          text: "Medium Summary"
        },
        data: [{
          type: "pie",
          startAngle: 45,
          showInLegend: "true",
          legendText: "{label}",
          indexLabel: "{label} ({y})",
          yValueFormatString: "#,##0.#" % "",
          dataPoints: [{
              label: "Sinhala",
              y: 1
            },
            {
              label: "English",
              y: 2
            },
            {
              label: "Tamil",
              y: 3
            }
          ]
        }]
      };
      $("#chartContainer").CanvasJSChart(options);

      let creditElements = document.querySelectorAll('.canvasjs-chart-credit');
      creditElements.forEach(element => {
        element.remove();
      });
    }

    function changeStatus(Button) {
      const confitmButton = document.getElementById("actionButton");
      confitmButton.dataset.target = Button.dataset.target;
      $('#statusChangeModal').modal('show');
    }

    function activate(Button) {
      const deadline = document.getElementById("deadline");

      if (deadline.value == '') {
        deadline.classList.add('is-invalid');
      } else {
        deadline.classList.remove('is-invalid');
        $('#statusChangeModal').modal('hide');
        var form = new FormData();
        form.append("category", Button.dataset.target);
        form.append("deadline", deadline.value);

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
          if (xhr.readyState == 4 && xhr.status == 200) {
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

    function changeGrade() {
      const grade = document.getElementById("selectedGrade");
      const six = document.getElementById("gradeSixContainer");
      const ten = document.getElementById("gradeTenContainer");
      const twelve = document.getElementById("gradeTwelveContainer");
      const subjectList = document.getElementById("filteredSubjectList");
      const mediumContainer = document.getElementById("mediumContainer");
      const subjectGraph = document.getElementById("subjectGraph");
      const olList = document.getElementById("olSubjectList");
      const aestheticsList = document.getElementById("aestheticSubjectList");
      const bucketChartContainer = document.getElementById("bucketChartContainer");
      const schemeContainer = document.getElementById("schemeContainer");

      schemeContainer.classList.add("d-none");
      subjectGraph.classList.add("d-none");
      mediumContainer.classList.add("d-none");
      olList.classList.add("d-none");
      bucketChartContainer.classList.add("d-none");
      aestheticsList.classList.add("d-none");
      subjectList.innerHTML = "";

      six.classList.add("d-none");
      ten.classList.add("d-none");
      twelve.classList.add("d-none");

      var options = {};

      if (grade.value == "0") {
        subjectList.innerHTML = "";
        options = {
          title: {
            text: "Summary Of Student Bucket Subject Request"
          },
          data: [{
            type: "pie",
            startAngle: 45,
            showInLegend: "true",
            legendText: "{label}",
            indexLabel: "{label} ({y})",
            yValueFormatString: "#,##0.#" % "",
            dataPoints: [{
              label: "Nothing Selected",
              y: 1
            }, ]
          }]
        };
      } else if (grade.value == "6") {
        subjectGraph.classList.remove("d-none");
        var subjects = [
          "Open This Select Menu",
          "Art",
          "Dancing",
          "Western Music",
          "Easten Music",
          "Drama"
        ];
        subjects.forEach(subject => {
          const option = document.createElement("option");
          option.innerHTML = subject;
          if (subject == "Open This Select Menu") {
            option.value = "0";
          }

          subjectList.appendChild(option);
        });
        subjectList.dataset.table = "aestheticsTable";
        aestheticsList.classList.remove("d-none");
        six.classList.remove("d-none");
        if ("{{ $artCount }}" == 0 && "{{ $westernMusicCount }}" == 0 && "{{ $eastenMusicCount }}" == 0 && "{{ $dancingCount }}" == 0 && "{{ $dramaCount }}" == 0) {
          mediumContainer.classList.add("d-none");
          subjectGraph.classList.add("d-none");
        } else {
          options = {
            title: {
              text: "Summary Of Grade 6 Student Aesthetics Subject Request"
            },
            data: [{
              type: "pie",
              startAngle: 45,
              showInLegend: "true",
              legendText: "{label}",
              indexLabel: "{label} ({y})",
              yValueFormatString: "#,##0.#" % "",
              dataPoints: [{
                  label: "Art",
                  y: "{{ $artCount }}"
                },
                {
                  label: "Western Music",
                  y: "{{ $westernMusicCount }}"
                },
                {
                  label: "Easten Music",
                  y: "{{ $eastenMusicCount }}"
                },
                {
                  label: "Drama",
                  y: "{{ $dramaCount }}"
                },
                {
                  label: "Dancing",
                  y: "{{ $dancingCount }}"
                },
              ]
            }]
          };

          var mediumOptions = {
            title: {
              text: "Medium Summary"
            },
            data: [{
              type: "pie",
              startAngle: 45,
              showInLegend: "true",
              legendText: "{label}",
              indexLabel: "{label} ({y})",
              yValueFormatString: "#,##0.#" % "",
              dataPoints: [{
                  label: "Sinhala",
                  y: "{{ $sinhalaCount }}",
                },
                {
                  label: "English",
                  y: "{{ $englishCount }}"
                },
                {
                  label: "Tamil",
                  y: "{{ $tamilCount }}"
                }
              ]
            }]
          };
          $("#chartContainer").CanvasJSChart(mediumOptions);

          mediumContainer.classList.remove("d-none");
        }
      } else if (grade.value == "10") {
        ten.classList.remove("d-none");
        olList.classList.remove("d-none");
        bucketChartContainer.classList.remove("d-none");
        mediumContainer.classList.remove("d-none");

        const subjectLists = document.getElementsByName("bucketSubjectLists");
        subjectLists.forEach(list => {
          list.dataset.table = "olTable";
        });
        
        const subjects = @json($subjects);
        
        const bucket_1 = @json($ol_bucket_1);
        const bucket_2 = @json($ol_bucket_2);
        const bucket_3 = @json($ol_bucket_3);

        var bucketOneCanBeDisplay = false;
        var bucketTwoCanBeDisplay = false;
        var bucketThreeCanBeDisplay = false;
        var mediumCanBeDisplay = false;
        
        const bucket_1_array = [];
        bucket_1.forEach(subject => {
          const obj = {
            "label": subject,
            "y": subjects[subject]
          };
          bucket_1_array.push(obj);
          if(subjects[subject] != 0) {
            bucketOneCanBeDisplay = true;
          }
        });

        var options = {
        title: {
          text: "Medium Summary"
        },
        data: [{
          type: "pie",
          startAngle: 45,
          showInLegend: "true",
          legendText: "{label}",
          indexLabel: "{label} ({y})",
          yValueFormatString: "#,##0.#" % "",
          dataPoints: [{
              label: "Sinhala",
              y: "{{ $OLSinhala }}"
            },
            {
              label: "English",
              y: "{{ $OLTamil }}"
            },
            {
              label: "Tamil",
              y: "{{ $OLTamil }}"
            }
          ]
        }]
      };
      $("#chartContainer").CanvasJSChart(options);

      if("{{ $OLSinhala }}" != 0 || "{{ $OLEnglish }}" != 0 || "{{ $OLTamil }}" != 0) {
        mediumCanBeDisplay = true;
      }

        var bucket_1_options = {
            title: {
              text: "Bucket 1 Subjects"
            },
            data: [{
              type: "pie",
              startAngle: 45,
              showInLegend: "true",
              legendText: "{label}",
              indexLabel: "{label} ({y})",
              yValueFormatString: "#,##0.#" % "",
              dataPoints: bucket_1_array
            }]
          };
          $("#bucket_1_chart").CanvasJSChart(bucket_1_options);

        const bucket_2_array = [];
        bucket_2.forEach(subject => {
          const obj = {
            "label": subject,
            "y": subjects[subject]
          };
          bucket_2_array.push(obj);
          if(subjects[subject] != 0) {
            bucketTwoCanBeDisplay = true;
          }
        });

        var bucket_2_options = {
            title: {
              text: "Bucket 2 Subjects"
            },
            data: [{
              type: "pie",
              startAngle: 45,
              showInLegend: "true",
              legendText: "{label}",
              indexLabel: "{label} ({y})",
              yValueFormatString: "#,##0.#" % "",
              dataPoints: bucket_2_array
            }]
          };
          $("#bucket_2_chart").CanvasJSChart(bucket_2_options);

        const bucket_3_array = [];
        bucket_3.forEach(subject => {
          const obj = {
            "label": subject,
            "y": subjects[subject]
          };
          bucket_3_array.push(obj);
          if(subjects[subject] != 0) {
            bucketThreeCanBeDisplay = true;
          }
        });

        var bucket_3_options = {
            title: {
              text: "Bucket 3 Subjects"
            },
            data: [{
              type: "pie",
              startAngle: 45,
              showInLegend: "true",
              legendText: "{label}",
              indexLabel: "{label} ({y})",
              yValueFormatString: "#,##0.#" % "",
              dataPoints: bucket_3_array
            }]
          };
          $("#bucket_3_chart").CanvasJSChart(bucket_3_options);
          if(!bucketOneCanBeDisplay && !bucketTwoCanBeDisplay && !bucketThreeCanBeDisplay) {
            bucketChartContainer.classList.add("d-none");
          }
          if(!mediumCanBeDisplay) {
            mediumContainer.classList.add("d-none");
          }
      } else if (grade.value == "12") {
        twelve.classList.remove("d-none");
        mediumContainer.classList.remove("d-none");
        schemeContainer.classList.remove("d-none");
        
        if("{{ $ALSinhala }}" != 0 || "{{ $ALEnglish }}" != 0 || "{{ $ALTamil }}" != 0) {
          mediumCanBeDisplay = true;
        }

        var options = {
        title: {
          text: "Medium Summary"
        },
        data: [{
          type: "pie",
          startAngle: 45,
          showInLegend: "true",
          legendText: "{label}",
          indexLabel: "{label} ({y})",
          yValueFormatString: "#,##0.#" % "",
          dataPoints: [{
              label: "Sinhala",
              y: "{{ $ALSinhala }}"
            },
            {
              label: "English",
              y: "{{ $ALEnglish }}"
            },
            {
              label: "Tamil",
              y: "{{ $ALTamil }}"
            }
          ]
        }]
      };

      $("#chartContainer").CanvasJSChart(options);

      var schemeOptions = {
        title: {
          text: "Scheme Summary"
        },
        data: [{
          type: "pie",
          startAngle: 45,
          showInLegend: "true",
          legendText: "{label}",
          indexLabel: "{label} ({y})",
          yValueFormatString: "#,##0.#" % "",
          dataPoints: [{
              label: "Art",
              y: "{{ $ALSchemes['Art'] }}"
            },
            {
              label: "Bio Science",
              y: "{{ $ALSchemes['Bio'] }}"
            },
            {
              label: "Maths",
              y: "{{ $ALSchemes['Maths'] }}"
            },
            {
              label: "Technology",
              y: "{{ $ALSchemes['Technology'] }}"
            },
            {
              label: "Commerce",
              y: "{{ $ALSchemes['Commerce'] }}"
            },
            {
              label: "NVQ",
              y: "{{ $ALSchemes['NVQ'] }}"
            }
          ]
        }]
      };

      $("#schemeChart").CanvasJSChart(schemeOptions);

      if(!mediumCanBeDisplay) {
        mediumContainer.classList.add("d-none");
        schemeContainer.classList.add("d-none");
      }

      }

      try {
        $("#NewchartContainer").CanvasJSChart(options);
        let creditElement = document.querySelector('.canvasjs-chart-credit');
        creditElement.remove();
      } catch {
        return 0;
      }
    }

    function filterBySubject() {
      // Get the input element that contains the filter string
      var input = document.getElementById("filteredSubjectList");

      // Get the table element by its ID
      var table = document.getElementById(input.dataset.table);

      // Loop over each row in the table
      for (var i = 1; i < table.rows.length; i++) {
        var row = table.rows[i];

        // Get the name from the first cell of the row
        var name = row.cells[2].innerText;

        // Check if the name matches the filter string
        if (name.toLowerCase().indexOf(input.value.toLowerCase()) > -1) {
          // If the name matches, show the row
          row.style.display = "";
        } else {
          // If the name doesn't match, hide the row
          row.style.display = "none";
        }
      }
    }

    function filterByMultiSubject(input) {

      // Get the table element by its ID
      var table = document.getElementById(input.dataset.table);

      // Loop over each row in the table
      for (var i = 1; i < table.rows.length; i++) {
        var row = table.rows[i];

        // Get the name from the first cell of the row
        var name = row.cells[input.dataset.cell].innerText;

        // Check if the name matches the filter string
        if (name.toLowerCase().indexOf(input.value.toLowerCase()) > -1) {
          // If the name matches, show the row
          row.style.display = "";
        } else {
          // If the name doesn't match, hide the row
          row.style.display = "none";
        }
      }
    }

    function filterByName() {
      // Get the input element that contains the filter string
      var input = document.getElementById("filteringName");

      // Get the table element by its ID
      var table = document.getElementById(document.getElementById("filteredSubjectList").dataset.target);

      // Loop over each row in the table
      for (var i = 1; i < table.rows.length; i++) {
        var row = table.rows[i];

        // Get the name from the first cell of the row
        var name = row.cells[1].innerText;

        // Check if the name matches the filter string
        if (name.toLowerCase().indexOf(input.value.toLowerCase()) > -1) {
          // If the name matches, show the row
          row.style.display = "";
        } else {
          // If the name doesn't match, hide the row
          row.style.display = "none";
        }
      }
    }

    function action(Button) {
      const spinner = document.getElementById("spinner");
      spinner.classList.add("show");
      var data = Button.dataset
      var form = new FormData();
      form.append("id", data.id);
      form.append("index", data.index);
      form.append("status", data.status);
      form.append("category", data.category);
      form.append("subject", data.subject);
      form.append("medium", data.medium);

      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
          if (xhr.responseText == "Success") {
            document.getElementById(data.category + data.id).remove();
          }
          spinner.classList.remove("show");
        }
      }

      xhr.open("POST", "{{ route('student.subject.action.aesthetics') }}");
      xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
      xhr.send(form);
    }

    function getMarks(Button) {
      var form = new FormData();
      form.append("index", Button.dataset.index);
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
          var response = JSON.parse(xhr.responseText);
          const body = document.getElementById("marksBody");
          body.innerHTML = "";
          const terms = [0, 1, 2];  // 0 = first term, 1 = 2nd term, 2 = last term
          var number = 1;
          response.subjects.forEach(subject => {
            const newRow = document.createElement("tr");

            const numCol = document.createElement("th");
            numCol.innerHTML = number;
            newRow.appendChild(numCol);

            const subjectRow = document.createElement("td");
            subjectRow.innerHTML = subject;
            newRow.appendChild(subjectRow);

            terms.forEach(term => {
              var isAdded = false;
              response.marks[term].forEach(details => {
                if(details.subject == subject) {
                  const newCell = document.createElement("td");
                  newCell.innerHTML = details.marks;
                  if(details.marks < 40) {
                    newCell.style.color = "red";
                    newCell.style.fontWeight = "bold";
                    newCell.style.backgroundColor = "#f7992d";
                  }
                  newRow.appendChild(newCell);
                  isAdded = true;
                }
              });
              if(!isAdded) {
                const newCell = document.createElement("td");
                newCell.innerHTML = "ab";
                newCell.style.color = "red";
                newCell.style.fontWeight = "bold";
                newCell.style.backgroundColor = "#f7992d";
                newRow.appendChild(newCell);
              }
            });

            body.appendChild(newRow);
            number ++;
          });

          $("#marksModal").modal("show");
        }
      }

      xhr.open("POST", "{{ route('get.marks.for.subject') }}");
      xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
      xhr.send(form);
    }

    function actionOlSubject(Button) {
      const data = Button.dataset;

      var form = new FormData();
      form.append("index", data.index);
      form.append("id", data.id);
      form.append("type", data.type);
      form.append("subject_1", data.subject_1);
      form.append("subject_2", data.subject_2);
      form.append("subject_3", data.subject_3);
      form.append("medium", data.medium);

      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
          var response = JSON.parse(xhr.responseText);
          if(response.status == "Success") {
            response.ids.forEach(id => {
              document.getElementById("olRow" + id).remove();
            });
          } else if(response.status == "Failed") {
            Swal.fire(
              'Something Went Wrong!',
              'Contact Developers To Fix This',
              'warning'
            )
          }
        }
      }

      xhr.open("POST", "{{ route('student.subject.action.ol') }}");
      xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
      xhr.send(form);
    }

    function rejectAlRequest() {
      var id = event.target.dataset.id;
      var xhr = new XMLHttpRequest();
      xhr.open("GET", "{{ route('reject.al.request', ':id') }}".replace(':id', id));
      xhr.onload = function() {
        if(xhr.status == 200) {
          document.getElementById("alRow" + id).remove();
        }
      }
      xhr.send();
    }
  </script>
</body>

</html>