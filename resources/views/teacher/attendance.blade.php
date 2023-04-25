<!DOCTYPE html>
<html lang="en">

<head>
    @include('teacher.components.head')
    <style>
        .present {
            background-color: #008000;
            color: white;
            cursor: pointer;
        }

        .absent {
            background-color: #FF0000;
            color: white;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">

        @include('public_components.spinner')

        @include('teacher.components.hamburger')

        <!-- Content Start -->
        <div class="content">
            @include('teacher.components.navbar')

            <div class="container-fluid pt-4 px-4">
                <div class="row">
                    <div class="col-12 bg-secondary rounded p-4">
                        <h3 class="text-dark" id="attendanceHeading">Mark Attendance</h3>
                        <div class="row mt-2">
                            <div class="col-12">
                                <input type="date" class="form-control bg-secondary text-dark" id="attendanceDate" />
                            </div>
                            @foreach ($students as $student)
                                <div class="row mt-4">
                                    <div class="col-md-8 col-10">
                                       <p class="px-4">{{ $student->initial_name }}</p>
                                    </div>
                                    <div class="col-1 col-md-2">
                                        <input  class="px-4"
                                                type="checkbox"
                                                value="{{ $student->index_number }}">
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                            <div class="col-12 mt-3">
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Submit</button>
                            </div>
                        </div>

                        <div class="row mt-5" id="marginTopHider">
                            <h3 class="text-dark">Search/Update Attendance</h3>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <input type="date" class="form-control bg-secondary text-dark"
                                        placeholder="Recipient's username" aria-label="Recipient's username"
                                        id="searchedDate" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-primary" type="button" id="button-addon2"
                                        onclick="searchAttendance();">Search</button>
                                </div>

                                <div class="form-floating mb-1 mt-5">
                                    <input type="text" class="form-control text-dark bg-secondary" id="studentName"
                                        placeholder="name@example.com" onkeyup="filterStudents();">
                                    <label for="floatingInput">Filter By Student Name</label>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="studentTable">
                                    <thead class="table-dark">
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                    </thead>

                                    <tbody id="tableBody">
                                        <tr>
                                            <td id="tableDefault" colspan="3"
                                                style="color: red; background: orange; font-weight: bold;">
                                                Search A Date To View Details</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <x-modal message="Are you sure to submit attendance ?"
                     id="exampleModal"
                     title="warning"
                     isCentered="true"
                     onConfirm="saveAttendance();"/>

            @include('public_components.footer')
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

        @include('public_components.js')
    <script>
        hamburger('attendance');

        function gatherAttendanceData() {
  const spinner = document.getElementById("spinner");
  spinner.classList.remove("d-none");
  // Select all of the checkboxes on the page
  var checkboxes = document.querySelectorAll('input[type="checkbox"]');

  // Create an array to store the attendance data
  var attendanceData = [];
  var absentData = [];

  var allData = {};

  // Loop through all of the checkboxes
  for (var i = 0; i < checkboxes.length; i++) {
    // Get the current checkbox and its student ID
    var checkbox = checkboxes[i];
    var studentId = checkbox.value;

    // Check if the checkbox is checked
    if (checkbox.checked) {
      // If the checkbox is checked, add the student ID to the attendance data array
      attendanceData.push(studentId);
    } else {
      absentData.push(studentId);
    }
  }

  var date = document.getElementById("attendanceDate");
  if (date.value == "") {
    date.classList.add("is-invalid");
  } else {
    date.classList.remove("is-invalid");

    // Return the attendance data array
    allData.present = attendanceData;
    allData.absent = absentData;
    spinner.classList.add("d-none");
    return allData;
  }

  return null;
}

function saveAttendance() {
  // Get the attendance data
  var attendanceData = gatherAttendanceData();
  if (attendanceData != null) {
    var form = new FormData();
    form.append("data", JSON.stringify(attendanceData));

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        // handle response
        var response = JSON.parse(xhr.responseText);
        if (response.status == "already") {
          Swal.fire(
            "ERROR",
            "You have already marked attendance for that day",
            "error"
          );
        } else if (response.status == "sucess") {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Attendance Marked Successfully",
            showConfirmButton: false,
            timer: 1500,
          });
        }
        console.log(response);
      }
    };

    xhr.open("POST", "{{ route('mark.attendance') }}", true);
    xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
    xhr.send(form);
  } else {
    Swal.fire("ERROR", "Please Select A Date", "error");
  }
}

        function searchAttendance() {
            const date = document.getElementById("searchedDate");

            if (date.value == '') {
                Swal.fire(
                    'WARNING',
                    'Enter A Date First',
                    'warning'
                );
            }
            else {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // handle response
                        var response = JSON.parse(xhr.responseText);
                        if (response.status == 'permission') {
                            Swal.fire(
                                'ERROR',
                                'You Do Not Have Permissions To Access This Data',
                                'error'
                            );
                            const defaultRow = document.getElementById("tableDefault");
                            defaultRow.innerHTML = 'You Do Not Have Permission To Access This Data';
                        }
                        else {
                            if (response.details.length == 0) {
                                document.getElementById("tableDefault").innerHTML = 'No Data Exist On The Database';
                            }
                            else {
                                document.getElementById("tableBody").innerHTML = '';
                                for (let i = 0; i < response.details.length; i++) {
                                    var row = document.createElement("tr");
                                    for (let a = 0; a < 3; a++) {
                                        const col = document.createElement("td");
                                        if (a == 0) {
                                            col.innerHTML = i + 1;
                                        }
                                        else if (a == 1) {
                                            col.innerHTML = response.details[i]['initial_name'];
                                        }
                                        else {
                                            var span = document.createElement("span");
                                            if (response.details[i]['status'] == 'false') {
                                                span.innerHTML = "Absent";
                                                span.classList.add("absent");
                                            }
                                            else {
                                                span.innerHTML = "Present";
                                                span.classList.add("present");
                                            }
                                            span.classList.add("px-4");
                                            span.classList.add("py-1");
                                            span.classList.add("rounded");
                                            span.dataset.id = response.details[i]['id'];
                                            span.dataset.status = response.details[i]["status"];
                                            span.onclick = (event) => {
                                                var id = event.target.dataset.id;
                                                var status = event.target.dataset.status;

                                                var newForm = new FormData();
                                                newForm.append("id", id);
                                                newForm.append("status", status);

                                                var req = new XMLHttpRequest();
                                                req.onreadystatechange = function () {
                                                    if (req.readyState == 4 && req.status == 200) {
                                                        // handle response
                                                        var res = req.responseText;
                                                        if (res == 'true') {
                                                            event.target.classList.remove("absent");
                                                            event.target.classList.add("present");
                                                            event.target.dataset.status = 'true';
                                                            event.target.innerHTML = "Present";
                                                        }
                                                        else {
                                                            event.target.classList.add("absent");
                                                            event.target.dataset.status = 'false';
                                                            event.target.innerHTML = "Absent";
                                                            event.target.classList.remove("present");
                                                        }
                                                    }
                                                }

                                                req.open("POST", "process/updateAttendance.php", true);
                                                req.send(newForm);
                                            }
                                            col.appendChild(span);
                                        }
                                        row.appendChild(col);
                                    }
                                    document.getElementById("tableBody").appendChild(row);
                                }
                            }
                        }
                    }
                }

                xhr.open("GET", "process/searchAttendance.php?date=" + date.value + "", true);
                xhr.send();
            }

        }


        function filterStudents() {
            let input, filter, table, tr, td, txtValue;

            input = document.getElementById("studentName");
            filter = input.value.toUpperCase();
            table = document.getElementById("studentTable");
            tr = table.getElementsByTagName("tr");

            for (let i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    }
                    else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>

</html>
